<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
class AdminController extends Controller
{
    function login_page(){
       if(!Auth::check()){
         return view('auth.login');
       }else{
        return redirect()->route('admin.dashboard');
       }
    }
    function login(Request $request){
        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);


        if (User::where('email', $request->email)->exists()) {
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                if(Auth::user()->is_admin == 1){
                    // return redirect()->route('admin.dashboard');
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect('/');
                }
            }else{
                 
                 return back()->with('user_err','You Are Not a Admin');
            }
        }else{
            return back()->with('user_err','Email Does Not Exists');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login.page');
    }
    public function user_logout(){
        Auth::logout();
        return redirect('/');
    }

    public function admin_dashboard(){
        return view('backend.admin_dashboard');
    }
    
    
}
