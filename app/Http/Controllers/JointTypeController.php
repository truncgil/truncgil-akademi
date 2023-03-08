<?php

namespace App\Http\Controllers;

use App\Models\JointType;
use App\Http\Requests\StoreJointTypeRequest;
use App\Http\Requests\UpdateJointTypeRequest;

class JointTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreJointTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJointTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JointType  $jointType
     * @return \Illuminate\Http\Response
     */
    public function show(JointType $jointType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JointType  $jointType
     * @return \Illuminate\Http\Response
     */
    public function edit(JointType $jointType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJointTypeRequest  $request
     * @param  \App\Models\JointType  $jointType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJointTypeRequest $request, JointType $jointType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JointType  $jointType
     * @return \Illuminate\Http\Response
     */
    public function destroy(JointType $jointType)
    {
        //
    }
}
