<?php

namespace App\Http\Controllers;

use App\Models\Caryear;
use App\Models\brand;
use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaryearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caryears = Caryear::with('car','brand')->get();
        // dd($caryears);
        return view('caryear.view',compact('caryears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = brand::all();
        $car = car::all();
        return view('caryear.add',compact('brand','car'));
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

            'year' => 'required|min:3'
        ]);
            $year = $request->year;

          $model = new Caryear();
          $model->year = $year ;
          $model->brand_id = $request->brand_id ;
          $model->car_id = $request->car_id ;
          $model->save();
        Session::flash('message','Car Year created successfully!');
        Session::flash('alert-class','alert-success');
        return redirect('caryears');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caryear  $caryear
     * @return \Illuminate\Http\Response
     */
    public function show(Caryear $caryear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caryear  $caryear
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caryears = Caryear::findOrFail($id);
        $brand = brand::all();
        $car = car::all();

        if($caryears == null)
        {
            return redirect()->back()->with('error', 'No Record Found.');
        }
        return view('caryear.edit',compact('caryears','brand','car'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caryear  $caryear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'year' => 'required|min:3',
            ]);
            $caryear = Caryear::where('id', $id)->first();
            $caryear->year = $request->year;
            $caryear->brand_id = $request->brand_id ;
            $caryear->car_id = $request->car_id ;
            $caryear->update();
            Session::flash('message', 'Car Year Updated Successfully');
            Session::flash('alert-class','alert-success');
            return redirect('caryears');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caryear  $caryear
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caryear = Caryear::find($id);
        $caryear->delete();
        Session::flash('message','car year deleted successfully!');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }
}
