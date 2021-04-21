<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Auth;
use Session;


class PostController extends Controller
{

   
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

    public function index()
    {
        $allposts = Post::latest()->get();
        return view('backend.post.index', compact('allposts'));

    }
    public function post_delete($id)
    {
        Post::findOrFail($id)->delete();
        Session::flash('message', 'Post deleted successfull');
        return back();
    }


    public function post_edit($id)
    {
        $post = Post::where('id', $id)->first();
        $categories = Category::where('publish', 1)->get();
        return view('backend.post.edit',compact('post', 'categories'));
    }

    public function post_update(Request $request, $id)
    {

        $post = Post::where('id', $id)->first();
        $post->title = $request->title;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->description = $request->description;

        if ($request->hasFile('thumbnail')) {
            $post->thumbnail = fileUpload($request->file('thumbnail'), 'posts');
        }

        if($request->publish = 1)
        {
            $post->publish = 1;
        }else{
            $post->publish = 0;
        }

        $post->save();
        return back();
    
    }

   

            


    
    //end


}
 