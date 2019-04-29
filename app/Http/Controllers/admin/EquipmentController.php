<?php

namespace App\Http\Controllers\admin;

use App\Equipment;
use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentRequest;

class EquipmentController extends Controller
{

    /**
     * EquipmentController constructor.
     * Authentication protected
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {
        Equipment::create($request->all());
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::find($id);
        return view('admin.equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EquipmentRequest $request, $id)
    {
        Equipment::find($id)->update($request->all());
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipment::destroy($id);
        return redirect(route('home'));
    }
}
