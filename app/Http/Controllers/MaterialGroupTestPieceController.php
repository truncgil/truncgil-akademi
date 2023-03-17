<?php

namespace App\Http\Controllers;

use App\Models\MaterialGroupTestPiece;
use App\Http\Requests\StoreMaterialGroupTestPieceRequest;
use App\Http\Requests\UpdateMaterialGroupTestPieceRequest;

class MaterialGroupTestPieceController extends Controller
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
     * @param  \App\Http\Requests\StoreMaterialGroupTestPieceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaterialGroupTestPieceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialGroupTestPiece  $materialGroupTestPiece
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialGroupTestPiece $materialGroupTestPiece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialGroupTestPiece  $materialGroupTestPiece
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialGroupTestPiece $materialGroupTestPiece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaterialGroupTestPieceRequest  $request
     * @param  \App\Models\MaterialGroupTestPiece  $materialGroupTestPiece
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaterialGroupTestPieceRequest $request, MaterialGroupTestPiece $materialGroupTestPiece)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialGroupTestPiece  $materialGroupTestPiece
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialGroupTestPiece $materialGroupTestPiece)
    {
        //
    }
}
