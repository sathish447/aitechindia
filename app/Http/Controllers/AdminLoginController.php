<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use Session;

class AdminLoginController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.adminlogin');
    }

    public function login(AdminLoginRequest $request)
    {
    	$login = Admin::login($request);

    	if($login != 0)
    	{
    		Session::put('adminId',$login);

    		return Redirect('admin/dashboard');
    	}
        else
        {
            return Redirect('/admin')->with('status','Invalid email or password');
        }

    }


    public function logout() {

      Session::flush();       
      \Auth::logout();
      return redirect('/');

    }
}
