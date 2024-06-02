<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>APIIT</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .icon {
            position: relative;
        }

        .notification-dot::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: red;
        }
    </style>


</head>

<body>

<header>
    <!-- Start Header -->
    <header class="header axil-header  header-light header-sticky ">
        <div class="header-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                    <div class="logo" style="display: flex; justify-content: center;">
                        <a href="/">
                            <img class="dark-logo" src="assets/images/logo/logo-black.png" alt="Blogar logo">
                            <img class="light-logo" src="assets/images/logo/logo-white2.png" alt="Blogar logo">
                        </a>
                    </div>
                </div>

                <div class="col-xl-6 d-none d-xl-block">
                    <div class="mainmenu-wrapper">
                        <nav class="mainmenu-nav">
                            @php
                                $userType = '';
                                if (\Illuminate\Support\Facades\Auth::check()) {
                                    if (auth()->user()->role->value == 1)
                                    $userType = 'admin';
                                    else if (auth()->user()->role->value == 2) {
                                        $userType = 'editor';
                                    } else if (auth()->user()->role->value == 3) {
                                        $userType = 'sss';
                                    } else if (auth()->user()->role->value == 4) {
                                        $userType = 'alumniLiaison';
                                    } else if (auth()->user()->role->value == 5) {
                                        $userType = 'academics';
                                    } else if (auth()->user()->role->value == 6) {
                                        $userType = 'nonAcademics';
                                    } else if (auth()->user()->role->value == 7) {
                                        $userType = 'user';
                                    } else if (auth()->user()->role->value == 8) {
                                        $userType = 'alumni';
                                    } else if (auth()->user()->role->value == 9) {
                                        $userType = 'club';
                                    }
                                }
                            @endphp

                            <!-- Start Mainmanu Nav -->
                            <ul class="mainmenu">
                                <li class="menu-item-has-children"><a href="/">Home</a></li>

                                <li class="menu-item-has-children"><a href="{{route('post.index')}}">Articles</a>
                                    @auth
                                        @if (\Illuminate\Support\Facades\Auth::check() && auth()->user()->approved == 1)

                                            <ul class="axil-submenu">
                                                <li>
                                                    <a class="hover-flip-item-wrapper" href="{{route('post.index')}}">
                                                    <span class="hover-flip-item">
                                                        <span data-text="All Articles">All Articles</span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="hover-flip-item-wrapper"
                                                       href="/{{ $userType }}/posts/create"
                                                       target="_blank">
                                                    <span class="hover-flip-item">
                                                        <span data-text="Write Articles">Write Articles</span>
                                                    </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        @endif
                                    @endauth

                                </li>


                                @auth
                                    @if (auth()->user()->approved == 1 && (auth()->user()->role->value == 1 || auth()->user()->role->value == 4 || (auth()->user()->role->value == 7 && auth()->user()->degree_level != 1 && auth()->user()->degree_level != 2 && auth()->user()->degree_level != 3 && auth()->user()->degree_level != 4) || auth()->user()->role->value == 8))
                                        <li class="menu-item-has-children"><a href="{{url('job')}}">Vacancies</a>
                                            @auth
                                                @if (auth()->user()->role->value == 1 || auth()->user()->role->value == 4 || auth()->user()->role->value == 8)

                                                    <ul class="axil-submenu">
                                                        <li>
                                                            <a class="hover-flip-item-wrapper"
                                                               href="{{ url('job') }}">
                                                    <span class="hover-flip-item">
                                                        <span data-text="View Vacancies">View Vacancies</span>
                                                    </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="hover-flip-item-wrapper"
                                                               href="/{{ $userType }}/jobs/create" target="_blank">
                                                    <span class="hover-flip-item">
                                                        <span data-text="Create Vacancies">Create Vacancies</span>
                                                    </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endif
                                            @endauth

                                        </li>
                                    @endif
                                @endauth


                                @auth
                                    @if (auth()->user()->approved == 1)
                                        <li class="menu-item-has-children megamenu-wrapper"><a href="{{url('likes')}}">Favourites</a>
                                        </li>
                                    @endif
                                @endauth

                                <li class="menu-item-has-children"><a href="{{url('event')}}">Events</a>
                                    @auth

                                        @if (auth()->user()->role->value == 1 || auth()->user()->role->value == 9)
                                            <ul class="axil-submenu">
                                                <li>
                                                    <a class="hover-flip-item-wrapper" href="{{url('event')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="View Events">View Events</span>
                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="hover-flip-item-wrapper"
                                                       href="/club/events/create" target="_blank">
                                                    <span class="hover-flip-item">
                                                        <span
                                                            data-text="Add Events">Add Events</span>
                                                    </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        @endif
                                    @endauth
                                </li>


                                @auth
                                    @if (auth()->user()->role->value == 3)
                                        <li class="menu-item-has-children"><a>Appointments</a>
                                            <ul class="axil-submenu">
                                                <li>
                                                    <a class="hover-flip-item-wrapper"
                                                       href="{{ url('appointments') }}" target="_blank">
                                                    <span class="hover-flip-item">
                                                        <span
                                                            data-text="View Schedule">View Schedule</span>
                                                    </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="hover-flip-item-wrapper"
                                                       href="/sss/holidays" target="_blank">
                                                    <span class="hover-flip-item">
                                                        <span
                                                            data-text="Manage Off Days">Manage Off Days</span>
                                                    </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @elseif (auth()->user()->role->value == 7)
                                        <li class="menu-item-has-children"><a>Support</a>
                                            <ul class="axil-submenu">
                                                <li>
                                                    <a class="hover-flip-item-wrapper"
                                                       href="/user/appointments/create" target="_blank">
                                                    <span class="hover-flip-item">
                                                        <span
                                                            data-text="Book an Appointment with Student Support Services (SSS)">Book an Appointment with Student Support Services (SSS)</span>
                                                    </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                @endauth

                            </ul>
                            <!-- End Mainmanu Nav -->
                        </nav>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">
                    <div class="header-search text-end d-flex align-items-center">
                        <a href="{{route('post.index')}}">
                            <form class="header-search-form d-sm-block d-none">
                                <div class="axil-search form-group">
                                    <button type="submit" class="search-button"><i
                                            class="fal fa-search"></i></button>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </a>
                        <div class="mobile-search-wrapper d-sm-none d-block">

                            <button class="search-button-toggle"><i class="fal fa-search"></i></button>


                            <form class="header-search-form">
                                <div class="axil-search form-group">
                                    <button type="submit" class="search-button"><i
                                            class="fal fa-search"></i></button>
                                    <a href="{{route('post.index')}}">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </a>
                                </div>
                            </form>
                        </div>

                        <ul class="metabar-block">

                            @if (Route::has('login'))
                                @auth
                                    @if (auth()->user()->approved == 1)
                                        @if (auth()->user()->role->value == 1)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/admin') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/admin') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @elseif (auth()->user()->role->value == 2)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/editor') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/editor') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @elseif (auth()->user()->role->value == 3)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/sss') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/sss') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @elseif (auth()->user()->role->value == 4)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/alumniLiaison') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/alumniLiaison') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @elseif (auth()->user()->role->value == 5)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/academics') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/academics') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @elseif (auth()->user()->role->value == 6)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/nonAcademics') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/nonAcademics') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @elseif (auth()->user()->role->value == 7)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/user') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/user') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @elseif (auth()->user()->role->value == 8)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/alumni') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/alumni') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @elseif (auth()->user()->role->value == 9)
                                            @if (auth()->user()->unreadNotifications->count() > 0)
                                                <li class="icon notification-dot"><a href="{{ url('/club') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                                </li>
                                            @else
                                                <li class="icon"><a href="{{ url('/club') }}" target="_blank"><i
                                                            class="fas fa-cog"></i></a>
                                            @endif

                                        @endif
                                    @endif
                                    <li class="icon">
                                        <a>
                                            <form method="post" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <button type="submit" @click.prevent="$root.submit();"
                                                        style="border: none;">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                </button>
                                            </form>
                                        </a>
                                    </li>
                                @endauth
                            @endif

                            <li>
                                @if (Route::has('login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                        @auth
                                            @if (Auth::check())
                                                <a href="{{ url('/user/profile') }}">
                                                    <img src="{{ Auth::user()->profile_photo_url }}"
                                                         alt="{{ Auth::user()->name }}">
                                                </a>
                                            @endif

                                        @else

                                            @if (Route::has('login'))
                                                <li class="icon">
                                                    <a href="{{ route('login') }}">
                                                        <i class="fas fa-user-circle"></i>
                                                    </a>
                                                </li>
                                            @endif

                                        @endauth

                                        {{-- mobile responsive --}}
                                        <div class="popup-mobilemenu-area">
                                            <div class="inner">
                                                <div class="mobile-menu-top">
                                                    <div class="logo">
                                                        <a href="/">
                                                            <img class="dark-logo" style="border-radius: 0;"
                                                                 src="assets/images/logo/logo-black.png"
                                                                 alt="Logo Images">
                                                            <img class="light-logo"
                                                                 src="assets/images/logo/logo-white2.png"
                                                                 alt="Logo Images">
                                                        </a>
                                                    </div>
                                                    <div class="mobile-close">
                                                        <div class="icon close-menu">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Main Menu -->
                                                <ul class="mainmenu">
                                                    <li><a href="/">Home</a></li>

                                                    <li><a href="{{route('post.index')}}">All Articles</a></li>
                                                    @auth
                                                        <li><a href="/{{ $userType }}/posts/create" target="_blank">Write
                                                                Articles</a></li>
                                                    @endauth

                                                    @auth
                                                        @if (auth()->user()->approved == 1 && (auth()->user()->role->value == 1 || auth()->user()->role->value == 4 || (auth()->user()->role->value == 7 && auth()->user()->degree_level != 1 && auth()->user()->degree_level != 2 && auth()->user()->degree_level != 3 && auth()->user()->degree_level != 4) || auth()->user()->role->value == 8))
                                                            <li><a href="{{url('job')}}">View Vacancies</a></li>
                                                        @endif

                                                        @if (auth()->user()->role->value == 1 || auth()->user()->role->value == 4 || auth()->user()->role->value == 8)
                                                            <li>
                                                                <a href="/{{ $userType }}/jobs/create" target="_blank">Create
                                                                    Vacancies
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endauth

                                                    @auth
                                                        @if (auth()->user()->approved == 1)
                                                            <li><a href="{{url('likes')}}">Favourites</a>
                                                            </li>
                                                        @endif
                                                    @endauth

                                                    <li><a href="{{url('event')}}">View Events</a></li>

                                                    @auth
                                                        @if (auth()->user()->role->value == 1 || auth()->user()->role->value == 9)
                                                            <li><a href="/club/events/create" target="_blank">Add
                                                                    Events</a></li>
                                                        @endif
                                                    @endauth

                                                    @auth
                                                        @if (auth()->user()->role->value == 3)
                                                            <li><a href="{{url('appointments')}}">Appointment Schedule</a></li>

                                                            <li><a href="/sss/holidays">Manage Off Days</a></li>

                                                        @elseif (auth()->user()->role->value == 7)

                                                            <li><a href="/user/appointments/create" target="_blank">Book
                                                                    an
                                                                    Appointment with Student Support Services (SSS)</a>
                                                                </a>
                                                            </li>

                                                        @endif
                                                    @endauth


                                                </ul>
                                            </div>
                                        </div>


                                        @if (Auth::check() == false)
                                            <div class="hamburger-menu d-block d-xl-none">
                                                <div class="hamburger-inner">
                                                    <div class="icon open-menu"><i class="fal fa-bars"></i></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </li>
                        </ul>
                        <!-- Start Hamburger Menu  -->
                        @if (Auth::check())
                            <div class="hamburger-menu d-block d-xl-none">
                                <div class="hamburger-inner">
                                    <div class="icon open-menu"><i class="fal fa-bars"></i></div>
                                </div>
                            </div>
                        @endif
                        <!-- End Hamburger Menu  -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header -->
</header>

<div class="main-wrapper">

    <h1 class="d-none">Home Tech Blog</h1>
    <!-- Start Post List Wrapper  -->
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <livewire:post-list/>

                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40" style="padding-top: 30px;">
                    <!-- Start Sidebar Area  -->
                    <div class="sidebar-inner">


                        <!-- Start Single Widget  -->
                        <livewire:search-box/>
                        <!-- End Single Widget  -->

                        <div class="axil-single-widget widget widget_categories mb--30">
                            <ul>
                                <li class="cat-item">
                                    <a class="inner" href="?sort=desc" style="justify-content: center">
                                        <div class="content">
                                            {{-- if the current url is equal to ?sort=desc, then add the style to the h5 tag --}}
                                            {{--                                            <h5 class="title" style="{{request()->get('sort') == 'desc' ? 'color: #41bcb8' : ''}} font-size: 18px; font-weight: bold;">Latest</h5>--}}
                                            @if(request()->get('sort') == 'desc')
                                                <h5 class="title"
                                                    style="color: #41bcb8; font-size: 18px; font-weight: bold;">
                                                    Latest</h5>
                                            @else
                                                <h5 class="title" style="font-size: 18px; font-weight: bold;">
                                                    Latest</h5>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                                <li class="cat-item">
                                    <a class="inner" href="?sort=asc" style="justify-content: center">
                                        <div class="content">
                                            {{--                                            <h5 class="title" style="{{request()->get('sort') == 'asc' ? 'color: #41bcb8' : ''}} font-size: 18px; font-weight: bold;">Oldest</h5>--}}
                                            @if(request()->get('sort') == 'asc')
                                                <h5 class="title"
                                                    style="color: #41bcb8; font-size: 18px; font-weight: bold;">
                                                    Oldest</h5>
                                            @else
                                                <h5 class="title" style="font-size: 18px; font-weight: bold;">
                                                    Oldest</h5>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">
                                Categories</h5>
                            <!-- Start Post List  -->
                            <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li class="cat-item" style="padding: 5px 5px;">
                                            <a href="{{ route('post.index', ['category' => $category->slug]) }}"
                                               class="inner"
                                               style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                                <div class="content">
                                                    <h5 class="title"
                                                        style="font-size: 18px; font-weight: bold;">{{$category->title}}
                                                        ({{($category->posts->where('approved', true)->where('published_at', '<=', now())->count())}}
                                                        )</h5>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Post List  -->
                        </div>


                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">
                                Filters</h5>
                            <!-- Start Post List  -->
                            <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>

                                    <li class="cat-item" style="padding: 5px 5px;">
                                        <a href="{{ route('post.index', ['role' => '5']) }}"

                                           class="inner"
                                           style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '5')
                                                    <h5 class="title"
                                                        style="color: #41bcb8; font-size: 18px; font-weight: bold;">
                                                        Academics</h5>
                                                @else
                                                    <h5 class="title" style="font-size: 18px; font-weight: bold;">
                                                        Academics</h5>
                                                @endif
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item" style="padding: 5px 5px;">
                                        <a href="{{ route('post.index', ['role' => '6']) }}"

                                           class="inner"
                                           style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '6')
                                                    <h5 class="title"
                                                        style="color: #41bcb8; font-size: 18px; font-weight: bold;">
                                                        Non-Academics</h5>
                                                @else
                                                    <h5 class="title" style="font-size: 18px; font-weight: bold;">
                                                        Non-Academics</h5>
                                                @endif
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item" style="padding: 5px 5px;">
                                        <a href="{{ route('post.index', ['role' => '7']) }}"
                                           class="inner"
                                           style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '7')
                                                    <h5 class="title"
                                                        style="color: #41bcb8; font-size: 18px; font-weight: bold;">
                                                        Students</h5>
                                                @else
                                                    <h5 class="title" style="font-size: 18px; font-weight: bold;">
                                                        Students</h5>
                                                @endif
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item" style="padding: 5px 5px;">
                                        <a href="{{ route('post.index', ['role' => '8']) }}"
                                           class="inner"
                                           style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '8')
                                                    <h5 class="title"
                                                        style="color: #41bcb8; font-size: 18px; font-weight: bold;">
                                                        Alumni</h5>
                                                @else
                                                    <h5 class="title" style="font-size: 18px; font-weight: bold;">
                                                        Alumni</h5>
                                                @endif
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_social mb--30">
                                <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">Stay
                                    In
                                    Touch</h5>
                                <!-- Start Post List  -->
                                <ul class="social-icon md-size justify-content-center">
                                    <li><a href="https://www.facebook.com/APIITofficial"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/apiitsl"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://x.com/APIITsl"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://youtube.com/@APIITedu"><i
                                                class="fab fa-youtube"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <!-- End Post List  -->
                            </div>
                            <!-- End Single Widget  -->

                        </div>
                        <!-- End Sidebar Area  -->


                    </div>
                </div>
            </div>
        </div>
        <!-- End Post List Wrapper  -->
    </div>
