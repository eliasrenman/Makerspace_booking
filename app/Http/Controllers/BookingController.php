<?php

namespace App\Http\Controllers;

use App\Equipment;
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
        //return view('booking.login');

        //$equipment = Equipment::all();
        $equipment = [['id' => '0', 'equipment' => 'Dator 1']];

        $user = ['name' => 'Dev User', 'icon' => 'images/xfoxx%20avatar.png'];
        //dd(compact('user', 'equipment'));
        return view('booking.booking', compact('user', 'equipment'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

}
