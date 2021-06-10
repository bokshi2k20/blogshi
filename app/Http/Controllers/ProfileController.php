<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Image;
use Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'mimes:jpg,bmp,png',
        ]);


        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;


        if ($user->email != $request->email) {

            $validated = $request->validate([
                'email' => 'required|unique:users|email',
            ]);

            $user->email = $request->email; 
        }

        
        if($request->has('password')){
            $user->password = Hash::make($request->password);        
        }

        $user->save();       
       
        if ($request->hasFile('image')) {
            $photo_upload     =  $request->image;
            $photo_extension  =  $photo_upload->getClientOriginalExtension();
            $photo_name       =  time() . "." . $photo_extension;
            Image::make($photo_upload)->save(base_path('public/uploads/users/' . $photo_name),100);
            $image_save = User::where('id', Auth::user()->id)->first();
            $image_save->image = $photo_name;
            $image_save->save();
        }     


        watching('profile stored');

        return back();
    }

    //End
}
