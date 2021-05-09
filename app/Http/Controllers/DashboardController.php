<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscribe;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function all_subscription()
    {
        $subscribes = subscribe::all();
        return view('backend.subscription.subscription',compact('subscribes'));
    }

    public function subscribe_delete($id)
    {
        subscribe::where('id',$id)->delete();
        return back();
    }
    //end
}
