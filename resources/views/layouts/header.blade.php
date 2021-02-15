<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard | {{ config('app.name') }} </title>

    <!-- favicon !-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('favicon/favicon.png') }}">
    <link rel="shortcut icon" href="{{ url('favicon/favicon.jpg') }}" >
    <link rel="manifest" href="{{ url('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ url('adminpanel/dist/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminpanel/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminpanel/js/jquery.scrollbar/jquery.scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('adminpanel/css/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminpanel/css/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ url('adminpanel/font-awesome/css/font-awesome.min.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ url('adminpanel/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminpanel/css/pagination.css') }}">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    @stack('customscripts')
</head>

<body data-sa-theme="7">
    <main class="main">
        <header class="header">
            <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
                <i class="zmdi zmdi-menu"></i>
            </div>

            <div class="logo hidden-sm-down">
                <h1><a href="#">               
                    <img src="{{ url('/images/logo.png') }}" class="logo-text-1" />              
                </a></h1>
            </div>

            <ul class="top-nav">
                <li class="hidden-xl-up"><a href="#" data-sa-action="search-open"><i class="zmdi zmdi-search"></i></a></li>
                <li class="dropdown top-nav__notifications">
                    <a href="#" data-toggle="dropdown" class="top-nav__notify">
                        <i class="zmdi zmdi-notifications"></i> 
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                </li>
            </ul>

         <!--    <div class="clock hidden-md-down">
                <div class="time">
                    <span class="hours"></span>
                    <span class="min"></span>
                    <span class="sec"></span>
                </div>
            </div> -->
            </header>

            <aside class="sidebar">
                <div class="scrollbar-inner">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <div>
                                <div class="user__name">Admin</div>
                                <div class="user__email">Demo@admin.com</div>
                            </div>
                        </div>
                    </div>

                    <ul class="navigation">
                      <li class="@@photogalleryactive"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i>Dashboard</a></li>
                      
                      <li class="@@photogalleryactive"><a href="{{ url('admin/users') }}"><i class="zmdi zmdi-accounts-alt"></i> Users</a></li> 

                           <li class="@@photogalleryactive"><i class="fas fa-blog"></i>
                            <a href="{{ url('admin/blog') }}"><i class="zmdi zmdi-view-dashboard"></i>Blog</a>
                        </li>
                  

                <li class="@@photogalleryactive"><a href="{{ url('adminlogout') }}"><i class="zmdi zmdi-power-off"></i> Logout</a></li> 
            </ul>
        </div>
    </aside>

    @yield('content')

    @include('layouts.footer')