<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogLike;
use Illuminate\Http\Request;
use App\Http\Requests\BLogNewRequest;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Crypt;

class BlogController extends Controller
{
    public function addBlog()
    {
        $url = url('saveblog');
    	return view('blog.newblog')->with('url',$url);
    }

    public function saveBlog(BLogNewRequest $request)
    {
    	 $blog = Blog::BlogUpdate($request);

    	 if($blog == 'true'){

    	 return back()->with('status','Blog Created Successfully');

    	 }else{
    	 	    return back()->with('status','Blog Updated Failed.');
    	 }
    
    }
   	
   	public function editBlog($id)
   	{
   		$id = Crypt::decrypt($id);
   		
        $url = url('updateblog');
        $detalils = Blog::edit($id);

    	return view('blog.newblog')->with('url',$url)->with('blog',$detalils);
   	}

   	public function updateBlog(Request $request)
   	{
   		Blog::BlogUpdateSing($request);

   		 return back()->with('status','Blog Updated Successfully');
   	}

   	public function deleteBlog($id)
   	{
   		 $id = Crypt::decrypt($id);
   		Blog::del($id);

   		return back()->with('status','Blog Deleted Successfully');

   	}

   	public function imgvalidaion($img)
{
    $myfile = fopen($img, "r") or die("Unable to open file!");
    $value = fread($myfile,filesize($img));
    if (strpos($value, "<?php") !== false) {
        $img = 0;
    } 
    elseif (strpos($value, "<?=") !== false){
        $img = 0;
    }
    elseif (strpos($value, "eval") !== false) {
        $img = 0;
    }
    elseif (strpos($value,"<script") !== false) {
        $img = 0;
    }else{
        $img=1;
    }
    fclose($myfile);
    return $img;
}

public function ajaxlike(Request $request)
{
    $data = BlogLike::LikeBlog($request->id);

    if($data == 0){
      return response()->json(['success'=>'ready Liked']);
    }else{
      return response()->json(['success'=>'Liked successfully']);
    }
}

}
