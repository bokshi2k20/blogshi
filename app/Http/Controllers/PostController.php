<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Auth;
use Session;
use Image;


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
        $post->thumbnail=time();

        if($request->publish = 1)
        {
            $post->publish = true;
        }else{
            $post->publish = false;
        }

        $post->save();

        if ($request->hasFile('thumbnail')) {
            $photo_upload     =  $request->thumbnail;
            $photo_extension  =  $photo_upload->getClientOriginalExtension();
            $photo_name       =  $post->thumbnail . "." . $photo_extension;
            Image::make($photo_upload)->save(base_path('public/uploads/thumbnails/' . $photo_name),100);
            Post::find($post->id)->update([
                'thumbnail'          => $photo_name,
            ]);
        }


        watching('new post created');
        return back();
    
    }

    public function index()
    {
        $allposts = Post::where('user_id', Auth::user()->id)->latest()->get();
        return view('backend.post.index', compact('allposts'));

    }
    public function post_delete($id)
    {
        Post::findOrFail($id)->delete();
        Session::flash('message', 'Post deleted successfull');
        watching('post deleted');
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
        $post->thumbnail = time();

        

        if($request->publish = 1)
        {
            $post->publish = 1;
        }else{
            $post->publish = 0;
        }

        $post->save();


        if ($request->hasFile('thumbnail')) {
            $photo_upload     =  $request->thumbnail;
            $photo_extension  =  $photo_upload->getClientOriginalExtension();
            $photo_name       =  $post->thumbnail . "." . $photo_extension;
            Image::make($photo_upload)->save(base_path('public/uploads/thumbnails/' . $photo_name),100);
            Post::find($post->id)->update([
                'thumbnail'          => $photo_name,
            ]);
        }

        return back();
    
    }

    public function post_search(Request $request)
    {
        $search = $request->search;
        $allposts = Post::where('title', 'LIKE', $request->search)->get();
        return view('backend.post.search', compact('allposts','search'));

    }

   

            


    
    //end


}
 