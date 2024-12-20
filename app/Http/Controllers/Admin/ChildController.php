<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Childcategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ChildController extends Controller
{
    public function index(Request $request){
        // return $childCategory=ChildCategory::with('category','subcategory')->get();
        if ($request->ajax()) {
            $childCategory=ChildCategory::with('category','subcategory')->get();
            return DataTables::of($childCategory)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $action=`<a href="#" class="btn btn-sm btn-success edit" data-id='{{ $row->id }}'
                                data-bs-toggle="modal" data-bs-target="#editModal"><i
                                class="fa-regular fa-pen-to-square"></i></a>
                        <a data-link="" class="btn btn-sm btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>`;
            })
            ->rawColumns(['action'])
            ->make(true);
            
        };

        return view('backend.category.childCategory.index');
    }
    // public function allChildCategory(Request $request){
    //     if ($request->ajax()) {
    //         $childCategory=Childcategory::get();

    //         return DataTables::of($childCategory)
    //         ->addColumn('action',function($row){
    //             $action=`<a href="#" class="btn btn-sm btn-success edit" data-id='{{ $row->id }}'
    //                                     data-bs-toggle="modal" data-bs-target="#editModal"><i
    //                                         class="fa-regular fa-pen-to-square"></i>
    //                                 </a>
    //                                 <a data-link=""
    //                                     class="btn btn-sm btn-danger delete"><i class="fa-solid fa-trash-can"></i>
    //                                 </a>`;
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
            
    //     };
    // }
}
