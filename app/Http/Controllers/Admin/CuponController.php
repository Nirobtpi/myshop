<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function index(){
        $cuponCodes=Cupon::paginate();
        return view('backend.offer.cupon.index',compact('cuponCodes'));
    }
    public function add(){
        return view('backend.offer.cupon.create');
    }

    public function store(Request $request){
        $request->validate([
            'cupon_code'=>['required','min:6'],
            'valid_date'=>['required','date'],
            'type'=>['required'],
            'cupon_ammount'=>['required','numeric'],
        ]);
        Cupon::create([
            'cupon_code'=>$request->cupon_code,
            'valid_date'=>$request->valid_date,
            'type'=>$request->type,
            'status'=>$request->status,
            'cupon_ammount'=>$request->cupon_ammount,
        ]);

        return redirect()->route('cupon.index')->with('success','Cupon Code Added Successfully!');
    }

    public function distroy($id){
        Cupon::findOrFail($id)->delete();
        return back()->with('distroy',"Cupon Code Deleted Successfully!");
    }

    public function edit($id){
        $data=Cupon::findOrFail($id);
        return view('backend.offer.cupon.edit',compact('data'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'cupon_code'=>['required','min:6'],
            'valid_date'=>['required','date'],
            'type'=>['required'],
            'cupon_ammount'=>['required','numeric'],
        ]);
        Cupon::findOrFail($id)->update([
            'cupon_code'=>$request->cupon_code,
            'valid_date'=>$request->valid_date,
            'type'=>$request->type,
            'status'=>$request->status,
            'cupon_ammount'=>$request->cupon_ammount,
        ]);
        return redirect()->route('cupon.index')->with('success','Data Updated Successfully');
    }
}
