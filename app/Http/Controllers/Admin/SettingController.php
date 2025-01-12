<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\Smtp;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

    public function website_setting(){
        $data=Setting::get()->first();
        return view('backend.setting.page.website-setting',compact('data'));
    }

    public function update(Request $request,$id){
        $update=Setting::findOrFail($id);
        // global $logoname;
        if($request->logo !=''){
           $request->validate([
            'logo'     => ['nullable','mimes:png,jpg,jpeg,svg', 'max:2048'],
           ]);
           $logo=$request->logo;
           $logoEx=$logo->extension();
           $logoname=uniqid().'logo'.'.'.$logoEx;
           $manager = new ImageManager(new Driver());
           $image = $manager->read($logo);
           $image->save(public_path('uploads/website/').$logoname);

           $update->update([
            'logo'=>$logoname,
           ]);
        
        }elseif($request->favicon !=''){
            $request->validate([
            'favicon'=> ['nullable','mimes:png,jpg,jpeg,svg', 'max:2048'],
           ]);
           $favicon=$request->favicon;
           $faviconEx=$favicon->extension();
           $faviconname=uniqid().'favicon'.'.'.$faviconEx;
           $manager = new ImageManager(new Driver());
           $image = $manager->read($favicon);
           $image->save(public_path('uploads/website/').$faviconname);
           $update->update([
            'logo'=>$faviconname,
           ]);
        }elseif($request->phone_one !=''){
            $request->validate([
            'phone_one'=>['numeric','regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
           ]);
        }elseif($request->phone_two !=''){
            $request->validate([
            'phone_two'=>['numeric','regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
           ]);
        }else{
            $update->update([
                'currency'=>$request->currency,
                'phone_one'=>$request->phone_one,
                'phone_two'=>$request->phone_two,
                'mail_email'=>$request->mail_email,
                'support_email'=>$request->support_email,
                'address'=>$request->address,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'instagram'=>$request->instagram,
                'linkedin'=>$request->linkedin,
                'youtube'=>$request->youtube,
            ]);
        }
        return back()->with('success','Data Updated Successfully');
        
    }
}
