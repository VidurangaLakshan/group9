<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>APIIT</title>
    <meta name="robots" content="noindex, follow"/>
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
<link rel="stylesheet" href="/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/vendor/base.css">
    <link rel="stylesheet" href="/assets/css/plugins/plugins.css">
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>

<header>
    <!-- Start Header -->
    <header class="header axil-header  header-light header-sticky ">
        <div class="header-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-12">
                    <div class="logo">
                        <a href="/">
                            <img class="dark-logo" src="/assets/images/logo/logo-black.png" alt="Blogar logo">
                            <img class="light-logo" src="/assets/images/logo/logo-white2.png" alt="Blogar logo">
                        </a>
                    </div>
                </div>

                <div class="col-xl-6 d-none d-xl-block">
                    <div class="mainmenu-wrapper">
                        <nav class="mainmenu-nav">
                            <!-- Start Mainmanu Nav -->
                            <ul class="mainmenu">
                                <li class="menu-item-has-children"><a href="/">Home</a></li>


                                <li class="menu-item-has-children"><a href="{{route('post.index')}}">Articles</a>


                                @auth
                                    @if (auth()->user()->approved == 1 && (auth()->user()->role->value == 1 || auth()->user()->role->value == 4 || (auth()->user()->role->value == 7 && auth()->user()->degree_level != 1 && auth()->user()->degree_level != 2 && auth()->user()->degree_level != 3 && auth()->user()->degree_level != 4) || auth()->user()->role->value == 8))
                                        <li class="menu-item-has-children"><a href="{{url('job')}}">Vacancies</a></li>
                                    @endif
                                @endauth


                                @auth
                                    @if (auth()->user()->approved == 1)
                                        <li class="menu-item-has-children megamenu-wrapper"><a href="{{url('likes')}}">Favourites</a>
                                        </li>
                                    @endif
                                @endauth

                                <li class="menu-item-has-children megamenu-wrapper"><a
                                        href="{{url('event')}}">Events</a>
                                </li>

                                @auth
                                    @if (auth()->user()->role->value == 3)
                                        <li class="menu-item-has-children megamenu-wrapper"><a href="{{url('appointments')}}">Schedule</a>
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
                                            <li class="icon"><a href="{{ url('/admin') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
                                        @elseif (auth()->user()->role->value == 2)
                                            <li class="icon"><a href="{{ url('/editor') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
                                        @elseif (auth()->user()->role->value == 3)
                                            <li class="icon"><a href="{{ url('/sss') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
                                        @elseif (auth()->user()->role->value == 4)
                                            <li class="icon"><a href="{{ url('/alumniLiaison') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
                                        @elseif (auth()->user()->role->value == 5)
                                            <li class="icon"><a href="{{ url('/academics') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
                                        @elseif (auth()->user()->role->value == 6)
                                            <li class="icon"><a href="{{ url('/nonAcademics') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
                                        @elseif (auth()->user()->role->value == 7)
                                            <li class="icon"><a href="{{ url('/user') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
                                        @elseif (auth()->user()->role->value == 8)
                                            <li class="icon"><a href="{{ url('/alumni') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
                                        @elseif (auth()->user()->role->value == 9)
                                            <li class="icon"><a href="{{ url('/club') }}" target="_blank"><i
                                                        class="fas fa-cog"></i></a>
                                            </li>
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
                                                            <img class="dark-logo"
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

                                                    <li><a href="{{route('post.index')}}">Articles</a></li>

                                                    @auth
                                                        @if (auth()->user()->approved == 1 && (auth()->user()->role->value == 1 || auth()->user()->role->value == 4 || (auth()->user()->role->value == 7 && auth()->user()->degree_level != 1 && auth()->user()->degree_level != 2 && auth()->user()->degree_level != 3 && auth()->user()->degree_level != 4) || auth()->user()->role->value == 8))
                                                            <li><a href="{{url('job')}}">Vacancies</a></li>
                                                        @endif
                                                    @endauth

                                                    @auth
                                                        @if (auth()->user()->approved == 1)
                                                            <li><a href="{{url('likes')}}">Favourites</a>
                                                            </li>
                                                        @endif
                                                    @endauth

                                                    <li><a href="{{url('event')}}">Events</a></li>

                                                    @auth
                                                        @if (auth()->user()->role->value == 3)
                                                            <li><a href="{{url('appointments')}}">Schedule</a></li>
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


    <!-- Start Banner Area -->
    <div class="banner banner-single-post post-formate post-standard alignwide">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Start Single Slide  -->
                    <div class="content-block">
                        <!-- Start Post Thumbnail  -->

                        {{--                        @if ($post->getThumbnailImage() !== "https://group-9.laravelsrilanka.com/storage/")--}}
                        {{--                        @if ($post->getThumbnailImage() == "https://127.0.0.1:8000/storage/")--}}

                        <div class="post-thumbnail"
                             style="display: flex; justify-content: center; align-items: center;">
                            <img src="{{ $event->getThumbnailImage() }}" alt="Post Images"
                                 style="width: auto; max-height: 800px">
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


                        <!-- End Post Thumbnail  -->
                        <!-- Start Post Content  -->
                        <div class="post-content">
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">

                                            </span>
                                    </a>
                                </div>
                            </div>
                            <h1 class="title">{{$event->title}}</h1>
                            <!-- Post Meta  -->
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">
                                        {{-- {{dd($event->author)}} --}}
                                        <img src="{{$event->author->profile_photo_url}}" alt="Author Images" style="width: 64px;">
                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper"
                                               href="{{ route('event.club', $event->user_id) }}">
                                                    <span class="hover-flip-item">
                                                        <span
                                                            data-text="{{{$event->author->name}}}">{{{$event->author->name}}}</span>
                                                    </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{ $event->created_at->diffForHumans() }}</li>
                                            <li>{{$event->getReadingTime()}} min read</li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-share-transparent justify-content-end">
                                </ul>
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
                        {!! $event->description !!}

                        <h4 style="margin: 30px 0;">Venue : <span
                                style="font-weight: normal;">{{$event->location}}</span></h4>
                        @if ($event->same_day == true)
                            <h4 style="margin: 30px 0;">Date : <span
                                    style="font-weight: normal;">{{$event->start_date}}</span></h4>
                        @else
                            <h4 style="margin: 30px 0;">Start Date : <span
                                    style="font-weight: normal;">{{$event->start_date}}</span></h4>
                            <h4 style="margin: 30px 0;">End Date : <span
                                    style="font-weight: normal;">{{$event->end_date}}</span></h4>
                        @endif
                        @if ($event->same_time == true)
                            <h4 style="margin: 30px 0;">Time : <span
                                    style="font-weight: normal;">{{$event->start_time}}</span></h4>
                        @else
                            <h4 style="margin: 30px 0;">Start Time : <span
                                    style="font-weight: normal;">{{$event->start_time}}</span></h4>
                            <h4 style="margin: 30px 0;">End Time : <span
                                    style="font-weight: normal;">{{$event->end_time}}</span></h4>
                        @endif


                        @if ($event->gallery_images != null)
                            <h2 style="margin: 30px 0;">Event Gallery</h2>
                            {!! $event->gallery_images !!}
                        @endif


                        <div class="social-share-block">

                        </div>


                        <!-- Start Author  -->
                        <div class="about-author">
                            <div class="media">
                                <div class="thumbnail">
                                    <a>
                                        <img src="{{$event->author->profile_photo_url}}" alt="Author Images" style="width: 64px; margin-bottom: 0px">

                                    </a>
                                </div>
                                <div class="media-body" style="align-self: center">
                                    <div class="author-info">
                                        <h5 class="title">
                                            <a class="hover-flip-item-wrapper"
                                               href="{{ route('event.club', $event->user_id) }}">
                                                    <span class="hover-flip-item">
                                                        <span style="font-size: 20px"
                                                              data-text="{{$event->author->name}}">{{$event->author->name}}</span>
                                                    </span>
                                            </a>
                                        </h5>


                                        <span class="b3 subtitle"
                                              style="font-size: 20px; font-weight: bold">APIIT Club</span>


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

                    </div>


                    <!-- Start Single Widget  -->
                    <div class="axil-single-widget widget widget_social mb--30">
                        <h5 class="widget-title">Stay In Touch</h5>
                        <!-- Start Post List  -->
                        <ul class="social-icon md-size justify-content-center">
                            <li><a href="https://www.facebook.com/APIITofficial"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/apiitsl"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li><a href="https://x.com/APIITsl"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://youtube.com/@APIITedu"><i class="fab fa-youtube"></i></a></li>
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
                            <li><a href="https://www.facebook.com/APIITofficial"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/apiitsl"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li><a href="https://x.com/APIITsl"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://youtube.com/@APIITedu"><i class="fab fa-youtube"></i></a></li>
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
<!-- End Footer Area  -->

<!-- Start Back To Top  -->
<a id="backto-top"></a>
<!-- End Back To Top  -->

</div>
<!-- JS
============================================ -->

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
