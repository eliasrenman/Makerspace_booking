<?php

namespace App\Http\Controllers\admin;

use App\Equipment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PdfExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('admin.export.create', ['equipment' => Equipment::all()]);
    }

    public function exportPDF()
    {
        $equipment = \request('equipment');
        $name = \request('name');
        return $this->getLatestBookings($equipment,$name);
    }

    private function getLatestBookings($equipment = null, $name = null)
    {
        $query = Bookings::query()
            ->select('bookings.id')
            ->addSelect(DB::raw("equipment.name as equipment"))
            ->addSelect('bookings.name')
            ->addSelect(DB::raw("from_unixtime(start, '%d %M') as date"))
            ->addSelect(DB::raw("from_unixtime(start, '%h:%i') as start"))
            ->addSelect(DB::raw("from_unixtime(end, '%h:%i') as end"))
            ->join("equipment", DB::raw("bookings.equipment"), "=", "equipment.id")
            ->orderBy("start", "desc");
        if ($equipment != null) {
            $query = $query->where('bookings.equipment', '=', $equipment);
        }
        if ($name != null) {
            $query = $query->andwhere('bookings.name', '=', $name);
        }
        return $query->tosql();
    }
}
