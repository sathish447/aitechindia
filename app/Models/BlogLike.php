<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class BlogLike extends Model
{
	protected $table = 'bloglike';
	protected $fillable = ['blog_id','user_id'];

	public static function LikeBlog($id)
	{


		$blog = BlogLike::where('blog_id',$id)->where('user_id',\Auth::user()->id)->first();

		if(is_object($blog)){

			return '0';

		}else{

			BlogLike::create([
				'blog_id' => $id,
				'user_id' => \Auth::user()->id,
			]);

			$blog_ststus = Blog::where('id',$id)->first();

			$blog_ststus->liked_count = $blog_ststus->liked_count+1;
			$blog_ststus->save(); 



			return '1';
		}
	}
}
