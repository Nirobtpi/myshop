<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Seo Page Show 
    public function seoSetting(){
        $seo=Seo::get()->first();
        return view('backend.setting.seo',compact('seo'));
    }
}
