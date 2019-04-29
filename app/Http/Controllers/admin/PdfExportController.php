<?php

namespace App\Http\Controllers\admin;

use App\Bookings;
use App\Equipment;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
use Illuminate\Support\Facades\DB;

class PdfExportController extends Controller {

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
        $equipment = json_decode(\request('equipment'));

        $name = \request('name');

        $data = $this->getLatestBookings($equipment, $name);

        $time = (new DateTime())->format('Y-m-d H:i:s');

        $pdf = PDF::loadView('admin.export.pdf', compact(['data', 'time']));
        return $pdf->download($time.'_export.pdf');
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
            ->orderBy("bookings.equipment", "asc")
            ->orderBy("start", "desc");
        if ($name != null) {
            $query = $query->where('bookings.name', '=', $name);
        }
        if ($equipment != null) {
            if (count($equipment) == 1) {
                $query = $query->where('bookings.equipment', '=', $equipment[0]);
            } else {
                $query->where(function ($query) use ($equipment) {
                    foreach ($equipment as $key => $index) {
                        if ($key == 0) {
                            $query->where('bookings.equipment', '=', $index);
                        } else {
                            $query->orwhere('bookings.equipment', '=', $index);
                        }
                    }
                });
            }
        }
        return ($query->get());
    }
}
