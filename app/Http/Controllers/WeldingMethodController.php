<?php

namespace App\Http\Controllers;

use App\Models\WeldingMethod;
use App\Http\Requests\StoreWeldingMethodRequest;
use App\Http\Requests\UpdateWeldingMethodRequest;

class WeldingMethodController extends Controller
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
     * @param  \App\Http\Requests\StoreWeldingMethodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeldingMethodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WeldingMethod  $weldingMethod
     * @return \Illuminate\Http\Response
     */
    public function show(WeldingMethod $weldingMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WeldingMethod  $weldingMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(WeldingMethod $weldingMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWeldingMethodRequest  $request
     * @param  \App\Models\WeldingMethod  $weldingMethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWeldingMethodRequest $request, WeldingMethod $weldingMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WeldingMethod  $weldingMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeldingMethod $weldingMethod)
    {
        //
    }
}
