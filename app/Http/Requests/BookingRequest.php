<?php

namespace App\Http\Requests;

use App\Bookings;
use App\Equipment;
use App\Rules\afterToday;
use App\Rules\DifferenceBiggerThan;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed start
 * @property mixed date
 * @property mixed end
 * @property mixed equipment
 */
class BookingRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'start' => $this->castTime($this->start, $this->date),
            'end' => $this->castTime($this->end, $this->date),
            'name' => (session()->get('user'))['name'],
            'equipment' => json_decode($this->equipment)
        ]);
        $this->request->remove('date');
    }

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            if (!$this->checkIfExists()) {
                $validator->errors()->add('bad request', 'Något gick fel');
            } else if ($this->isTeacher()) {
                if (!$this->checkAvailability()) {
                    $this->adjustBookings();
                }
            } else {
                if (!$this->checkPermission()) {
                    $validator->errors()->add('forbidden', 'Du har inte tillåtelse att boka denna sak');
                } else if (!$this->checkAvailability()) {
                    $validator->errors()->add('unavailable', 'Den bokade tiden är upptagen');
                }
            }
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|String',
            'equipment' => 'required|array',
            'start' => ['required', 'numeric', new afterToday()],
            'end' => ['required', 'numeric', new DifferenceBiggerThan(1799, $this->start)],
        ];
    }

    private function adjustBookings()
    {
        //TODO double check that this is in order
        $start = $this->start;
        $end = $this->end;
        foreach ($this->equipment as $equipment) {

            $delete = $this->completeOverlap($start, $end, $equipment);
            if ($delete->count() != 0) {
                foreach ($delete->get() as $item) {
                    $item->delete();
                }
            }
            $adjustBoth = $this->insideOverlap($start, $end, $equipment);
            if ($adjustBoth->count() != 0) {
                foreach ($adjustBoth->get() as $item) {
                    $newBooking = $item->replicate();
                    $item->end = $start - 1;
                    $newBooking->start = $end + 1;
                    $item->save();
                    Bookings::create([
                        'name' => $newBooking->name,
                        'equipment' => $newBooking->equipment,
                        'start' => $newBooking->start,
                        'end' => $newBooking->end,
                    ])->save();
                }
            } else {
                $adjustStart = $this->partialOverlap($start, $equipment);
                if ($adjustStart->count() != 0) {
                    foreach ($adjustStart->get() as $item) {
                        $item->end = $start - 1;
                        $item->save();
                    }
                }

                $adjustEnd = $this->partialOverlap($end, $equipment);
                if ($adjustEnd->count() != 0) {
                    foreach ($adjustEnd as $item) {
                        $item->start = $end + 1;
                        $item->save();
                    }
                }
            }
        }
    }

    private function isTeacher()
    {
        return (session()->get('user'))['teacher'];
    }

    private function checkIfExists()
    {
        foreach ($this->equipment as $equipment) {
            $value = Equipment::where('id', '=', $equipment)->first();
            if (!isset($value)) {
                return false;
            }
        }
        return true;
    }

    private function checkPermission()
    {
        $user = session()->get('user');
        $this->equipment;
        foreach ($this->equipment as $equipment) {
            $value = Equipment::where('id', '=', $equipment)->first()->restricted;
            if ($value) {
                if (!$user['teacher']) {
                    return false;
                }
            }
        }
        return true;
    }

    private function partialOverlap($value, $equipment)
    {
        return Bookings::where(function ($query) use ($value, $equipment) {
            $query
                ->where(function ($query) use ($value, $equipment) {
                    $query
                        ->where('start', '<', $value)
                        ->where('end', '>', $value)
                        ->where('equipment', '=', $equipment);
                });
        });
    }

    private function completeOverlap($start, $end, $equipment)
    {
        return Bookings::where(function ($query) use ($start, $end, $equipment) {
            $query
                ->where(function ($query) use ($start, $end, $equipment) {
                    $query
                        ->where('start', '>', $start)
                        ->where('end', '<', $end)
                        ->where('equipment', '=', $equipment);
                });
        });
    }

    private function insideOverlap($start, $end, $equipment)
    {
        return Bookings::where(function ($query) use ($start, $end, $equipment) {
            $query
                ->where(function ($query) use ($start, $end, $equipment) {
                    $query
                        ->where('start', '<', $start)
                        ->where('end', '>', $end)
                        ->where('equipment', '=', $equipment);
                });
        });
    }

    private function checkAvailability()
    {
        $start = $this->start;
        $end = $this->end;
        $count = 0;
        foreach ($this->equipment as $equipment) {

            $count += $this->partialOverlap($start, $equipment)->count();
            $count += $this->partialOverlap($end, $equipment)->count();
            $count += $this->completeOverlap($start, $end, $equipment)->count();

        }
        if ($count != 0) return false;
        return true;
    }

    private function castTime($time, $date)
    {
        //date_default_timezone_set('Europe/Stockholm');
        return (strtotime($date . "T" . $time));
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
