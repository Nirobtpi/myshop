<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
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
    // get sub category with category_id 
    public function subCategory($id){
        $sub_category=SubCategory::where('category_id',$id)->get();

        return response()->json($sub_category);
    }

    // get child category where sub cate id = 
    public function childCategory($id){
        $child_category=ChildCategory::where('subcategory_id',$id)->get();
        return response()->json($child_category);
    }

    public function store(Request $request){
       return $request->feature;
        
    }
}
