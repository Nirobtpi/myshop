<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands=Brand::paginate('3');
        return view('backend.category.Brand.index',compact('brands'));
    }
    public function add(){
        return view('backend.category.Brand.add-brand');
    }
}