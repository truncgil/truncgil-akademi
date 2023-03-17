<?php

namespace App\Http\Controllers;

use App\Models\Subcontractor;
use App\Http\Requests\StoreSubcontractorRequest;
use App\Http\Requests\UpdateSubcontractorRequest;

class SubcontractorController extends Controller
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
     * @param  \App\Http\Requests\StoreSubcontractorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubcontractorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcontractor  $subcontractor
     * @return \Illuminate\Http\Response
     */
    public function show(Subcontractor $subcontractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcontractor  $subcontractor
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcontractor $subcontractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubcontractorRequest  $request
     * @param  \App\Models\Subcontractor  $subcontractor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcontractorRequest $request, Subcontractor $subcontractor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcontractor  $subcontractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcontractor $subcontractor)
    {
        //
    }
}
