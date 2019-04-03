<?php

namespace App\Http\Requests;

use App\Bookings;
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
        //TODO Get the user name from the google oauth instead of using default name.
        $this->merge([
            'start' => $this->castTime($this->start, $this->date),
            'end' => $this->castTime($this->end, $this->date),
            'name' => 'Dev name',
            'equipment' => json_decode($this->equipment)
        ]);
        $this->request->remove('date');
    }

    //TODO Validate here that there are no overlapping bookings and if the user is a teacher let him force a overlap
    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            if (!$this->checkAvailability()) {
                $validator->errors()->add('unavailable', 'Den bokade tiden är upptagen');
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

    private function checkAvailability()
    {

        $start = $this->start;
        $end = $this->end;
        $count = 0;
        foreach ($this->equipment as $equipment) {
            $count += Bookings::where(function ($query) use ($start, $end, $equipment) {
                $query
                    ->where(function ($query) use ($start, $end, $equipment) {
                        $query
                            ->where('start', '<', $start)
                            ->where('end', '>', $start)
                            ->where('equipment', '=', $equipment);
                    })
                    ->orWhere(function ($query) use ($start, $end, $equipment) {
                        $query
                            ->where('start', '<', $end)
                            ->where('end', '>', $end)
                            ->where('equipment', '=', $equipment);
                    });
            })->count();
        }
        if ($count != 0) return false;
        return true;
    }

    private function castTime($time, $date)
    {
        date_default_timezone_set('Europe/Stockholm');
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
