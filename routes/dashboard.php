<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ProfileController;



Route::get('/x', function(){
    return monthlyVisitors();
});


Route::group(['middleware' => ['auth']],function() {

// DashboardController
Route::get('dashboard',[DashboardController::class,'index'])->middleware('can:isCustomer')->name('dashboard');
Route::get('/all/subscription',[DashboardController::class,'all_subscription'])->middleware('can:isAdmin')->name('all.subscription');
Route::get('subscribe/delete/{id}',[DashboardController::class,'subscribe_delete'])->middleware('can:isAdmin')->name('subscribe.delete');



// CategoryController
Route::get('category/create',[CategoryController::class,'create'])->middleware('can:isAdmin')->name('category.create');
Route::post('category/store',[CategoryController::class,'store'])->middleware('can:isAdmin')->name('category.store');
Route::get('/category/delete/{id}',[CategoryController::class,'category_delete'])->middleware('can:isAdmin')->name('category.delete');
Route::get('/category/delete/all/{id}',[CategoryController::class,'category_delete_all'])->middleware('can:isAdmin')->name('category.delete_all');
Route::get('allcategory',[CategoryController::class,'allcategory'])->middleware('can:isAdmin')->name('allcategory');
Route::get('/category/edit/{id}',[CategoryController::class,'category_edit'])->middleware('can:isAdmin')->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'category_update'])->middleware('can:isAdmin')->name('category.update');
Route::get('/category/search',[CategoryController::class,'category_search'])->middleware('can:isAdmin')->name('category.search');

//PostController 
Route::get('post/create',[PostController::class,'create'])->middleware('can:isAdmin')->middleware('can:isCustomer')->name('post.create');
Route::post('post/store',[PostController::class,'store'])->middleware('can:isAdmin')->middleware('can:isCustomer')->name('post.store');
Route::get('allpost',[PostController::class,'index'])->middleware('can:isAdmin')->middleware('can:isCustomer')->name('post.index');
Route::get('/post/delete/{id}',[PostController::class,'post_delete'])->middleware('can:isAdmin')->middleware('can:isCustomer')->name('post.delete');
Route::get('/post/edit/{id}',[PostController::class,'post_edit'])->middleware('can:isAdmin')->middleware('can:isCustomer')->name('post.edit');
Route::post('/post/update/{id}',[PostController::class,'post_update'])->middleware('can:isAdmin')->middleware('can:isCustomer')->name('post.update');
Route::get('/post/search',[PostController::class,'post_search'])->middleware('can:isAdmin')->middleware('can:isCustomer')->name('post.search');


// ThemeController
Route::get('/theme/setup',[ThemeController::class,'index'])->middleware('can:isAdmin')->name('theme.setup');
Route::post('/theme/store',[ThemeController::class,'store'])->middleware('can:isAdmin')->name('theme.store');
Route::post('/social/store',[ThemeController::class,'social_store'])->middleware('can:isAdmin')->name('social.store');
Route::post('/description',[ThemeController::class,'description_store'])->middleware('can:isAdmin')->name('description.store');
Route::post('/footer/credit',[ThemeController::class,'footercredit_store'])->middleware('can:isAdmin')->name('footercredit.store');


//ProfileController
Route::get('/profile',[ProfileController::class,'index'])->middleware('can:isCustomer')->name('profile.index');
Route::post('/profile/store',[ProfileController::class,'store'])->middleware('can:isAdmin')->middleware('can:isCustomer')->name('profile.store');





});
