<?php

namespace App\Http\Controllers\booking;

use App\Bookings;
use App\Equipment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = Equipment::all();

        $user = ['name' => 'Dev User', 'icon' => 'images/xfoxx%20avatar.png'];
        return view('booking.booking', compact('user', 'equipment'));
    }


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        //TODO Get the user name from the google oauth instead of using default name.
        //TODO Create proper validation here that validates the bookings.
        $request = $this->castTime(
                Request()->except('_token')
            ) + ['name' => 'user name'];
        Bookings::create($request);

        $response = Request()->only('start', 'end', 'date');
        echo "/finished/start={$response['start']}&end={$response['end']}&date={$response['date']}";
        http_response_code(200);
    }


    private function castTime($booking)
    {
        date_default_timezone_set('Europe/Stockholm');
        $booking['start'] = (strtotime($booking['date'] . "T" . $booking['start']));
        $booking['end'] = (strtotime($booking['date'] . "T" . $booking['end']));
        unset($booking['date']);
        return $booking;
    }
}
