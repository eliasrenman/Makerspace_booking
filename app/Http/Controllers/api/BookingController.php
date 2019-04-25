<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Equipment;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * This is the route to return a array of bookings on requested equipment / days.
     *
     * @param $equipments a json array of requested equipment data.
     * @param $day day today is 0, increments of one day forward.
     * @return array returns all the bookings for the requested equipment.
     */
    public function lookup($equipments, $day)
    {
        $out = array();
        $equipments = json_decode($equipments);
        foreach ($equipments as $equipment) {
            $out = array_merge($out, Bookings::query()
                ->select(DB::raw("equipment.name"))
                ->addSelect(DB::raw("(cast(start as signed) - (UNIX_TIMESTAMP(CURRENT_DATE()+{$day}) + (UNIX_TIMESTAMP(CAST('08:00' as time)) - UNIX_TIMESTAMP(CURRENT_DATE())))) / 60 DIV 1 AS start"))
                ->addSelect(DB::raw("(cast(end as signed) - (UNIX_TIMESTAMP(CURRENT_DATE()+{$day}) + (UNIX_TIMESTAMP(CAST('08:00' as time)) - UNIX_TIMESTAMP(CURRENT_DATE())))) / 60 DIV 1 AS end"))
                ->join("equipment", DB::raw("bookings.equipment"), "=", "equipment.id")
                ->where("equipment", "=", $equipment)
                ->where("start", ">", DB::raw("unix_timestamp(CURRENT_DATE()+{$day})"))
                ->where("start", "<", DB::raw("unix_timestamp(CURRENT_DATE()+{$day}+1)"))
                ->orderBy("start", "asc")
                ->get()->toArray());

        }
        return $out;
    }

    /**
     * @return array this returns a array with all the equipment and all the current bookings for the day.
     */
    public function booking()
    {
        return [
            'equipment' => Equipment::all()->pluck('name'),
            'bookings' => Bookings::query()
                ->select('bookings.name')
                ->addselect(DB::raw('equipment.name as equipment'))
                ->addselect(DB::raw('(start - UNIX_TIMESTAMP(CAST("08:00" AS  TIME))) / 60 DIV 1 AS start'))
                ->addselect(DB::raw('(end - UNIX_TIMESTAMP(CAST("08:00" AS  TIME))) / 60 DIV 1 AS end'))
                ->join("equipment", DB::raw("bookings.equipment"), "=", "equipment.id")
                ->where('start', '>', DB::raw("unix_timestamp(CURRENT_DATE())"))
                ->where('start', '<', DB::raw("unix_timestamp(CURRENT_DATE()+1)"))
                ->get()
        ];
    }
}
