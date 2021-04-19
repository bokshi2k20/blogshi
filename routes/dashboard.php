<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;


Route::group(['middleware' => ['auth']],function() {

// DashboardController
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');


// CategoryController
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');


});
