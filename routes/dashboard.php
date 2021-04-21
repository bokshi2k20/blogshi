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
Route::get('post/create',[PostController::class,'create'])->name('post.create');
Route::post('post/store',[PostController::class,'store'])->name('post.store');
Route::get('posts',[PostController::class,'index'])->name('post.index');
Route::get('allcategory',[CategoryController::class,'allcategory'])->name('allcategory');
Route::get('/category/delete/{id}',[CategoryController::class,'category_delete'])->name('category.delete');
Route::get('/category/delete/all/{id}',[CategoryController::class,'category_delete_all'])->name('category.delete_all');

});
