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
            'vailid_data'=>['required','date'],
            'type'=>['required'],
            'cupon_ammount'=>['required','numeric'],
        ]);
        Cupon::create([
            'cupon_code'=>$request->cupon_code,
            'vailid_data'=>$request->vailid_data,
            'type'=>$request->type,
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
}
