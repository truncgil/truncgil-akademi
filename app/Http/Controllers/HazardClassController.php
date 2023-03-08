<?php

namespace App\Http\Controllers;

use App\Models\HazardClass;
use App\Http\Requests\StoreHazardClassRequest;
use App\Http\Requests\UpdateHazardClassRequest;

class HazardClassController extends Controller
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
     * @param  \App\Http\Requests\StoreHazardClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHazardClassRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HazardClass  $hazardClass
     * @return \Illuminate\Http\Response
     */
    public function show(HazardClass $hazardClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HazardClass  $hazardClass
     * @return \Illuminate\Http\Response
     */
    public function edit(HazardClass $hazardClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHazardClassRequest  $request
     * @param  \App\Models\HazardClass  $hazardClass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHazardClassRequest $request, HazardClass $hazardClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HazardClass  $hazardClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(HazardClass $hazardClass)
    {
        //
    }
}