</div>


<!-- Start Footer Area  -->
<div class="axil-footer-area axil-footer-style-1 footer-variation-2">


    <!-- Start Footer Top Area  -->
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="/">
                            <img class="dark-logo" src="assets/images/logo/logo-black.png" alt="Logo Images">
                            <img class="white-logo" src="assets/images/logo/logo-white2.png" alt="Logo Images">
                        </a>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8">
                    <!-- Start Post List  -->
                    <div
                        class="d-flex justify-content-start mt_sm--15 justify-content-md-end align-items-center flex-wrap">
                        <h5 class="follow-title mb--0 mr--20">Follow Us</h5>
                        <ul class="social-icon color-tertiary md-size justify-content-start">
                            <li><a href="https://www.facebook.com/APIITofficial"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/apiitsl"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://youtube.com/@APIITedu"><i
                                        class="fab fa-youtube"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Post List  -->
                </div>

            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->

    <!-- Start Copyright Area  -->
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-8">
                    <div class="copyright-left">
                        <ul class="mainmenu justify-content-start">
                            <li>
                                <a class="hover-flip-item-wrapper" href="https://apiit.lk/">
                                        <span class="hover-flip-item">
                                            <span data-text="Contact Us">Contact Us</span>
                                        </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="copyright-right text-start text-md-end mt_sm--20">
                        <p class="b3">All Rights Reserved © 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</div>


<!-- JavaScript -->
<script src="assets/js/vendor/jquery.min.js"></script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/vendor/slick.min.js"></script>
<script src="assets/js/vendor/tweenmax.min.js"></script>
<script src="assets/js/vendor/jquery.js"></script>
<script src="assets/js/vendor/slick.min.js"></script>
<script src="assets/js/main.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>


</body>

</html>


