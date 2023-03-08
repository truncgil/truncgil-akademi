<?php

namespace App\Http\Controllers;

use App\Models\CurrentType;
use App\Http\Requests\StoreCurrentTypeRequest;
use App\Http\Requests\UpdateCurrentTypeRequest;

class CurrentTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreCurrentTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrentTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrentType  $currentType
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentType $currentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrentType  $currentType
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentType $currentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrentTypeRequest  $request
     * @param  \App\Models\CurrentType  $currentType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrentTypeRequest $request, CurrentType $currentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrentType  $currentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentType $currentType)
    {
        //
    }
}
