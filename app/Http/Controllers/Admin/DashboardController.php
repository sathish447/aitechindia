<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Session;
use App\User;
use App\Models\Security;
use App\Models\Admin;
use App\Traits\Dashboard;

class DashboardController extends Controller
{
    use Dashboard;

	public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
    	$dashboard = User::dashboard();
   

    	return view('dashboard')->with('details',$dashboard);
    }

    public function security()
    {
    	return view('settings.security');
    }

    public function updateUsername(Request $request)
    {
        $update = Admin::updateUsername($request);

        return back()->with('status',$update);
    }

    public function changepassword(Request $request)
    {
        $update = Admin::changepassword($request);

        return back()->with('status',$update);
    }
}
