<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('isAdmin')->prefix('admin')->group(function(){
   
});

 Route::post('admin/login',[AdminController::class,'login'])->name('admin.login');



Route::get('admin/deshboard',[AdminController::class,'dashboard'])->middleware('is_admin')->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
