<?php

namespace App\Http\Controllers\booking;

use App\Bookings;
use App\Equipment;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
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
     * @param BookingRequest $bookingRequest
     */
    public function store(BookingRequest $bookingRequest)
    {
        foreach ($bookingRequest->equipment as $equipment) {
            $local = $bookingRequest->merge(['equipment' => $equipment]);

            Bookings::create($local->all());
        }

        $response = Request()->only('start', 'end', 'date');
        echo "/finished/{$response['start']}&{$response['end']}&{$response['date']}";
        http_response_code(200);
    }
}
