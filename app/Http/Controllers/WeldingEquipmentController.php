<?php

namespace App\Http\Controllers;

use App\Models\WeldingEquipment;
use App\Http\Requests\StoreWeldingEquipmentRequest;
use App\Http\Requests\UpdateWeldingEquipmentRequest;

class WeldingEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWeldingEquipmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeldingEquipmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WeldingEquipment  $weldingEquipment
     * @return \Illuminate\Http\Response
     */
    public function show(WeldingEquipment $weldingEquipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WeldingEquipment  $weldingEquipment
     * @return \Illuminate\Http\Response
     */
    public function edit(WeldingEquipment $weldingEquipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWeldingEquipmentRequest  $request
     * @param  \App\Models\WeldingEquipment  $weldingEquipment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWeldingEquipmentRequest $request, WeldingEquipment $weldingEquipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WeldingEquipment  $weldingEquipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeldingEquipment $weldingEquipment)
    {
        //
    }
}
