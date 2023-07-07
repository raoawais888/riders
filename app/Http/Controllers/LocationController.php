<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $location = location::all();
        return view("location.index",compact('location'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          return view("location.add");


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $location = $request->name;
        $price = $request->price;

        $check = location::where(['location'=>$location])->first();

        if($check){

            return Redirect()->back()->with("arror","location Already Exist");
        }


         $model = new location();

         $model->location = $location;
         $model->price = $price;
         $model->save();
         return Redirect()->back()->with('success',"Location Added");



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $location = location::find($id);


          return view('location.edit', compact('location'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, location $location)
    {
        $id = $request->id;

             $model = location::find($id);
             $model->location = $request->name;
             $model->price = $request->price;
             $model->update();
             return Redirect("/locations")->with("success","Location Added");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {

        location::destroy($id);

        return Redirect()->back()->with("success","Deleted");

    }
}
