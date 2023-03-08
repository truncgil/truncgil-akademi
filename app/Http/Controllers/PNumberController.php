<?php

namespace App\Http\Controllers;

use App\Models\PNumber;
use App\Http\Requests\StorePNumberRequest;
use App\Http\Requests\UpdatePNumberRequest;

class PNumberController extends Controller
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
     * @param  \App\Http\Requests\StorePNumberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePNumberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PNumber  $pNumber
     * @return \Illuminate\Http\Response
     */
    public function show(PNumber $pNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PNumber  $pNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(PNumber $pNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePNumberRequest  $request
     * @param  \App\Models\PNumber  $pNumber
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePNumberRequest $request, PNumber $pNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PNumber  $pNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(PNumber $pNumber)
    {
        //
    }
}
