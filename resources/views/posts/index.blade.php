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


                        {{--                        @if(request()->get('role') == '1')--}}
                        {{--                            <h5 class="title"--}}
                        {{--                                style="color: #41bcb8; font-size: 18px; font-weight: bold;">--}}
                        {{--                                Latest</h5>--}}
                        {{--                        @else--}}
                        {{--                            <h5 class="title" style="font-size: 18px; font-weight: bold;">--}}
                        {{--                                Latest</h5>--}}
                        {{--                        @endif--}}


















                        {{--                        @if ($post)--}}
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">
                                Filters</h5>
                            <!-- Start Post List  -->
                            <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>

                                    <li class="cat-item" style="padding: 5px 5px;">
                                        <a href="{{ route('post.index', ['role' => '4']) }}"

                                           class="inner"
                                           style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '4')
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
                                        <a href="{{ route('post.index', ['role' => '3']) }}"

                                           class="inner"
                                           style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '3')
                                                    <h5 class="title"
                                                        style="color: #41bcb8; font-size: 18px; font-weight: bold;">
                                                        Clubs</h5>
                                                @else
                                                    <h5 class="title" style="font-size: 18px; font-weight: bold;">
                                                        Clubs</h5>
                                                @endif
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item" style="padding: 5px 5px;">
                                        <a href="{{ route('post.index', ['role' => '5']) }}"
                                           class="inner"
                                           style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '5')
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
                                        <a href="{{ route('post.index', ['role' => '6']) }}"
                                           class="inner"
                                           style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '6')
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
                                    <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i
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
                            <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i
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

<!-- Main JS -->
<script src="assets/js/main.js"></script>


</body>

</html>


{{--    <!-- Start Footer Area  -->--}}
{{--    <div class="axil-footer-area axil-footer-style-1 bg-color-white">--}}
{{--        <!-- Start Footer Top Area  -->--}}
{{--        <div class="footer-top">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <!-- Start Post List  -->--}}
{{--                        <div class="inner d-flex align-items-center flex-wrap">--}}
{{--                            <h5 class="follow-title mb--0 mr--20">Follow Us</h5>--}}
{{--                            <ul class="social-icon color-tertiary md-size justify-content-start">--}}
{{--                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!-- End Post List  -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End Footer Top Area  -->--}}

{{--        <!-- Start Copyright Area  -->--}}
{{--        <div class="copyright-area">--}}
{{--            <div class="container">--}}
{{--                <div class="row align-items-center">--}}
{{--                    <div class="col-lg-9 col-md-12">--}}
{{--                        <div class="copyright-left">--}}
{{--                            <div class="logo">--}}
{{--                                <a href="index.html">--}}
{{--                                    <img class="dark-logo" src="assets/images/logo/logo-black.png"--}}
{{--                                         alt="Logo Images">--}}
{{--                                    <img class="light-logo" src="assets/images/logo/logo-white2.png"--}}
{{--                                         alt="Logo Images">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <ul class="mainmenu justify-content-start">--}}
{{--                                <li>--}}
{{--                                    <a class="hover-flip-item-wrapper" href="#">--}}
{{--                                            <span class="hover-flip-item">--}}
{{--                                                <span data-text="Contact Us">Contact Us</span>--}}
{{--                                            </span>--}}
{{--                                    </a>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="hover-flip-item-wrapper" href="#">--}}
{{--                                            <span class="hover-flip-item">--}}
{{--                                                <span data-text="Terms of Use">Terms of Use</span>--}}
{{--                                            </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="hover-flip-item-wrapper" href="#">--}}
{{--                                            <span class="hover-flip-item">--}}
{{--                                                <span data-text="AdChoices">AdChoices</span>--}}
{{--                                            </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="hover-flip-item-wrapper" href="#">--}}
{{--                                            <span class="hover-flip-item">--}}
{{--                                                <span data-text="Advertise with Us">Advertise with Us</span>--}}
{{--                                            </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="hover-flip-item-wrapper" href="#">--}}
{{--                                            <span class="hover-flip-item">--}}
{{--                                                <span data-text="Blogar Store">Blogar Store</span>--}}
{{--                                            </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-12">--}}
{{--                        <div class="copyright-right text-start text-lg-end mt_md--20 mt_sm--20">--}}
{{--                            <p class="b3">All Rights Reserved © 2023</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End Copyright Area  -->--}}
{{--    </div>--}}
{{--    <!-- End Footer Area  -->--}}

{{--    <!-- Start Back To Top  -->--}}
{{--    <a id="backto-top"></a>--}}
{{--    <!-- End Back To Top  -->--}}

{{--</div>--}}

{{--<!-- JS--}}
{{--============================================ -->--}}
{{--<!-- Modernizer JS -->--}}
{{--<script src="assets/js/vendor/modernizr.min.js"></script>--}}
{{--<!-- jQuery JS -->--}}
{{--<script src="assets/js/vendor/jquery.js"></script>--}}
{{--<!-- Bootstrap JS -->--}}
{{--<script src="assets/js/vendor/bootstrap.min.js"></script>--}}
{{--<script src="assets/js/vendor/slick.min.js"></script>--}}
{{--<script src="assets/js/vendor/tweenmax.min.js"></script>--}}
{{--<script src="assets/js/vendor/js.cookie.js"></script>--}}
{{--<script src="assets/js/vendor/jquery.style.switcher.js"></script>--}}


{{--<!-- Main JS -->--}}
{{--<script src="assets/js/main.js"></script>--}}

{{--</body>--}}


{{--<!-- Mirrored from new.axilthemes.com/demo/template/blogar/post-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Feb 2024 11:06:24 GMT -->--}}

{{--</html>--}}
