<?php

namespace App\Http\Controllers;

use App\Models\WPS;
use App\Http\Requests\StoreWPSRequest;
use App\Http\Requests\UpdateWPSRequest;

class WPSController extends Controller
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
     * @param  \App\Http\Requests\StoreWPSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWPSRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WPS  $wPS
     * @return \Illuminate\Http\Response
     */
    public function show(WPS $wPS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WPS  $wPS
     * @return \Illuminate\Http\Response
     */
    public function edit(WPS $wPS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWPSRequest  $request
     * @param  \App\Models\WPS  $wPS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWPSRequest $request, WPS $wPS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WPS  $wPS
     * @return \Illuminate\Http\Response
     */
    public function destroy(WPS $wPS)
    {
        //
    }
}
