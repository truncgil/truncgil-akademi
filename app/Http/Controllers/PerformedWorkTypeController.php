<?php

namespace App\Http\Controllers;

use App\Models\PerformedWorkType;
use App\Http\Requests\StorePerformedWorkTypeRequest;
use App\Http\Requests\UpdatePerformedWorkTypeRequest;

class PerformedWorkTypeController extends Controller
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
     * @param  \App\Http\Requests\StorePerformedWorkTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePerformedWorkTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerformedWorkType  $performedWorkType
     * @return \Illuminate\Http\Response
     */
    public function show(PerformedWorkType $performedWorkType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerformedWorkType  $performedWorkType
     * @return \Illuminate\Http\Response
     */
    public function edit(PerformedWorkType $performedWorkType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePerformedWorkTypeRequest  $request
     * @param  \App\Models\PerformedWorkType  $performedWorkType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePerformedWorkTypeRequest $request, PerformedWorkType $performedWorkType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerformedWorkType  $performedWorkType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerformedWorkType $performedWorkType)
    {
        //
    }
}
