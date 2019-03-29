<?php

namespace App\Http\Controllers\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DisplayBookingController extends Controller
{
    public function finished($start, $end, $date)
    {
        $text = $this->getJson('JSON/finished-text.json');
        return view('booking.finished', compact(['start', 'end', 'date', 'text']));
    }

    public function error($error)
    {
        $text = $this->getJson('JSON/error-text.json');
        return view('booking.error', compact(['error', 'text']));
    }

    public function getJson($path)
    {
        $text = json_decode(file_get_contents($path), true);
        return $text[rand(0, count($text) - 1)];
    }
}
