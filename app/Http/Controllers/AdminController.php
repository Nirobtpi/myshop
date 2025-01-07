<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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

    // reset password page 
    public function password_reset_page(){
        return view('backend.admin_profile.resetpassword-page');
    }

    // email send with link 
    public function reset_pass_link(Request $request){
       
       $user=User::where('email',"=",$request->email)->first();
        if(!empty($user)){
            $user->remember_token=Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return back()->with('user_succ','Please check your email and reset your password!');
            
            
        }else{
            return back()->with('user_err','Your Email Does Not Match!');
        }
    }

    public function reset_page($token){
       $userData=User::where('remember_token',$token)->first();
       if($userData){
       
         return view('backend.admin_profile.password-change',compact('userData'));
       }else{
        abort(404);
       }
       
    }

    // forgot password reset 
    public function admin_password_reset(Request $request,$id){
       $rand= Str::random(40);
       $user=User::findOrFail($id);
       $request->validate([
        'password'=>['required','min:8','confirmed']
       ]);
       if(empty($user->email_verified_at)){
        $user->email_verified_at=date('Y-m-d H:i:s');
       }
       $user->password=Hash::make($request->password);
       $user->remember_token=$rand;
       $user->save();
       return redirect()->route('admin.login')->with('pass','Your Password Recover Successfully');
    }

    // change password 
    public function changePasswword(){
        return view('backend.admin_profile.changepassword');
    }

    public function change_passwword(Request $request,$id){
        // return $request->new_password;
        $request->validate([
            'current_password'=>['required'],
            'password'=>['required','min:8','confirmed'],
        ]);
        $user=User::findOrFail($id);
        if(Hash::check($request->current_password,$user->password)){
            $user->update([
                'password'=>Hash::make($request->password),
            ]);
            return back()->with('succ','Password Update Successfully');
        }else{
            return back()->with('err','Current Password Does Not Match');
        }
    }
    

    
}
