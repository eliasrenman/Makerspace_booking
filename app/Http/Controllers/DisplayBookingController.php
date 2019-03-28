<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DisplayBookingController extends Controller
{
    public function finished($start, $end, $date)
    {
        $text = json_decode(file_get_contents('JSON/finished-text.json'), true);
        $text = $text[rand(0, count($text) - 1)];

        return view('booking.finished', compact(['start', 'end', 'date', 'text']));
    }

    public function error()
    {
        return view('booking.error');
    }
}
