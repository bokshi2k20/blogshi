<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;


Route::group(['middleware' => ['auth']],function() {

// DashboardController
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');


// CategoryController
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/delete/{id}',[CategoryController::class,'category_delete'])->name('category.delete');
Route::get('/category/delete/all/{id}',[CategoryController::class,'category_delete_all'])->name('category.delete_all');
Route::get('allcategory',[CategoryController::class,'allcategory'])->name('allcategory');
Route::get('/category/edit/{id}',[CategoryController::class,'category_edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'category_update'])->name('category.update');

//PostController 
Route::get('post/create',[PostController::class,'create'])->name('post.create');
Route::post('post/store',[PostController::class,'store'])->name('post.store');
Route::get('allpost',[PostController::class,'index'])->name('post.index');
Route::get('/post/delete/{id}',[PostController::class,'post_delete'])->name('post.delete');
Route::get('/post/edit/{id}',[PostController::class,'post_edit'])->name('post.edit');
Route::post('/post/update/{id}',[PostController::class,'post_update'])->name('post.update');


});
