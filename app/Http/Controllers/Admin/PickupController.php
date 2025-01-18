<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    public function pickup_Point(){   
        $pickuppoints=PickupPoint::paginate('5');
        return view('backend.pickup_point.index',compact('pickuppoints'));
    }
    public function create(){
        return view('backend.pickup_point.create');
    }

    public function store(Request $request){
        $request->validate([
            'pickup_point_name'=>['required'],
            'pickup_point_address'=>['required'],
            'pickup_point_phone'=>['required','numeric','regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
            'pickup_point_phone_two'=>['numeric','regex:/^(?:\+88|88)?(01[3-9]\d{8})$/','nullable'],
        ]);
        PickupPoint::create([
            'pickup_point_name'=>$request->pickup_point_name,
            'pickup_point_address'=>$request->pickup_point_address,
            'pickup_point_phone'=>$request->pickup_point_phone,
            'pickup_point_phone_two'=>$request->pickup_point_phone_two,
        ]);
        return redirect()->route('pickuppoint.index')->with('success','Pickup Point Added Successfully!');
    }
    public function distroy($id){
        PickupPoint::findOrFail($id)->delete();
        return back()->with('distroy','Data Deleted Successfully!');
    }
    public function edit($id){
        $data=PickupPoint::findOrFail($id);

        return view('backend.pickup_point.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'pickup_point_name'=>['required'],
            'pickup_point_address'=>['required'],
            'pickup_point_phone'=>['required','numeric','regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
            'pickup_point_phone_two'=>['numeric','regex:/^(?:\+88|88)?(01[3-9]\d{8})$/','nullable'],
        ]);
        PickupPoint::findOrFail($id)->update([
            'pickup_point_name'=>$request->pickup_point_name,
            'pickup_point_address'=>$request->pickup_point_address,
            'pickup_point_phone'=>$request->pickup_point_phone,
            'pickup_point_phone_two'=>$request->pickup_point_phone_two,
        ]);
        return redirect()->route('pickuppoint.index')->with('success','Pickup Point Updated Successfully!');
    }
}
