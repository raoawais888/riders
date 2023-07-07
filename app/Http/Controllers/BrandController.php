<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brand.view',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.add');
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

          $model = new Brand();
          $model->name = $name ;
          $model->save();
        Session::flash('message','Brand created successfully!');
        Session::flash('alert-class','alert-success');
        return redirect('brands');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $brand = Brand::findOrFail($id);
        if($brand == null)
        {
            return redirect()->back()->with('error', 'No Record Found.');
        }
        return view('brand.edit',compact('brand'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
    $request->validate([

        'name' => 'required|min:3',
        ]);
        $brand = Brand::where('id', $id )->first();
           $brand->name = $request->name;
        $brand->update();
        Session::flash('message', 'Brand Updated Successfully');
        Session::flash('alert-class','alert-success');
        return redirect('brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        Session::flash('message','Brand deleted successfully!');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }
}
