<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WareHouseController extends Controller
{
    public function index(){
        $lists=Warehouse::paginate('5');
        return view('backend.category.warehouse.index',compact('lists'));
    }
    public function create(){
        return view('backend.category.warehouse.create');
    }

    public function store(Request $request){
        Warehouse::create([
            'warehouse_name'=>$request->warehouse_name,
            'warehouse_address'=>$request->warehouse_address,
            'warehouse_phone'=>$request->warehouse_phone,
        ]);
        return redirect()->route('warehouse.index')->with('success','Warehouse Added Successfully!');
    }

    public function distroy($id){
        Warehouse::findOrFail($id)->delete();

        return back()->with('distroy','Warehouse deleted successfully!');
    }
}
