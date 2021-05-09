<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\subscribe;
use App\Models\Category;
use Share;

class FrontendController extends Controller
{

    /**
     * INDEX
     */

    public function index()
    {
        return view('frontend.index');
    }
    public function singlePost($id)
    {
    $singleposts = Post::where('id', $id)->first();
       return view('frontend.singlepost', compact('singleposts'));
    }


    public function post_search(Request $request)
    {
 
        $search = $request->search;
        $allposts = Post::where('title', 'LIKE', $request->search)->get();
        return view('frontend.search', compact('allposts', 'search'));
    }

    public function category_list()
    {
        $categories = Category::where('publish', 1)->get();
        return view('frontend.categorylist',compact('categories'));
    }

    public function category_posts($id)
        {
            $posts = Post::where('category_id', $id)
                    ->with('category')
                    ->with('user')
                    ->get();
           return view('frontend.category_posts', compact('posts'));
            
        }
    public function share()
    {
        return redirect()->to(Share::currentPage()->facebook()->getRawLinks());
    }

    public function subscribe(Request $request)
    {
       $sub = new subscribe;
       $sub->email = $request->email;
       $sub->save();
       return back();
    }
    
    
    //end
}
