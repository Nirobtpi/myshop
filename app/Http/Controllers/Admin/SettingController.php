<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Seo;
use App\Models\Smtp;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Seo Page Show 
    public function seoSetting(){
        $seo=Seo::get()->first();
        return view('backend.setting.seo',compact('seo'));
    }

    public function seoUpdate(Request $request,$id){
        $request->validate([
            'meta_title'=>['required'],
            'meta_author'=>['required'],
            'meta_keyword'=>['required'],
        ]);
        Seo::findorFail($id)->update([
            'meta_title'=>$request->meta_title,
            'meta_author'=>$request->meta_author,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'google_verification'=>$request->google_verification,
            'google_analytics'=>$request->google_analytics,
            'google_adsense'=>$request->google_adsense,
        ]);
        return back()->with('succ','Seo Seating Updated Successfully!');
    }

    // smtp setting page 
    public function smtpSetting(){
        $smtp=Smtp::get()->first();
        return view('backend.setting.smtp',compact('smtp'));
    }
    // Smtp update 

    public function smtpUpdate(Request $request,$id){
        Smtp::findOrFail($id)->update([
            'mailer'=>$request->mailer,
            'host'=>$request->host,
            'port'=>$request->port,
            'user_name'=>$request->user_name,
            'password'=>$request->password,
        ]);
        return back()->with('succ','SMTP Updated Successfully');
    }
}
