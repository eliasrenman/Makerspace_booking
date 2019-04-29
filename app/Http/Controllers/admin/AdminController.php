<?php

namespace App\Http\Controllers\admin;

use App\Bookings;
use App\Equipment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipments = Equipment::all();
        $latestBookings = $this->getLatestBookings();

        $adminUsers = User::all();
        $activeUser = Auth::user()->id;
        return view('admin.dashboard', compact([
            'equipments',
            'latestBookings',
            'adminUsers',
            'activeUser'
        ]));
    }

    private function getLatestBookings()
    {
        return Bookings::query()
            ->select('bookings.id')
            ->addSelect(DB::raw("equipment.name as equipment"))
            ->addSelect('bookings.name')
            ->addSelect(DB::raw("from_unixtime(start, '%d %M') as date"))
            ->addSelect(DB::raw("from_unixtime(start, '%h:%i') as start"))
            ->addSelect(DB::raw("from_unixtime(end, '%h:%i') as end"))
            ->join("equipment", DB::raw("bookings.equipment"), "=", "equipment.id")
            ->orderBy("start", "desc")
            ->limit(15)
            ->get();
    }
}
