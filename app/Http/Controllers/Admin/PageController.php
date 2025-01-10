<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
        // page setting page 
    public function pageSetting(){
        $pages=Page::all();
        
        return view('backend.setting.page.index',compact('pages'));
    }
}
