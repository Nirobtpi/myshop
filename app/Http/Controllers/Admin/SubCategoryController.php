<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories=SubCategory::paginate(3);

        return view('backend.category.subcategory.subcategory',compact('subcategories'));
    }
    public function addsubcategory(){
        $categories=Category::get();
        return view('backend.category.subcategory.add-subcategory',compact('categories'));
    }
}
