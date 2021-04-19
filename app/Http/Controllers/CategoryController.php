<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Auth;

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
    //end
}
