<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/post-format-standard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Feb 2024 11:06:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>APIIT</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick.css">
    <!-- <link rel="stylesheet" href="/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/vendor/base.css">
    <link rel="stylesheet" href="/assets/css/plugins/plugins.css"> -->
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>


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



    <header class="header axil-header  header-light header-sticky ">
        <div class="header-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                    <div class="logo">
                        <a href="/">
                            <img class="dark-logo" src="/assets/images/logo/logo-black.png" alt=" logo">
                            <img class="light-logo" src="/assets/images/logo/logo-white2.png" alt=" logo">
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


                                <li class="menu-item-has-children megamenu-wrapper"><a href="{{url('staff')}}">Academics</a></li>

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
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                        @auth
                                            @if (Auth::check())
                                                <a href="{{ url('/user/profile') }}">
                                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
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
                                                            <img class="dark-logo" src="assets/images/logo/logo-black.png"
                                                                 alt="Logo Images">
                                                            <img class="light-logo" src="assets/images/logo/logo-white2.png"
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
                                                    <li><a href="/student">Students</a></li>
                                                    <li><a href="/staff">Academics</a></li>
                                                    <li><a href="{{ route('alumni') }}">Alumni</a></li>
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





{{--    <header class="header axil-header  header-light header-sticky ">--}}
{{--        <div class="header-wrap">--}}
{{--            <div class="row justify-content-between align-items-center">--}}
{{--                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">--}}
{{--                    <div class="logo">--}}
{{--                        <a href="index.html">--}}
{{--                            <img class="dark-logo" src="/assets/images/logo/logo-black.png" alt="Blogar logo">--}}
{{--                            <img class="light-logo" src="/assets/images/logo/logo-white2.png" alt="Blogar logo">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xl-6 d-none d-xl-block">--}}
{{--                    <div class="mainmenu-wrapper">--}}
{{--                        <nav class="mainmenu-nav">--}}
{{--                            <!-- Start Mainmanu Nav -->--}}
{{--                            <ul class="mainmenu">--}}
{{--                                <li class="menu-item-has-children"><a href="index.html">Home</a>--}}

{{--                                </li>--}}

{{--                                <li class="menu-item-has-children"><a href="#">Campus Life</a>--}}
{{--                                    <ul class="axil-submenu">--}}
{{--                                        <li>--}}
{{--                                            <a class="hover-flip-item-wrapper" href="post-format-standard.html">--}}
{{--                                                    <span class="hover-flip-item">--}}
{{--                                                        <span data-text="Clubs and societies">Clubs and societies</span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a class="hover-flip-item-wrapper" href="post-format-standard.html">--}}
{{--                                                    <span class="hover-flip-item">--}}
{{--                                                        <span data-text="Event Calendar">Event Calendar</span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a class="hover-flip-item-wrapper" href="post-format-standard.html">--}}
{{--                                                    <span class="hover-flip-item">--}}
{{--                                                        <span data-text="Annual traditions">Annual traditions</span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a class="hover-flip-item-wrapper" href="post-format-standard.html">--}}
{{--                                                    <span class="hover-flip-item">--}}
{{--                                                        <span data-text="Workshop">Workshop</span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a class="hover-flip-item-wrapper" href="post-format-standard.html">--}}
{{--                                                    <span class="hover-flip-item">--}}
{{--                                                        <span data-text="Sports">Sports</span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                            </ul>--}}
{{--                            </li>--}}

{{--                            <li class="menu-item-has-children megamenu-wrapper"><a href="#">Academic</a>--}}
{{--                                <ul class="megamenu-sub-menu">--}}
{{--                                    <li class="megamenu-item">--}}

{{--                                        <!-- Start Verticle Nav  -->--}}
{{--                                        <div class="axil-vertical-nav">--}}
{{--                                            <ul class="vertical-nav-menu">--}}
{{--                                                <li class="vertical-nav-item active">--}}
{{--                                                    <a class="hover-flip-item-wrapper" href="#tab1">--}}
{{--                                                            <span class="hover-flip-item">--}}
{{--                                                                <span data-text="Colleges and Schools">Colleges and--}}
{{--                                                                    Schools</span>--}}
{{--                                                            </span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="vertical-nav-item">--}}
{{--                                                    <a class="hover-flip-item-wrapper" href="#tab2">--}}
{{--                                                            <span class="hover-flip-item">--}}
{{--                                                                <span data-text="Academics Staf">Majors and--}}
{{--                                                                    Minors</span>--}}
{{--                                                            </span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="vertical-nav-item">--}}
{{--                                                    <a class="hover-flip-item-wrapper" href="#tab3">--}}
{{--                                                            <span class="hover-flip-item">--}}
{{--                                                                <span data-text="Academic Resources">Academic--}}
{{--                                                                    Resources</span>--}}
{{--                                                            </span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="vertical-nav-item">--}}
{{--                                                    <a class="hover-flip-item-wrapper" href="#tab4">--}}
{{--                                                            <span class="hover-flip-item">--}}
{{--                                                                <span data-text="Academic Programs">Academic--}}
{{--                                                                    Programs</span>--}}
{{--                                                            </span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <!-- Start Verticle Nav  -->--}}

{{--                                        <!-- Start Verticle Menu  -->--}}
{{--                                        <div class="axil-vertical-nav-content">--}}
{{--                                            <!-- Start One Item  -->--}}
{{--                                            <div class="axil-vertical-inner tab-content" id="tab1"--}}
{{--                                                 style="display: block;">--}}
{{--                                                <div class="axil-vertical-single">--}}
{{--                                                    <div class="row">--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-01.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span style="font-size: 18px;"--}}
{{--                                                                                              data-text="APIIT City Campus">APIIT City Campus</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-02.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span style="font-size: 20px;"--}}
{{--                                                                                              data-text="APIIT Law ">APIIT Law</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-03.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span style="font-size: 18px;"--}}
{{--                                                                                              data-text="Kandy APIIT">Kandy APIIT</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-04.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span style="font-size: 18px;"--}}
{{--                                                                                              data-text="Staffordshire University">Staffordshire University</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!-- End One Item  -->--}}

{{--                                            <!-- Start One Item  -->--}}
{{--                                            <div class="axil-vertical-inner tab-content" id="tab2">--}}
{{--                                                <div class="axil-vertical-single">--}}
{{--                                                    <div class="row">--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-04.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Detailed Descriptions of Each Major">Detailed--}}
{{--                                                                                            Descriptions of Each--}}
{{--                                                                                            Major</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}
{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-03.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Potential Career Paths for Each Major">Potential--}}
{{--                                                                                            Career Paths for Each--}}
{{--                                                                                            Major</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}
{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-02.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="List of Available Minors">List--}}
{{--                                                                                            of Available Minors</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}
{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-04.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Information on Specialized Tracks within Majors">Information--}}
{{--                                                                                            on Specialized Tracks within--}}
{{--                                                                                            Majors</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!-- End One Item  -->--}}

{{--                                            <!-- Start One Item  -->--}}
{{--                                            <div class="axil-vertical-inner tab-content" id="tab3">--}}
{{--                                                <div class="axil-vertical-single">--}}
{{--                                                    <div class="row">--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-04.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Library Services and Resources">Library--}}
{{--                                                                                            Services and--}}
{{--                                                                                            Resources</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}
{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-03.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="#">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Tutoring and Academic Support Programs">Tutoring--}}
{{--                                                                                            and Academic Support--}}
{{--                                                                                            Programs</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}
{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-02.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="#">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Study Spaces and Facilities">Study--}}
{{--                                                                                            Spaces and Facilities</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}
{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-04.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Online Learning Resources">Online--}}
{{--                                                                                            Learning Resources</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!-- End One Item  -->--}}

{{--                                            <!-- Start One Item  -->--}}
{{--                                            <div class="axil-vertical-inner tab-content" id="tab4">--}}
{{--                                                <div class="axil-vertical-single">--}}
{{--                                                    <div class="row">--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-01.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Overview of Colleges and Schools">Overview--}}
{{--                                                                                            of Colleges and--}}
{{--                                                                                            Schools</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}
{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-04.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="List of Undergraduate and Graduate Programs">List--}}
{{--                                                                                            of Undergraduate and--}}
{{--                                                                                            Graduate Programs</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-03.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Certificates and Degrees Offered">Certificates--}}
{{--                                                                                            and Degrees Offered</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                        <!-- Start Post List  -->--}}
{{--                                                        <div class="col-lg-3">--}}
{{--                                                            <div class="content-block image-rounded">--}}
{{--                                                                <div class="post-thumbnail mb--20">--}}
{{--                                                                    <a href="home-lifestyle-blog.html">--}}
{{--                                                                        <img class="w-100"--}}
{{--                                                                             src="/assets/images/others/mega-post-04.jpg"--}}
{{--                                                                             alt="Post Images">--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="post-content">--}}
{{--                                                                    <div class="post-cat">--}}
{{--                                                                        <div class="post-cat-list">--}}
{{--                                                                            <a class="hover-flip-item-wrapper"--}}
{{--                                                                               href="home-lifestyle-blog.html">--}}
{{--                                                                                    <span class="hover-flip-item">--}}
{{--                                                                                        <span--}}
{{--                                                                                            data-text="Internship and Experiential Learning Opportunities">Internship--}}
{{--                                                                                            and Experiential Learning--}}
{{--                                                                                            Opportunities</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- End Post List  -->--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!-- End One Item  -->--}}

{{--                                        </div>--}}
{{--                                        <!-- End Verticle Menu  -->--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            <li class="menu-item-has-children"><a href="#">Student Services</a>--}}
{{--                                <ul class="axil-submenu">--}}
{{--                                    <li>--}}
{{--                                        <a class="hover-flip-item-wrapper" href="CounselingandMental.html">--}}
{{--                                                <span class="hover-flip-item">--}}
{{--                                                    <span data-text="Counseling and Mental Health Services">Counseling--}}
{{--                                                        and Mental Health Services</span>--}}
{{--                                                </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a class="hover-flip-item-wrapper" href="CareerDevelopment.html">--}}
{{--                                                <span class="hover-flip-item">--}}
{{--                                                    <span data-text="Career Development and Placement">Career--}}
{{--                                                        Development and Placement</span>--}}
{{--                                                </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <a class="hover-flip-item-wrapper" href="StudentOrganitions.html">--}}
{{--                                                <span class="hover-flip-item">--}}
{{--                                                    <span data-text="Student Organizations and Engagement">Student--}}
{{--                                                        Organizations and Engagement</span>--}}
{{--                                                </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}

{{--                            <li><a href="alumni.html">Alumni</a></li>--}}
{{--                            <li><a href="research.html">Research</a></li>--}}
{{--                            <li><a href="post-list.html">All Post</a></li>--}}

{{--                            </ul>--}}
{{--                            <!-- End Mainmanu Nav -->--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xl-3 col-lg-8 col-md-8 col-sm-9 col-12">--}}
{{--                    <div class="header-search text-end d-flex align-items-center">--}}
{{--                        <form class="header-search-form d-sm-block d-none">--}}
{{--                            <div class="axil-search form-group">--}}
{{--                                <button type="submit" class="search-button"><i class="fal fa-search"></i></button>--}}
{{--                                <input type="text" class="form-control" placeholder="Search">--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                        <div class="mobile-search-wrapper d-sm-none d-block">--}}
{{--                            <button class="search-button-toggle"><i class="fal fa-search"></i></button>--}}
{{--                            <form class="header-search-form">--}}
{{--                                <div class="axil-search form-group">--}}
{{--                                    <button type="submit" class="search-button"><i--}}
{{--                                            class="fal fa-search"></i></button>--}}
{{--                                    <input type="text" class="form-control" placeholder="Search">--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <ul class="metabar-block">--}}
{{--                            <li class="icon"><a href="#"><i class="fas fa-bookmark"></i></a></li>--}}
{{--                            <li class="icon"><a href="#"><i class="fas fa-bell"></i></a></li>--}}
{{--                            <li><a href="#"><img src="{{$post->author->profile_photo_url}}" alt="Author Images"></a></li>--}}
{{--                        </ul>--}}
{{--                        <!-- Start Hamburger Menu  -->--}}
{{--                        <div class="hamburger-menu d-block d-xl-none">--}}
{{--                            <div class="hamburger-inner">--}}
{{--                                <div class="icon"><i class="fal fa-bars"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Hamburger Menu  -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
    <!-- Start Header -->


    <!-- Start Mobile Menu Area  -->
    <div class="popup-mobilemenu-area">
        <div class="inner">
            <div class="mobile-menu-top">
                <div class="logo">
                    <a href="index.html">
                        <img class="dark-logo" src="/assets/images/logo/logo-black.png" alt="Logo Images">
                        <img class="light-logo" src="/assets/images/logo/logo-white2.png" alt="Logo Images">
                    </a>
                </div>
                <div class="mobile-close">
                    <div class="icon">
                        <i class="fal fa-times"></i>
                    </div>
                </div>
            </div>
            <ul class="mainmenu">
                <li class="menu-item-has-children"><a href="#">Home</a>
                    <ul class="axil-submenu">
                        <li><a href="index.html">Home Default</a></li>
                        <li><a href="home-creative-blog.html">Home Creative Blog</a></li>
                        <li><a href="home-seo-blog.html">Home Seo Blog</a></li>
                        <li><a href="home-tech-blog.html">Home Tech Blog</a></li>
                        <li><a href="home-lifestyle-blog.html">Home Lifestyle Blog</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Categories</a>
                    <ul class="axil-submenu">
                        <li><a href="home-lifestyle-blog.html">Accessibility</a></li>
                        <li><a href="home-lifestyle-blog.html">Android Dev</a></li>
                        <li><a href="home-lifestyle-blog.html">Accessibility</a></li>
                        <li><a href="home-lifestyle-blog.html">Android Dev</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Post Format</a>
                    <ul class="axil-submenu">
                        <li><a href="post-format-standard.html">Post Format Standard</a></li>
                        <li><a href="post-format-video.html">Post Format Video</a></li>
                        <li><a href="post-format-gallery.html">Post Format Gallery</a></li>
                        <li><a href="post-format-text.html">Post Format Text Only</a></li>
                        <li><a href="post-layout-1.html">Post Layout One</a></li>
                        <li><a href="post-layout-2.html">Post Layout Two</a></li>
                        <li><a href="post-layout-3.html">Post Layout Three</a></li>
                        <li><a href="post-layout-4.html">Post Layout Four</a></li>
                        <li><a href="post-layout-5.html">Post Layout Five</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Pages</a>
                    <ul class="axil-submenu">
                        <li><a href="post-list.html">Post List</a></li>
                        <li><a href="archive.html">Post Archive</a></li>
                        <li><a href="author.html">Author Page</a></li>
                        <li><a href="about.html">About Page</a></li>
                        <li><a href="maintenance.html">Maintenance</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </li>
                <li><a href="404.html">404 Page</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
            <div class="buy-now-btn">
                <a href="#">Buy Now <span class="badge">$15</span></a>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu Area  -->

    <!-- End Mobile Menu Area  -->



    <!-- Start Banner Area -->
    <div class="banner banner-single-post post-formate post-standard alignwide">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Start Single Slide  -->
                    <div class="content-block">
                        <!-- Start Post Thumbnail  -->


                        @if ($post->getThumbnailImage() !== "https://group-9.laravelsrilanka.com/storage/")
                            <div class="post-thumbnail">
                                <img src="{{ $post->getThumbnailImage() }}" alt="Post Images" style="width: 100%">
                                <style>
                                    .post-thumbnail {
                                        position: relative;
                                    }

                                    .post-thumbnail::before {
                                        content: "";
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        width: 100%;
                                        height: 100%;
                                        background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
                                        border-radius: 10px;
                                    }
                                </style>
                            </div>
                        @else
                            <div class="post-thumbnail">
                                <img src="/assets/images/logo/no-image.jpg" alt="Post Images" style="width: 100%; height:30%">
                                <style>
                                    .post-thumbnail {
                                        position: relative;
                                    }

                                    .post-thumbnail::before {
                                        content: "";
                                        position: absolute;
                                        top: 0;
                                        left: 0;
                                        width: 100%;
                                        height: 100%;
                                        background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
                                        border-radius: 10px;
                                    }
                                </style>
                            </div>
                        @endif



                        <!-- End Post Thumbnail  -->
                        <!-- Start Post Content  -->
                        <div class="post-content">
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                @if ($post->featured)
                                                    <span data-text="FEATURED">FEATURED</span>
                                                @endif
                                            </span>
                                    </a>
                                </div>
                            </div>
                            <h1 class="title">{{$post->title}}</h1>
                            <!-- Post Meta  -->
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">
                                        {{-- {{dd($post->author)}} --}}
                                        <img src="{{$post->author->profile_photo_url}}" alt="Author Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="author.html">
                                                    <span class="hover-flip-item">
                                                        <span data-text="{{{$post->author->name}}}">{{{$post->author->name}}}</span>
                                                    </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{ $post->published_at->diffForHumans() }}</li>
                                            <li>{{$post->getReadingTime()}} min read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Content  -->
                    </div>

                    <!-- End Single Slide  -->
                </div>

            </div>
        </div>
    </div>
    <!-- End Banner Area -->

    <!-- Start Post Single Wrapper  -->
    <div class="post-single-wrapper axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="axil-post-details" style="margin-bottom: 20px">
                        {!! $post->body !!}


                        <div class="social-share-block">

                        </div>


                        <!-- Start Author  -->
                        <div class="about-author">
                            <div class="media">
                                <div class="thumbnail">
                                    <a>
                                        <img src="{{$post->author->profile_photo_url}}" alt="Author Images">

                                    </a>
                                </div>
                                <div class="media-body" style="align-self: center">
                                    <div class="author-info">
                                        <h5 class="title">
                                            <a class="hover-flip-item-wrapper">
                                                    <span class="hover-flip-item">
                                                        <span style="font-size: 20px" data-text="{{$post->author->name}}">{{$post->author->name}}</span>
                                                    </span>
                                            </a>
                                        </h5>


                                        <h5 style="padding-top: 18px; color:gray">{{$post->author->role->name}}</h5>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Author  -->

                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Start Sidebar Area  -->


                    <div class="sidebar-inner">
                        <!-- Start Single Widget  -->
{{--                        <div class="axil-single-widget widget widget_categories mb--30">--}}
{{--                            <ul>--}}
{{--                                --}}{{-- @foreach ($post->categories as $category)--}}
{{--                                    <li class="cat-item">--}}
{{--                                        <a href="#" class="inner" style="width: fit-content; background-color: #4CAC; padding-left: 15px; padding-right: 15px;">--}}
{{--                                            <div class="content">--}}
{{--                                                <h5 class="title">{{$category->title}}</h5>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endforeach --}}
{{--                                @foreach ($post->categories as $category)--}}
{{--                                    <li class="cat-item">--}}
{{--                                        <a class="inner" style="justify-content: center; padding: 10px 0">--}}
{{--                                            <div class="content">--}}
{{--                                                <h5 class="title">{{$category->title}}</h5>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <!-- End Single Widget  -->


                        @if(count($post->categories) > 0)
                            <div class="axil-single-widget widget widget_tag_cloud mb--30">
                                <h5 class="widget-title">Categories</h5>
                                <!-- Start Post List  -->
                                <div class="tagcloud">
                                    @foreach ($post->categories as $category)
                                        <a href="{{ route('post.index', ['category' => $category->slug]) }}" style="font-weight: bold">{{$category->title}}</a>
                                    @endforeach
                                </div>
                                <!-- End Post List  -->
                            </div>
                        @endif















                        @php
                            $authorPosts = DB::table('posts')
                                        ->where('user_id', $post->author->id)
                                        ->where('id', '!=', $post->id)
                                        ->where('approved', 1)
                                        ->get();
                        @endphp

                        @if(count($authorPosts) > 0)
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">More from {{$post->author->name}}</h5>
                                <div class="post-medium-block">

                                @foreach ($authorPosts as $authorPost)
                                        <div class="content-block post-medium" style="padding: 10px 0">

                                            <div class="post-content">
                                                <h6 class="title"><a href="{{route('post.show', $authorPost->slug)}}">{{$authorPost->title}}</a></h6>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        @endif

                            </div>






                        @php
                            $latestPosts = DB::table('posts')->latest()->where('approved', 1)->take(5)->get();
                        @endphp

                        @if(count($latestPosts) > 0)
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">Latest Posts</h5>
                            <div class="post-medium-block">
                                @foreach ($latestPosts as $latestPost)
                                    <div class="content-block post-medium" style="padding: 10px 0">
                                        <div class="post-content">
                                            <h6 class="title"><a href="{{route('post.show', $latestPost->slug)}}">{{$latestPost->title}}</a></h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @endif




                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget widget widget_social mb--30">
                            <h5 class="widget-title">Stay In Touch</h5>
                            <!-- Start Post List  -->
                            <ul class="social-icon md-size justify-content-center">
                                <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i class="fab fa-linkedin-in"></i></a></li>
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
    <!-- End Post Single Wrapper  -->



    <!-- Start Footer Area  -->
    <div class="axil-footer-area axil-footer-style-1 footer-variation-2">


        <!-- Start Footer Top Area  -->
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="/">
                                <img class="dark-logo" src="/assets/images/logo/logo-black.png" alt="Logo Images">
                                <img class="white-logo" src="/assets/images/logo/logo-white2.png" alt="Logo Images">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8">
                        <!-- Start Post List  -->
                        <div
                            class="d-flex justify-content-start mt_sm--15 justify-content-md-end align-items-center flex-wrap">
                            <h5 class="follow-title mb--0 mr--20">Follow Us</h5>
                            <ul class="social-icon color-tertiary md-size justify-content-start">
                                <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i class="fab fa-linkedin-in"></i></a></li>
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
    <!-- End Footer Area  -->

    <!-- Start Back To Top  -->
    <a id="backto-top"></a>
    <!-- End Back To Top  -->

</div>
<!-- JS
============================================ -->

<!-- Modernizer JS -->

<script src="/assets/js/vendor/jquery.js"></script>
<script src="/assets/js/vendor/slick.min.js"></script>
<script src="/assets/js/main.js"></script>
<!-- Main JS -->


<script>
    $(document).ready(function () {
        $('.nav-link').on('click', function (e) {
            e.preventDefault();
            var targetTabId = $(this).attr('href');
            $('.tab-pane').removeClass('show active');
            $(targetTabId).addClass('show active');
        });
    });
</script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/blogar/post-format-standard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Feb 2024 11:06:23 GMT -->
</html>
