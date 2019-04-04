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
        $user = resolve('user');
        if ($user['teacher']) {
            $equipment = Equipment::all();
        } else {
            $equipment = Equipment::all()->where('restricted',0);
        }

        return view('booking.booking', compact('user', 'equipment'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('booking.login');
    }

    public function logout()
    {
        session()->remove('google_token');
        return redirect('/login');
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
