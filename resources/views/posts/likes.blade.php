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
    <!-- <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/base.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.css"> -->
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
<!-- Header -->
<header>
    <!-- Start Header -->
    <header class="header axil-header  header-light header-sticky ">
        <div class="header-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                    <div class="logo" style="display: flex; justify-content: center;">
                        <a href="/">
                            <img class="dark-logo" src="/assets/images/logo/logo-black.png" alt="Blogar logo">
                            <img class="light-logo" src="/assets/images/logo/logo-white2.png" alt="Blogar logo">
                        </a>
                    </div>
                </div>

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

                <div class="col-xl-6 d-none d-xl-block">
                    <div class="mainmenu-wrapper">
                        <nav class="mainmenu-nav">
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
                                    <div class="">
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
                                                                 src="/assets/images/logo/logo-black.png"
                                                                 alt="Logo Images">
                                                            <img class="light-logo"
                                                                 src="/assets/images/logo/logo-white2.png"
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


    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row" style="justify-content: center;">


                @auth
                    @php
                        $likedPosts = DB::table('post_like')
                                    ->where('user_id', auth()->user()->id)
                                    ->get();
                    @endphp




                    <div class="col-lg-8 col-xl-8">
                        @if ($likedPosts->isEmpty())
                            <div class="content-block post-list-view format-quote mt--30">
                                <div class="post-content">
                                    <h4 class="title" style="font-size: 24px; font-weight: bold">No posts found</h4>
                                </div>
                            </div>
                        @endif

                        @foreach ($allPosts as $post)
                            @if ($likedPosts->contains('post_id', $post->id))
                                @if ($post->getAttribute('approved') == 1 && $post->getAttribute('published_at') <= now())
                                    @if ($post->image == null)
                                        <div class="content-block post-list-view format-quote mt--30">
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                        <span class="hover-flip-item">
                                            {{-- <span data-text="TRAVEL">TRAVEL</span> --}}
                                        </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <h4 class="title" style="font-size: 24px; font-weight: bold">
                                                    <a href="{{ route('post.show', $post->slug) }}">{{$post->title}}</a>
                                                </h4>


                                                <div class="axil-single-widget widget widget_categories mb--30"
                                                     style="margin-top: 40px;">
                                                    <ul>
                                                        @foreach ($post->categories as $category)
                                                            <li class="cat-item">
                                                                <a class="inner"
                                                                   style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                                                    <div class="content">
                                                                        <h5 class="title"
                                                                            style="color: white; font-weight: 600; font-size: 16px">{{$category->title}}</h5>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name"
                                                                style="font-size: 16px; font-weight: 500">
                                                                <a class="hover-flip-item-wrapper"
                                                                   href="{{ route('post.author', $post->user_id) }}">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$post->author->name}}">{{$post->author->name}}</span>
                                                </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">
                                                                <li>{{$post->published_at->diffForHumans()}}</li>
                                                                <li>{{{$post->getReadingTime()}}} min read</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="social-share-transparent justify-content-end">
                                                        <livewire:like-button :key="$post->id" :$post/>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    @else

                                        <div class="content-block post-list-view mt--30">
                                            <div class="post-thumbnail">
                                                <a href="{{ route('post.show', $post->slug) }}">
                                                    <img src="{{$post->getThumbnailImage()}}" alt="Post Images">
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            {{-- <span class="hover-flip-item">
                                                                <span data-text="{{$post->categories()->first()->getAttributes('title')}}">{{$post->categories()->first()->getAttributes('title')}}</span>
                                                            </span> --}}
                                                        </a>
                                                    </div>
                                                </div>
                                                <h4 class="title" style="font-size: 24px; font-weight: bold;"><a
                                                        href="{{ route('post.show', $post->slug) }}">{{$post->title}}</a>
                                                </h4>

                                                <div class="axil-single-widget widget widget_categories mb--30"
                                                     style="margin-top: 40px;">
                                                    <ul>
                                                        @foreach ($post->categories as $category)
                                                            <li class="cat-item">
                                                                <a class="inner"
                                                                   style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                                                    <div class="content">
                                                                        <h5 class="title"
                                                                            style="color: white; font-weight: 600; font-size: 16px">{{$category->title}}</h5>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name"
                                                                style="font-size: 16px; font-weight: 500">
                                                                <a class="hover-flip-item-wrapper"
                                                                   href="{{ route('post.author', $post->user_id) }}">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$post->author->name}}">{{$post->author->name}}</span>
                                                </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">
                                                                <li>{{$post->published_at->diffForHumans()}}</li>
                                                                <li>{{{$post->getReadingTime()}}} min read</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="social-share-transparent justify-content-end">
                                                        <livewire:like-button :key="$post->id" :$post/>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        @endforeach


                    </div>

                @endauth

                @guest
                    <script>window.location = "/login";</script>
                @endguest


                <!-- Start Footer Area  -->
                <div class="axil-footer-area axil-footer-style-1 footer-variation-2">


                    <!-- Start Footer Top Area  -->
                    <div class="footer-top">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-4 col-md-4">
                                    <div class="logo">
                                        <a href="/">
                                            <img class="dark-logo" src="assets/images/logo/logo-black.png"
                                                 alt="Logo Images">
                                            <img class="white-logo" src="assets/images/logo/logo-white2.png"
                                                 alt="Logo Images">
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
                                                        class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="https://www.instagram.com/apiitsl"><i
                                                        class="fab fa-instagram"></i></a></li>
                                            <li><a href="https://x.com/APIITsl"><i class="fab fa-twitter"></i></a></li>
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
