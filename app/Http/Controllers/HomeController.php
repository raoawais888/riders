<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\location;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Car;
use App\Models\Caryear;
use App\Models\Price;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = location::all();
        $brand = Brand::all();
        $carmodel =Car::all();
        $caryear =Caryear::all();
        $price =price::first();
    return view("frontend.appointment",compact('location','brand','carmodel','caryear','price'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function price( Request $request)
    {
         $location = location::find($request->location);

         $price = $location->price;

         return $price;





    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function time(Request $request)
     {

         return "time";


     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $category = Category::all();
        $product = Product::with('category')->get();
        return view('frontend.shop',compact('product','category'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
