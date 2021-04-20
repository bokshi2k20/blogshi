<?php


use App\Helpers;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
//Get file path
//path is storage/app/
function filePath($file)
{
    return asset($file);
}

//delete file
function fileDelete($file)
{
    if ($file != null) {
        if (file_exists(public_path($file))) {
            unlink(public_path($file));
        }
    }
}

//uploads file
// uploads/folder
function fileUpload($file, $folder)
{
    return $file->store('uploads/' . $folder);
}

function posts()
{
    $posts = Post::where('publish', 1)->with('category')->with('user')->latest()->get();
    return $posts;
}

function categories()
{
    $categories = Category::where('publish', 1)->latest()->get();
    return $categories;
}