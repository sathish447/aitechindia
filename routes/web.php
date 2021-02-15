<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('addblog', 'BlogController@addBlog')->name('addblog');
Route::post('saveblog', 'BlogController@saveBlog')->name('saveblog');
Route::get('editblog/{id}', 'BlogController@editBlog')->name('editblog');
Route::post('updateblog', 'BlogController@updateBlog')->name('updateblog');


Route::post('ajaxlike', 'BlogController@ajaxlike')->name('ajaxlike');


Route::get('deleteblog/{id}', 'BlogController@deleteBlog')->name('deleteblog');


Route::get('admin', 'AdminLoginController@AdminLogin');
Route::post('adminlogin', 'AdminLoginController@login');

Route::get('adminlogout', 'AdminLoginController@logout');



Route::group([ 'middleware' => ['admin'], 'prefix'=>'admin', 'namespace' =>'Admin' ], function () 
{
	Route::get('dashboard', 'DashboardController@index');

	//blog
	Route::get('blog', 'BlogController@index');
	Route::get('blognew', 'BlogController@blognew');
	Route::post('blogadd', 'BlogController@blogAdd');
	Route::get('blogsettings/{id}', 'BlogController@edit');
	Route::get('blogdelete/{id}', 'BlogController@blogDelete');
	Route::post('blogupdate', 'BlogController@blogUpdate');

		//Users
	Route::get('users', 'UserController@index');
	Route::get('users_edit/{id}', 'UserController@edit');
	Route::post('update_user', 'UserController@update');
	Route::get('users_wallet/{id}', 'UserController@userWallet');
	Route::post('users/search', 'UserController@userSearchList');
	Route::post('user_status', 'UserController@userStatus');
	Route::get('user_excel/{id}', 'UserController@excel_view');
	Route::get('deactive_users', 'UserController@deactiveUser');
	Route::get('today_users', 'UserController@todayUser');



});
