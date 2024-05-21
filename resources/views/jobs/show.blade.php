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
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick.css">
    <link rel="stylesheet" href="/assets/css/style.css">

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

<!-- Start Banner Area -->
<div class="banner banner-single-post post-formate post-standard alignwide">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Start Single Slide  -->
                <div class="content-block">
                    <!-- Start Post Thumbnail  -->

                    <div class="post-thumbnail" style="display: flex; justify-content: center; align-items: center;">
                        @if ($job->image != null)
                            <img src="{{$job->getThumbnailImage()}}" alt="Post Images" style="width: auto">
                        @else
                            <img src="/assets/images/logo/no-image.jpg" alt="Post Images"
                                 style="width: 100%; height:30%; border-radius: 10px;">
                        @endif
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
                        <h1 class="title">{{$job->name}}</h1>
                        <!-- Post Meta  -->
                        <div class="post-meta-wrapper">
                            <div class="post-meta">
                                <div class="post-author-avatar border-rounded">
                                    <img src="{{$job->author->profile_photo_url}}" alt="Author Images"
                                         style="width: 64px;">
                                </div>
                                <div class="content">
                                    <h6 class="post-author-name">
                                        <a class="hover-flip-item-wrapper">
                                                    <span class="hover-flip-item">
                                                        <span
                                                            data-text="{{{$job->author->name}}}">{{{$job->author->name}}}</span>
                                                    </span>
                                        </a>
                                    </h6>
                                    <ul class="post-meta-list">
                                        <li>{{ $job->created_at->diffForHumans() }}</li>
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

                    <div style="margin: 10px 0;">
                        <p style="font-size: 24px; font-weight: bold;">Job Description</p>
                    </div>

                    {!! $job->description !!}

                    <div style="margin: 10px 0;">
                        <p style="font-size: 24px; font-weight: bold;">Qualifications</p>
                    </div>

                    {!! $job->qualifications !!}

                    <div style="margin: 10px 0;">
                        <p style="font-size: 20px; font-weight: bold;">Company: {{$job->company}}</p>
                    </div>

                    <div class="social-share-block">

                    </div>


                    <!-- Start Author  -->
                    <div class="about-author">
                        <div class="media">
                            <div class="thumbnail">
                                <a>
                                    <img src="{{$job->author->profile_photo_url}}" alt="Author Images"
                                         style="width: 64px;">

                                </a>
                            </div>
                            <div class="media-body" style="align-self: center">
                                <div class="author-info">
                                    <h5 class="title">
                                        <a class="hover-flip-item-wrapper">
                                                    <span class="hover-flip-item">
                                                        <span style="font-size: 20px"
                                                              data-text="{{$job->author->name}}">{{$job->author->name}}</span>
                                                    </span>
                                        </a>
                                    </h5>


                                    @if ($job->author->role->value == 4)
                                        <h5 style="padding-top: 18px; color:gray">Head of Industry Liaisons and Alumni
                                            Relations</h5>
                                    @else
                                        <h5 style="padding-top: 18px; color:gray">{{ $job->author->role->name }}</h5>
                                    @endif


                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Author  -->

                </div>

                <livewire:post-resume :key="'resumes' . $job->id" :$job/>


            </div>


            <div class="col-lg-4">
                <!-- Start Sidebar Area  -->


                <div class="sidebar-inner">


                    <div class="axil-single-widget widget widget_tag_cloud mb--30">
                        <h5 class="widget-title">Related Faculty</h5>
                        <!-- Start Post List  -->
                        <div class="tagcloud">

                            <a style="font-weight: bold">{{$job->faculty}}</a>

                        </div>
                        <!-- End Post List  -->
                    </div>


                    @php
                        $authorJobs = DB::table('jobs')
                                    ->where('user_id', $job->author->id)
                                    ->where('id', '!=', $job->id)
                                    ->where('approved', 1)
                                    ->get();
                    @endphp

                    @if(count($authorJobs) > 0)
                        <div class="axil-single-widget widget widget_postlist mb--30">
                            <h5 class="widget-title" style="font-size: 18px; font-weight: bold;">More
                                from {{$job->author->name}}</h5>
                            <div class="post-medium-block">

                                @foreach ($authorJobs as $authorJob)
                                    <div class="content-block post-medium" style="padding: 10px 0">

                                        <div class="post-content">
                                            <h6 class="title"><a
                                                    href="{{route('job.show', $authorJob->slug)}}">{{$authorJob->name}}</a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif

                        </div>






                        @php
                            $latestJobs = DB::table('jobs')->latest()->where('approved', 1)->take(5)->get();
                        @endphp

                        @if(count($latestJobs) > 0)
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title" style="font-size: 18px; font-weight: bold;">
                                    Latest Vacancies</h5>
                                <div class="post-medium-block">
                                    @foreach ($latestJobs as $latestJob)
                                        <div class="content-block post-medium" style="padding: 10px 0">
                                            <div class="post-content">
                                                <h6 class="title"><a
                                                        href="{{route('job.show', $latestJob->slug)}}">{{$latestJob->name}}</a>
                                                </h6>
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
<script src="/assets/js/vendor/jquery.min.js"></script>
<script src="/assets/js/vendor/popper.min.js"></script>
<script src="/assets/js/vendor/bootstrap.min.js"></script>
<script src="/assets/js/vendor/slick.min.js"></script>
<script src="/assets/js/vendor/tweenmax.min.js"></script>

<script src="/assets/js/vendor/jquery.js"></script>
<script src="/assets/js/vendor/slick.min.js"></script>
<script src="/assets/js/main.js"></script>

<!-- Main JS -->
<script src="/assets/js/main.js"></script>


</body>

</html>
