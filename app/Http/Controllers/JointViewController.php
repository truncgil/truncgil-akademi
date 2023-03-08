<?php

namespace App\Http\Controllers;

use App\Models\JointView;
use App\Http\Requests\StoreJointViewRequest;
use App\Http\Requests\UpdateJointViewRequest;

class JointViewController extends Controller
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
     * @param  \App\Http\Requests\StoreJointViewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJointViewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JointView  $jointView
     * @return \Illuminate\Http\Response
     */
    public function show(JointView $jointView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JointView  $jointView
     * @return \Illuminate\Http\Response
     */
    public function edit(JointView $jointView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJointViewRequest  $request
     * @param  \App\Models\JointView  $jointView
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJointViewRequest $request, JointView $jointView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JointView  $jointView
     * @return \Illuminate\Http\Response
     */
    public function destroy(JointView $jointView)
    {
        //
    }
}
