<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use Image;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::first();
        return view('backend.theme.index', compact('themes'));
    }

    public function store(Request $request)
    {

        

        $theme = Theme::firstOrNew();
        $theme->logo = time();
        $theme->save();

        // IMAGE UPLOAD

        if ($request->hasFile('logo')) {
            $photo_upload     =  $request->logo;
            $photo_extension  =  $photo_upload->getClientOriginalExtension();
            $photo_name       =  $theme->logo . "." . $photo_extension;
            Image::make($photo_upload)->save(base_path('public/uploads/logos/' . $photo_name),100);
            Theme::find($theme->id)->update([
                'logo'          => $photo_name,
            ]);
        }
       

        return back();
    }

    public function social_store(Request $request)
    {
        $social = Theme::firstOrNew();
        $social->facebook = $request->facebook;
        $social->youtube = $request->youtube;
        $social->pinterest = $request->pinterest;
        $social->twitter = $request->twitter;
        $social->flickr = $request->flickr;
        $social->instagram = $request->instagram;
        $social->save();
        return back();
    }

    public function description_store(Request $request)
    {
        $desc = Theme::firstOrNew();
        $desc->description = $request->description;
        $desc->save();
        return back();
    }

    public function footercredit_store(Request $request)
    {
        $footer = Theme::firstOrNew();
        $footer->footer_credit = $request->footer_credit;
        $footer->save();
        return back();
    }



//end
}
