<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class Blog extends Model
{
	protected $table = 'blog';

     public static function getList()
    {
    	$commission = Blog::where('status','1')->paginate(20);

    	return $commission;
    }


    public static function edit($id)
    {
    	$commission = Blog::where('id', $id)->first();

    	return $commission;
    }

    public static function del($id)
    {
        $commission = Blog::where('id', $id)->delete();

        return true;
    }

    public static function BlogUpdate($request)
    {
    	   if($_FILES['blog_image']['tmp_name'])
            {
                $dir = 'profile/';
                  $url = \Config::get('app.blog_url');
                $path = 'storage' . DIRECTORY_SEPARATOR .'app'. DIRECTORY_SEPARATOR;
            
                    $fornt = $request->file('blog_image');
                    $filenamewithextension = $fornt->getClientOriginalName();
                    $photnam = str_replace('.','',microtime(true));
                    $filename = pathinfo($photnam, PATHINFO_FILENAME);
                    $extension = $fornt->getClientOriginalExtension();
                    $photo = $filename.'.'. $extension;   

                $store = $request->file('blog_image')->store('profile');

                $front_img = $url.$path.$store;   
            }

        $blog = new Blog();
    
        
        $blog->user_id       = \Auth::user()->id;
        $blog->title       = $request->title;
        $blog->description = $request->description; 
        $blog->start_date = $request->id_exp; 
        $blog->image       = $front_img;
        $blog->save();
        
        return true;   
    }

     public static function BlogUpdateSing($request)
    {
           if($_FILES['blog_image']['tmp_name'])
            {
                $dir = 'profile/';
                  $url = \Config::get('app.blog_url');
                $path = 'storage' . DIRECTORY_SEPARATOR .'app'. DIRECTORY_SEPARATOR;
            
                    $fornt = $request->file('blog_image');
                    $filenamewithextension = $fornt->getClientOriginalName();
                    $photnam = str_replace('.','',microtime(true));
                    $filename = pathinfo($photnam, PATHINFO_FILENAME);
                    $extension = $fornt->getClientOriginalExtension();
                    $photo = $filename.'.'. $extension;   

                $store = $request->file('blog_image')->store('profile');

                $front_img = $url.$path.$store;   
            }

        $blog = Blog::where('id',$request->id)->first();
    
        
        $blog->user_id       = \Auth::user()->id;
        $blog->title       = $request->title;
        $blog->description = $request->description; 
        $blog->start_date = $request->id_exp; 
        $blog->image       = $front_img;
        $blog->save();
        
        return true;   
    }

       public static function index()
    {
        $commission = Blog::paginate(20);

        return $commission;
    }

     public static function commissionUpdate($request)
    {

        $commission = Blog::where('id', $request->id)->first();

         if($_FILES['blog_image']['tmp_name'])
            {
                $dir = 'profile/';
                  $url = \Config::get('app.blog_url');
                $path = 'storage' . DIRECTORY_SEPARATOR .'app'. DIRECTORY_SEPARATOR;
            
                    $fornt = $request->file('blog_image');
                    $filenamewithextension = $fornt->getClientOriginalName();
                    $photnam = str_replace('.','',microtime(true));
                    $filename = pathinfo($photnam, PATHINFO_FILENAME);
                    $extension = $fornt->getClientOriginalExtension();
                    $photo = $filename.'.'. $extension;   

                $store = $request->file('blog_image')->store('profile');

                $front_img = $url.$path.$store;   
            }

    
        $commission->title       = $request->title;
        $commission->description = $request->description; 
        $commission->start_date = $request->id_exp; 
        $commission->image       = $front_img;
        $commission->status       = $request->status;
        $commission->save();
        
        return true;   
    }



}
