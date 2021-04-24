<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/sample', function(){
    return view('backend.sample.table');
});



/**
 * FRONTEND CONTROLLER
 */

Route::get('/',[FrontendController::class,'index'])->name('homepage');
Route::get('/{id}/post',[FrontendController::class,'singlePost'])->name('single.post');
Route::get('search',[FrontendController::class,'post_search'])->name('frontend.post.search');
Route::get('category/list',[FrontendController::class,'category_list'])->name('category.list');
Route::get('category/posts/{id}',[FrontendController::class,'category_posts'])->name('category.posts');


/**
 * POST CONTROLLER
 */
Route::get('category',[CategoryController::class,'category'])->name('category');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
