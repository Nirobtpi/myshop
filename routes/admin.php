<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login',[AdminController::class,'login_page'])->name('admin.login.page');
Route::post('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('admin/password/reset',[AdminController::class,'password_reset_page'])->name('admin.reset.page');


// password reset token and email send url
Route::post('reset/password/link',[AdminController::class,'reset_pass_link'])->name('reset.pass.link');

// pass reset page 
Route::get('reset/{token}',[AdminController::class,'reset_page'])->name('admin.reset.form.page');
// pass reset form submit 
Route::post('admin/password/reset/{id}',[AdminController::class,'admin_password_reset'])->name('admin.password.reset');

Route::middleware('isadmin')->prefix('admin')->group(function(){

  Route::get('dashboard',[AdminController::class,'admin_dashboard'])->name('admin.dashboard');
  Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');

  // category route 
  Route::prefix('category')->group(function(){
    Route::get('index',[CategoryController::class,'index'])->name('category.index');
  });


});

Route::get('/', function () {
    return view('welcome');
});

//  Route::get('admin/deshboard',[AdminController::class,'dashboard'])->middleware('is_admin')->name('admin.dashboard');

 Route::get('user/logout',[AdminController::class,'user_logout'])->name('user.logout');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
