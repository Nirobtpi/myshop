<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\PickupPoint;
use App\Models\SubCategory;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $categories=Category::all();
        $warehouses=Warehouse::all();
        $pickup_points=PickupPoint::all();
        $brands=Brand::all();
        $subcategories=SubCategory::all();
        return view('backend.product.create',compact('categories','warehouses','pickup_points','brands','subcategories'));
    }

    public function store(Request $request){
       return $request->feature;
        
    }
}
