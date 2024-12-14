<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::orderBy('id', 'desc')->paginate('4');
        
        return view('backend.category.index', compact('categories'));
    }
    public function add(){
        return view('backend.category.add-category');
    }

    // category store 
    public function store(Request $request){
        $request->validate([
            'category'=>['required','unique:categories,category_name'],
        ]);
        $slug=strtolower(str_replace(' ','-',$request->category));
        Category::create([
            'category_name'=>$request->category,
            'category_slug'=>$slug,
        ]);
        return redirect()->route('category.index')->with('store','Your Category Added Successfully');
    }
    // category delete 
    public function delete($id){
        Category::findOrFail($id)->delete();
        return back()->with('delete','Your file has been deleted.');
    }
    // Check delete
    public function checkdel(Request $request){
       $allCheckItem= $request->deleteitems;

       foreach($allCheckItem as $delId){
            Category::findOrFail($delId)->delete(); 
       }
       return back()->with('delete','Your file has been deleted.');
    }

    // edit methode 

    public function edit($id){
      $cat= Category::findOrFail($id);
      return  response()->json($cat);
    }
    // category update 

    public function update(Request $request){
        $id=$request->cat_id;
        $slug=strtolower(str_replace(' ','-',$request->category));

        $request->validate([
            'category'=>['required','unique:categories,category_name,'.$id],
        ]);
        Category::findOrFail($id)->update([
            'category_name'=>$request->category,
            'category_slug'=>$slug,
        ]);
        return back()->with('success','Category Update Successfully');
    }
}
