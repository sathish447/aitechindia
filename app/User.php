<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Blog;

use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','genger','dob','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public static function dashboard()
    {
        $totalusers = User::count();
        $totalblogs = Blog::count();
        $todayusers = User::whereDate('created_at',Carbon::today())->count();
    

        $details = array(
            'totalusers' => $totalusers,
            'todayusers' => $todayusers,
            'totalblogs' => $totalblogs,
     
            );

        return $details;
    }

    public static function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(30);

        return $users;
    }
}
