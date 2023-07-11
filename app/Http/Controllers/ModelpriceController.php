<?php

namespace App\Http\Controllers;

use App\Models\modelprice;
use App\Models\car;
use App\Models\brand;
use App\Models\caryear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
         $car_model = car::where(['brand_id'=> $request->brand])->get();

         $html = "";
          $html .="<select class='form-control' id='car_model' name='car_id'>";
          $html.="<option>Select Model</option>";
         foreach($car_model->unique('name') as $data){

            $html.= "<option value='{$data->id}'>{$data->name}</option>";

         }

         $html .="</select>";
          return $html;


    }
    public function year_get(Request $request)
    {
         $car_model = caryear::where(['car_id'=> $request->model])->get();


         $html = "";
          $html .="<select class='form-control'  name='caryear_id'>";
          $html.="<option>Select Year</option>";
         foreach($car_model->unique('name') as $data){

            $html.= "<option value='{$data->id}'>{$data->year}</option>";

         }

         $html .="</select>";
          return $html;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new modelprice();
         $model->brand_id = $request->brand_id;
         $model->car_id = $request->car_id;
         $model->caryear_id = $request->caryear_id;
         $model->normal_service = $request->normal_services;
         $model->checkup = $request->checkup;
         $model->save();
         Session::flash('message','Model price created successfully!');
         Session::flash('alert-class','alert-success');
         return redirect('/add-model-price');
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
         $year = caryear::all();
         return view("model_price.add",compact('car','brand','year'));
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
