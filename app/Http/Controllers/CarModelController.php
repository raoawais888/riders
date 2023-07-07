<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carmodels = Car::all();
        return view('carmodel.view',compact('carmodels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carmodel.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|min:3'
        ]);
            $name = $request->name;

          $model = new Car();
          $model->name = $name ;
          $model->save();
        Session::flash('message','Car Model created successfully!');
        Session::flash('alert-class','alert-success');
        return redirect('carmodels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show(Car $carModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carmodels = Car::findOrFail($id);
        if($carmodels == null)
        {
            return redirect()->back()->with('error', 'No Record Found.');
        }
        return view('carmodel.edit',compact('carmodels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required|min:3',
            ]);
            $carmodel = Car::where('id', $id)->first();
               $carmodel->name = $request->name;
            $carmodel->update();
            Session::flash('message', 'Car Model Updated Successfully');
            Session::flash('alert-class','alert-success');
            return redirect('carmodels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CarModel = Car::find($id);
        $CarModel->delete();
        Session::flash('message','Car Model deleted successfully!');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }
}
