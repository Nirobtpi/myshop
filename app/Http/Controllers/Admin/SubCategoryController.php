<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories=SubCategory::with('category')->paginate(5);

        return view('backend.category.subcategory.subcategory',compact('subcategories'));
    }
    public function addsubcategory(){
        $categories=Category::get();
        return view('backend.category.subcategory.add-subcategory',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'category_id'=>['required'],
            'sub_category'=>['required'],
        ]);
        $slug=strtolower(str_replace(' ','-',$request->sub_category));
        SubCategory::create([
            'category_id'=>$request->category_id,
            'name'=>$request->sub_category,
            'slug'=>$slug,
        ]);

        return redirect()->route('subcategory.index')->with('store','Sub Category Added Successfully');
    }

    public function delete($id){
        SubCategory::findOrFail($id)->delete();

        return back()->with('delete','Sub Category Delated Successfull');
    }
    public function checkDelete(Request $request){
        $subcategoriesId=$request->deleteitems;
        foreach($subcategoriesId as $id){
            SubCategory::findOrFail($id)->delete();
        }
        return back()->with('delete','Your Sub Category has been deleted.');
    }
    // edit data 
    public function editData($id){
        $subCategory=SubCategory::findOrFail($id);
        return response()->json($subCategory);
    }
    // update subcategory 
    public function update(Request $request){
        $id=$request->sub_cat_id;
        $slug=strtolower(str_replace(' ','-',$request->edit_sub_category));
        SubCategory::findOrFail($id)->update([
            'category_id'=>$request->category,
            'name'=>$request->edit_sub_category,
            'slug'=>$slug,
        ]);
        return back()->with('success','Sub Category Update Successfully');
    }
}
