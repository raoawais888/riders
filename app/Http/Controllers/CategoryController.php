<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.view',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
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

            'name' => 'required|min:3',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
        ]);
            $input = $request->all();
        if ($image = $request->file('image_url')) {
            $destinationPath = 'images/categories';
            $Image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            if(!Storage::exists($destinationPath)){
                Storage::makeDirectory($destinationPath);
            }
            $image->move($destinationPath, $Image_name);
            $input['image'] = $Image_name;
        }

            Category::create($input);
            Session::flash('message','Category created successfully!');
            Session::flash('alert-class','alert-success');
            return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        if($category == null)
        {
            return redirect()->back()->with('error', 'No Record Found.');
        }
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
    $request->validate([

        'name' => 'required|min:3',
        ]);
        $category = Category::where('id', $id)->first();
         $category->name = $request->name;

        if ($image = $request->file('image_url')) {
            $destinationPath = 'images/categories';
            $Image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
        if(!Storage::exists($destinationPath)){
            Storage::makeDirectory($destinationPath);
        }
        $image->move($destinationPath, $Image_name);
        $category->image = $Image_name;
        }
        else{
            $category->image = $category->image;
        }
        $category->save();
        Session::flash('message', 'Category Updated Successfully');
        Session::flash('alert-class','alert-success');
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('message','category deleted successfully!');
        Session::flash('alert-class','alert-success');
        return redirect()->back();
    }
}
