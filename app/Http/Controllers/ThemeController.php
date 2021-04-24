<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use Image;

class ThemeController extends Controller
{
    public function index()
    {
        return view('backend.theme.index');
    }

    public function store(Request $request)
    {

        

        $theme = new Theme;
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

//end
}
