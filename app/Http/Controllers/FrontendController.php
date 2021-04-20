<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
    //end
}
