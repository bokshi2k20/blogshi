<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use Auth;
use Session;

class CategoryController extends Controller
{
    public function category()
    {
        return view('frontend.category');
    }

    /**
     * CATEGORY CREATE
     */

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {

        $category = new Category;
        $category->title=$request->title;

        if ($request->hasFile('thumbnail')) {
            $category->thumbnail = fileUpload($request->file('thumbnail'), 'categories');
        }

        if($request->publish = 1)
        {
            $category->publish = 1;
        }else{
            $category->publish = 0;
        }

        if($request->menu = 1)
        {
            $category->menu = 1;
        }else{
            $category->menu = 0;
        }

        $category->save();
        return back();
    }
    public function allcategory()
    {
        $allcategories = Category::all();
        return view('backend.category.index', compact('allcategories'));

    }

    public function category_delete($id)
    {

        $check = Post::where('category_id',$id)->count();

        if ($check <= 0) {
            Category::findOrFail($id)->delete();
            Session::flash('message', 'Category deleted successfull');
            return back();
        }else{
            Session::flash('message', 'This category can not be deleted, because there have category related posts');
            return back();
        }

        return back();
    }

    public function category_delete_all($id)
    {

        $category = Category::findOrFail($id)->first();

        if ($category->delete()) {
            Post::where('category_id', $id)->delete();
            Session::flash('message', 'This category is deleted with related posts');
            return back();
        }else{
            Session::flash('message', 'Something went wrong!');
            return back();
        }
    
    }
    
    public function category_edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('backend.edit', compact('category'));
    }

    public function category_update(Request $request, $id)
    {

        $category = Category::where('id', $id)->first();
        $category->title=$request->title;

        if ($request->hasFile('thumbnail')) {
            $category->thumbnail = fileUpload($request->file('thumbnail'), 'categories');
        }

        if($request->publish == 1)
        {
            $category->publish = 1;
        }else{
            $category->publish = 0;
        }

        if($request->menu == 1)
        {
            $category->menu = 1;
        }else{
            $category->menu = 0;
        }

        $category->save();
        return back();
    }

    public function category_search(Request $request)
    {
        $search = $request->search;
        $allcategories = Category::where('title', 'LIKE', $request->search)->get();
        return view('backend.category.search', compact('allcategories','search'));

    }



            

    //end
}
