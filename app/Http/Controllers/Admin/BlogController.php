<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\BlogRequest;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;


class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {	
    	$commission = Blog::index(); 

    	return view('admin.blog.blog',[
    			'commissions' => $commission, 
    		]);
    }

    public function blognew()
    {   
        return view('admin.blog.newblog');
    }

    public function blogAdd(BlogRequest $request)
    { 
        $blog = new Blog();

        if(Input::hasFile('blog_image')){

           // $url = \Config::get('app.url'); 
               $url = 'http://admin.hashogen.com/'; 

            $dir = 'blog';
            $path = 'storage' . DIRECTORY_SEPARATOR .'app'. DIRECTORY_SEPARATOR.'public'. DIRECTORY_SEPARATOR. $dir;

            $fornt = Input::File('blog_image');
            $fornt->move($path, $fornt->getClientOriginalName());
            $front_img = $path.'/'.$fornt->getClientOriginalName();
            $front_img = $url.'/'.$path.'/'.$fornt->getClientOriginalName();
        }
    
        
        $blog->title       = $request->title;
        $blog->description = $request->description; 
        $blog->start_date = $request->id_exp; 
        $blog->image       = $front_img;
        $blog->save();


        return back()->with('status','Blog Updated Successfully');
    }

    public function edit($id)
    {
        $commission = Blog::edit(Crypt::decrypt($id));
      
        
        return view('admin.blog.editblog')->with('commission',$commission);
    }

    public function blogUpdate(BlogRequest $request)
    { 
        $commission = Blog::commissionUpdate($request);

        return back()->with('status','Blog Updated Successfully');
    }

     public function blogDelete($id)
    { 
        $commission = Blog::del(Crypt::decrypt($id));

        return back()->with('status','Blog Deleted Successfully');
    }
}
