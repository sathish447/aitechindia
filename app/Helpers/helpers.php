<?php

function user($id)
{
	$user = App\User::on('mysql2')->where('id',$id)->first();

	return $user;
}
function username($id)
{
	$user = App\User::on('mysql2')->where('id',$id)->first();

	return $user->fname;
}

function useremail($email)
{
	$user = App\User::on('mysql2')->where('email',$email)->first();

	return $user;
}
function country()
{
	
	$countries = App\Models\Countries::on('mysql2')->get();

	return $countries;
}

function country_name($id)
{
	$countries = App\Models\Countries::on('mysql2')->where('id',$id)->first();

	return $countries;
}

function blogStstus($id){

	$user_id = \Auth::user()->id;

	$blog = App\Models\Blog::where('id',$id)->where('user_id',$user_id)->first();

	if(is_object($blog)){

		return '1';

	}else{
		return '0';
	}

}









