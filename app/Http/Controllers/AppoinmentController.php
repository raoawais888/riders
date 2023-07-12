<?php

namespace App\Http\Controllers;

use App\Models\appoinment;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Caryear;
use App\Models\Price;
use Illuminate\Http\Request;
use Mail;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = appoinment::orderBy('id', 'DESC')->get();;

       return view('appoinments.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data = appoinment::where(['id' => $id])->with('location')->get();
        return view('appoinments.detail',compact('data'));
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
         $number = "+965".$request->number;


        $result = appoinment::whereDate('created_at', Carbon::today())->get();

        if ($result->count() < 5) {

            $model = new appoinment();
            $model->name = $request->name;
            $model->number = $number;
            $model->email = $request->email;
            $model->date = $request->date;
            $model->time = $request->time;
            $model->brand_id = $request->brand;
            $model->car_id = $request->car_id;
            $model->year = $request->caryear_id;
            $model->service = $request->service;
            $model->price = $request->price;
            $model->location_id = $request->location;
            $model->advance = $request->advance;
            $model->checkup = $request->checkup;
            $model->total_price = $request->total_price;
            $model->service_price = $request->service_price;
            $model->save();
            $id = $model->id;

            $data = appoinment::where(['id' => $id])->with('location','brand','car')->get();

            //  dd($data);

            // if (Mail::to('nabeel.shahzad499@gmail.com')->send(new NotifyMail($data))) {
            if (Mail::to([$request->email , "raoawais888@gmail.com"])->send(new NotifyMail($data))) {
                return  Redirect()->back()->with("success", "sucess");
            } else {
                return Redirect()->back()->with("mailerror", "mailerror");
            }
        } else {
            return Redirect()->back()->with("limiterror", "limiterror");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function time(Request $request)
    {

        $result = appoinment::
                  where(['time'=>$request->time])
                  ->whereDate('created_at', Carbon::today())
                  ->get();


             if($result->count()){

                return 1;

             }else{
                return 0;
             }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function edit(appoinment $appoinment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appoinment $appoinment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        appoinment::destroy($id);

        return Redirect()->back()->with("success","Deleted");
    }
}
