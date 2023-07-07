<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.view',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
               $request->validate([

            'name' => 'required|min:3',
            'price' => 'required',
            'category_id' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
            $input = $request->all();
        if ($image = $request->file('image_url')) {
            $destinationPath = 'images/products';
            $Image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            if(!Storage::exists($destinationPath)){
                Storage::makeDirectory($destinationPath);
            }
            $image->move($destinationPath, $Image_name);
            $input['image'] = "$Image_name";
        }

            Product::create($input);
            Session::flash('message','Product created successfully!');
            Session::flash('alert-class','alert-success');
            return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        if($product == null)
        {
            return redirect()->back()->with('error', 'No Record Found.');
        }
        return view('product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
        'name' => 'required|min:3',
        'price' => 'required',
        'category_id' => 'required',
        ]);
        $product = Product::where('id',$id)->first();
         $product->name = $request->name;
         $product->price = $request->price;
         $product->category_id = $request->category_id;

        if ($image = $request->file('image_url')) {
            $destinationPath = 'images/products';
            $Image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
        if(!Storage::exists($destinationPath)){
            Storage::makeDirectory($destinationPath);
        }
        $image->move($destinationPath, $Image_name);
        $product->image = $Image_name;
        }
        else{
            $product->image = $product->image;
        }
        $product->save();
        Session::flash('message', 'Product Updated Successfully');
        Session::flash('alert-class','alert-success');
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::flash('message','Product deleted successfully!');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }
}
