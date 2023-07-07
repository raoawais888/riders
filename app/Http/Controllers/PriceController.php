<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('price.view',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price.add');
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

            'price' => 'required'
        ]);
            $price = $request->price;

          $model = new Price();
          $model->price = $price ;
          $model->save();
        Session::flash('message','Price created successfully!');
        Session::flash('alert-class','alert-success');
        return redirect('price');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Price::findOrFail($id);
        if($price == null)
        {
            return redirect()->back()->with('error', 'No Record Found.');
        }
        return view('price.edit',compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'price' => 'required',
            ]);
            $price = Price::where('id', $id)->first();
            $price->price = $request->price;
            $price->update();
            Session::flash('message', 'Price Updated Successfully');
            Session::flash('alert-class','alert-success');
            return redirect('price');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::find($id);
        $price->delete();
        Session::flash('message','Price deleted successfully!');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }
}
