<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
        // page setting page 
    public function pageSetting(){
        $pages=Page::paginate('10');
        
        return view('backend.setting.page.index',compact('pages'));
    }

    public function addPage(){
        return view('backend.setting.page.create');
    }

    public function store(Request $request){
        $slug=strtolower(str_replace(' ','-',$request->page_name)).'-'.rand(1,22);
        Page::create([
            'page_position'=>$request->page_position,
            'page_name'=>$request->page_name,
            'page_slug'=>$slug,
            'page_title'=>$request->page_title,
            'page_description'=>$request->page_description,
        ]);
        return redirect()->route('page.index')->with('success','Page Added Successfully');
    }

    public function distroy($id){
        Page::findOrFail($id)->delete();
        return back()->with('distroy','Page Deleted Successfully!');

    }

    // edit page 

    public function page_edit($id){
        $pageData=Page::findOrFail($id);
        return view('backend.setting.page.edit',compact('pageData'));
    }

    public function update(Request $request,$id){
        $slug=strtolower(str_replace(' ','-',$request->page_name)).'-'.rand(1,22);
        Page::findOrFail($id)->update([
            'page_position'=>$request->page_position,
            'page_name'=>$request->page_name,
            'page_slug'=>$slug,
            'page_title'=>$request->page_title,
            'page_description'=>$request->page_description,
        ]);
        return redirect()->route('page.index')->with('success','Page Updated Successfully');
    }
}
