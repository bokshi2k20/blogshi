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
            $category->publish = true;
        }else{
            $category->publish = false;
        }

        if($request->menu = 1)
        {
            $category->menu = true;
        }else{
            $category->menu = false;
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

            

    //end
}
