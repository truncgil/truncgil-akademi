<?php

namespace App\Http\Controllers;

use App\Models\TypeOfConsumable;
use App\Http\Requests\StoreTypeOfConsumableRequest;
use App\Http\Requests\UpdateTypeOfConsumableRequest;

class TypeOfConsumableController extends Controller
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
     * @param  \App\Http\Requests\StoreTypeOfConsumableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeOfConsumableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeOfConsumable  $typeOfConsumable
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOfConsumable $typeOfConsumable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeOfConsumable  $typeOfConsumable
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeOfConsumable $typeOfConsumable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeOfConsumableRequest  $request
     * @param  \App\Models\TypeOfConsumable  $typeOfConsumable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeOfConsumableRequest $request, TypeOfConsumable $typeOfConsumable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeOfConsumable  $typeOfConsumable
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOfConsumable $typeOfConsumable)
    {
        //
    }
}
