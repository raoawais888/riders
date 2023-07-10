<?php

namespace App\Http\Controllers;

use App\Models\modelprice;
use App\Models\car;
use App\Models\brand;
use Illuminate\Http\Request;

class ModelpriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("model_price.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function model_get(Request $request)
    {
        return $request->brand;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modelprice  $modelprice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $brand = brand::all();
         $car = car::all();
         return view("model_price.add",compact('car','brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modelprice  $modelprice
     * @return \Illuminate\Http\Response
     */
    public function edit(modelprice $modelprice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modelprice  $modelprice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modelprice $modelprice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modelprice  $modelprice
     * @return \Illuminate\Http\Response
     */
    public function destroy(modelprice $modelprice)
    {
        //
    }
}
