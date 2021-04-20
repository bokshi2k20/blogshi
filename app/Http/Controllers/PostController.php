<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Auth;


class PostController extends Controller
{

    public function singlepost()
    {
        return view('frontend.singlepost');
    }

    public function index()
    {
        $posts = Post::with('category')->with('user')->get();
        return $posts;
    }

    public function create()
    {
        $categories = Category::where('publish', 1)->get();
        return view('backend.post.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $post = new Post;
        $post->title = $request->title;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->description = $request->description;

        if ($request->hasFile('thumbnail')) {
            $post->thumbnail = fileUpload($request->file('thumbnail'), 'posts');
        }

        if($request->publish = 1)
        {
            $post->publish = true;
        }else{
            $post->publish = false;
        }

        $post->save();
        return back();
    
    }
    
    //end


}
 