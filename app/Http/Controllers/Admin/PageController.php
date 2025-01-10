<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
        // page setting page 
    public function pageSetting(){
        $pages=Page::paginate('1');
        
        return view('backend.setting.page.index',compact('pages'));
    }
}
