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
        $user = session()->get('user');
        if ($user['teacher']) {
            $equipment = Equipment::all();
        } else {
            $equipment = Equipment::all()->where('restricted', 0);
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

        if (session()->exists('user')) {
            return redirect('/');
        }

        return view('booking.login');
    }

    public function logout()
    {
        if (session()->exists('google_token')) {
            session()->remove('google_token');
        }
        if (session()->exists('user')) {
            session()->remove('user');
        }
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     * @param BookingRequest $bookingRequest
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(BookingRequest $bookingRequest)
    {
        foreach ($bookingRequest->equipment as $equipment) {
            $local = $bookingRequest->merge(['equipment' => $equipment]);
            Bookings::create($local->all());
        }
        $returnResponse = Request()->only('start', 'end', 'date');
        return response("/finished/{$returnResponse['start']}&{$returnResponse['end']}&{$returnResponse['date']}");
    }
}
