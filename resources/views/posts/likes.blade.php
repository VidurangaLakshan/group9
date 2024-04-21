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

</head>

<body>
<!-- Header -->
<header>
    <!-- Start Header -->
    <header class="header axil-header  header-light header-sticky ">
        <div class="header-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                    <div class="logo">
                        <a href="/">
                            <img class="dark-logo" src="assets/images/logo/logo-black.png" alt="Blogar logo">
                            <img class="light-logo" src="assets/images/logo/logo-white2.png" alt="Blogar logo">
                        </a>
                    </div>
                </div>

                <div class="col-xl-6 d-none d-xl-block">
                    <div class="mainmenu-wrapper">
                        <nav class="mainmenu-nav">
                            <!-- Start Mainmanu Nav -->
                            <ul class="mainmenu">
                                <li class="menu-item-has-children"><a href="/">Home</a>

                                </li>

                                <li class="menu-item-has-children"><a href="{{url('student')}}">Students</a></li>


                                <li class="menu-item-has-children megamenu-wrapper"><a
                                        href="{{url('staff')}}">Academics</a></li>

                                <li><a href="{{url('alumni')}}">Alumni</a></li>


                                <li class="menu-item-has-children"><a href="#">Articles</a>
                                    <ul class="axil-submenu">
                                        <li>
                                            <a class="hover-flip-item-wrapper" href="{{route('post.index')}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="All Articles">All Articles</span>
                                                </span>
                                            </a>
                                        </li>


                                        @auth
                                            @if (auth()->user()->role->value == 1)
                                                <li>
                                                    <a class="hover-flip-item-wrapper" href="{{ url('/admin') }}">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Write Articles">Write Articles</span>
                                                            </span>
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="hover-flip-item-wrapper" href="{{ url('/user') }}">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Write Articles">Write Articles</span>
                                                            </span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endauth


                                    </ul>
                                </li>
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
                                    @if (auth()->user()->role->value == 1)
                                        <li class="icon"><a href="{{ url('/admin') }}"><i class="fas fa-cog"></i></a>
                                        </li>
                                    @else
                                        <li class="icon"><a href="{{ url('/user') }}"><i class="fas fa-cog"></i></a>
                                        </li>
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
                                                            <img class="dark-logo"
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
{{--                                                    <li><a href="/student">Students</a></li>--}}
{{--                                                    <li><a href="/staff">Academics</a></li>--}}
{{--                                                    <li><a href="{{ route('alumni') }}">Alumni</a></li>--}}
                                                    <li><a href="{{route('post.index')}}">All Articles</a></li>


                                                    @auth
                                                        @if (auth()->user()->role->value == 1)
                                                            <li><a href="{{ url('/admin') }}">Write Articles</a>
                                                            </li>
                                                        @else
                                                            <li><a href="{{ url('/user') }}">Write Articles</a>
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
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- <div id="my_switcher" class="my_switcher">
        <ul>
            <li>
                <a href="javascript: void(0);" data-theme="light" class="setColor light">
                    <span title="Light Mode">Light</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                    <span title="Dark Mode">Dark</span>
                </a>
            </li>
        </ul>
    </div> -->

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
                                    <a href="{{ route('post.show', $post->slug) }}">{{$post->title}}</a></h4>


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
                                            <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
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
                                        href="{{ route('post.show', $post->slug) }}">{{$post->title}}</a></h4>

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
                                            <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
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
