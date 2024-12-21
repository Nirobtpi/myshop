<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ChildController extends Controller
{
    public function index(Request $request){
        $childCategory=ChildCategory::with('category','subcategory')->get();
        $categories=Category::get();
        $subcategories=SubCategory::get();
        
        // dd($request->ajax());
        // if ($request->ajax()) {
        //     $data=ChildCategory::with('category','subcategory')->get();
        //     return DataTables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('action',function($row){
        //         $action=`<a href="#" class="btn btn-sm btn-success edit" data-id='{{ $row->id }}'
        //                         data-bs-toggle="modal" data-bs-target="#editModal"><i
        //                         class="fa-regular fa-pen-to-square"></i></a>
        //                 <a data-link="" class="btn btn-sm btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>`;
        //         return $action;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
            
        // };

        return view('backend.category.childCategory.index',compact('childCategory','categories','subcategories'));
    }

    public function store(Request $request){
        $request->validate([
            'category_name'=>['required'],
            'sub_category_name'=>['required'],
            'child_category_name'=>['required'],
        ]);
        $slug=strtolower(str_replace(' ','-',$request->child_category_name));
        Childcategory::create([
            'category_id'=>$request->category_name,
            'subcategory_id'=>$request->sub_category_name,
            'name'=>$request->child_category_name,
            'slug'=>$slug,
        ]);

        return response()->json(['data'=>'Child Category Added Successfully']);
    }

    public function edit($id){
        $cat=Childcategory::findOrFail($id);
        return response()->json(['data'=>$cat]);
    }
}
