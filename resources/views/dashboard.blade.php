@extends('layouts.header')
@section('title', 'Admin Dashboard')
@section('content') 
<section class="content">
    <header class="content__title">
        <h1>Dashboard</h1>
    </header>
    <div class="row quick-stats listview2">
        <div class="col-sm-6 col-md-3">
             <!-- <a href="{{ url('admin/today_users') }}"> -->
            <div class="quick-stats__item">
                <div class="quick-stats__info col-md-8">
                    <h2>{{ $details['todayusers'] }}</h2>
                    <small>New Users</small> </div>
                    <div class="col-md-4 text-right">
                        <h1><i class="fa fa-user"></i></h1>
                    </div>
                </div>
                <!-- </a> -->
            </div>
            
            <div class="col-sm-6 col-md-3">
                 <!-- <a href="{{ url('admin/users') }}"> -->
                <div class="quick-stats__item">
                    <div class="quick-stats__info col-md-8">                       
                        <h2>{{ $details['totalusers'] }}</h2>
                        <small>Total Users</small> </div>
                        <div class="col-md-4 text-right">
                            <h1><i class="fa fa-users" aria-hidden="true"></i></h1>
                        </div>
                    </div>
                    <!-- </a> -->
                </div>

                     <div class="col-sm-6 col-md-3">
                 <!-- <a href="{{ url('admin/users') }}"> -->
                <div class="quick-stats__item">
                    <div class="quick-stats__info col-md-8">                       
                        <h2>{{ $details['totalblogs'] }}</h2>
                        <small>Total Blogs</small> </div>
                        <div class="col-md-4 text-right">
                            <h1><i class="fa fa-users" aria-hidden="true"></i></h1>
                        </div>
                    </div>
                    <!-- </a> -->
                </div>
             
               
                    </div>
				
				
                </section>



@endsection