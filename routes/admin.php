<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\SubCategoryController;
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
  Route::get('chnage-password',[AdminController::class,'changePasswword'])->name('admin.changepassword');
  Route::post('chnage-password/{id}',[AdminController::class,'change_passwword'])->name('admin.change.password');
  Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');

  // category route 
  Route::prefix('category')->group(function(){
    Route::get('index',[CategoryController::class,'index'])->name('category.index');
    Route::get('add',[CategoryController::class,'add'])->name('category.add');
    Route::post('store',[CategoryController::class,'store'])->name('category.store');
    Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::post('checkdel',[CategoryController::class,'checkdel'])->name('category.check.del');
    Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('update',[CategoryController::class,'update'])->name('category.update');
    Route::get('all/category',[CategoryController::class,'allCategory'])->name('category.all');
  });

  Route::prefix('subcategory')->group(function(){
    Route::get('index',[SubCategoryController::class,'index'])->name('subcategory.index');
    Route::get('add/subcategory',[SubCategoryController::class,'addsubcategory'])->name('subcategory.add');
    Route::post('store',[SubCategoryController::class,'store'])->name('subcategory.store');
    Route::get('/delete/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');
    Route::post('check/delete',[SubCategoryController::class,'checkDelete'])->name('subcategory.check.delete');
    Route::get('edit/{id}',[SubCategoryController::class,'editData'])->name('subcategory.edit');
    Route::post('update',[SubCategoryController::class,'update'])->name('subcategory.update');
    Route::get('subcategory-list/{id}',[SubCategoryController::class,'allSubCategory'])->name('subcategory.all');
    
     
  });
  Route::prefix('childcategory')->group(function(){
    Route::get('index',[ChildController::class,'index'])->name('childcategory.index');
    // get subcategory url with ajax 
    Route::get('subcategory-list/{id}',[SubCategoryController::class,'allSubCategory'])->name('subcategory.all');
    // store child category 
    Route::post('store',[ChildController::class,'store'])->name('childcategory.store');
    // Route::get('allcategory',[CategoryController::class,'allCategory']);
    Route::get('all/category',[CategoryController::class,'allCategory'])->name('category.all');
    Route::get('edit/{id}',[ChildController::class,'edit'])->name('childcategory.edit');
    Route::get('all/subcategory',[SubCategoryController::class,'getallSubCategory'])->name('subcategory.get.all');
    Route::post('update',[ChildController::class,'update'])->name('childcategory.update');
  });
  
  Route::prefix('brand')->group(function(){
     Route::get('index',[BrandController::class,'index'])->name('brand.index');
     Route::get('add',[BrandController::class,'add'])->name('brand.add');
     Route::post('store',[BrandController::class,'store'])->name('brand.store');
     Route::get('delete/{id}',[BrandController::class,'distroy'])->name('brand.distroy');
     Route::post('check-delete',[BrandController::class,'checkDelete'])->name('brand.checkDelete');
     Route::get('edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
     Route::post('update/{id}',[BrandController::class,'update'])->name('brand.update');
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
