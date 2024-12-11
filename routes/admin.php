<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login',[AdminController::class,'login_page'])->name('admin.login.page');
Route::middleware('isadmin')->prefix('admin')->group(function(){
  Route::get('dashboard',[AdminController::class,'admin_dashboard'])->name('admin.dashboard');
  Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
});

Route::get('/', function () {
    return view('welcome');
});

//  Route::get('admin/deshboard',[AdminController::class,'dashboard'])->middleware('is_admin')->name('admin.dashboard');

 Route::post('admin/login',[AdminController::class,'login'])->name('admin.login');
 Route::get('user/logout',[AdminController::class,'user_logout'])->name('user.logout');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
