<?php


use App\Helpers;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\Theme;
use App\Models\UserNotification;
use Stichoza\GoogleTranslate\GoogleTranslate;



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



function postCount($id)
{
    return Post::where('category_id', $id)->count();
}

function menucategories()
{
    $menucategories = Category::where('publish', 1)
                                ->where('menu', 1)
                                ->get();
     return $menucategories;
}

function logo()
{
    $logo = Theme::latest()->first();
    if($logo != null)
    {
        return $logo->logo;
    }else{
        return 'logo.png';
    }
}

function thumb($id)
{
    return Post::where('id', $id)->first()->thumbnail;
}

function totalVisitors()
{
    return DB::table('views')->count();
}

function totalPosts()
{
    return Post::count();
}

function totalCategories()
{
    return Category::count();
}

function monthlyVisitors()
{
    return  DB::table('views')->select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(viewed_at) as monthname"))
                ->whereYear('viewed_at', date('Y'))
                ->orderByRaw('DATE_FORMAT(viewed_at, "%m-%d")')
                ->groupBy('monthname')
                ->get();
}


function sentVisitorsCurrentMonthData()
  {
	return  DB::table('views')->whereMonth('viewed_at', date('m'))
			->whereYear('viewed_at', date('Y'))
			->count();
  }

  function weeklyVisitores()
  {
      $last7days = Carbon::now();
      $last7days->subDays(7);
  
      return DB::table('views')->select('viewed_at')
          ->groupBy('viewed_at')
          ->orderByRaw('COUNT(*) DESC')
          ->whereDate('viewed_at', '>=', $last7days)
          ->count();
   }


   function social()
   {
       return Theme::first();
   }

   function short_description()
   {
       return Theme::first()->description ?? null;
   }

   function footer_credit()
   {
       return Theme::first()->footer_credit ?? null;
   }

   
   function tr($text, $lang)
   {
       $tr = new GoogleTranslate;
       return $tr->setSource()->settarget($lang)->translate($text);
   }

   function setLang($language)
   {
       return Session::put('language', $language);
   }

   function lang()
   {
    return Session::get('language');
   }


   function allNotifications()
   {
        return UserNotification::where('user_id', Auth::id())->latest()->paginate(10);
        
   }

   function watching($message)
   {
        $notify = new UserNotification;
        $notify->user_id =  Auth::id();
        $notify->message =  $message;
        $notify->save();
        return back();
   }