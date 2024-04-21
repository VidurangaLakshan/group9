<x-site-layout>


    @if (Auth::user() == true)
        @if ((Auth::user()->role->value == 5 || Auth::user()->role->value == 6 || Auth::user()->role->value == 7 || Auth::user()->role->value == 8) && Auth::user()->approved == 0)
            <div class="alert alert-warning" id="alert" style="margin: 10px 10px; text-align: center">
                Your account is not verified yet. Please wait for 24-48 hours until the admin approves your account.
                Till
                then, you can't write articles.
            </div>
        @endif

        @if (Auth::user()->newUserPersonalized == 0)
            <div class="alert alert-warning" id="alert" style="margin: 10px 10px; text-align: center">
                Please complete your profile settings to personalize your experience.
            </div>
        @endif
    @endif


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
        </div>  -->


        <!-- Start Banner Area -->

        <div class="slider-area bg-color-grey" style="padding-bottom: 25px;">
            <div class="axil-slide slider-style-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-activation axil-slick-arrow">
                                <!-- Start Single Slide  -->
                                <div class="content-block">
                                    <!-- Start Post Thumbnail  -->
                                    <div class="post-thumbnail">
                                        <a href="">
                                            <img src="assets/images/post-images/gallery-post-01.jpg"
                                                 alt="Post Images">
                                        </a>
                                    </div>
                                    <!-- End Post Thumbnail  -->

                                    <!-- Start Post Content  -->
                                    <div class="post-content">
                                        <div class="post-cat-list">
                                            <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
                                                    <span data-text="Explore IT Courses">Explore IT Courses</span>
                                                </span>
                                            </a>
                                        </div>
                                        <h2 class="title"><a href="">APIIT:
                                                Future-ready education for impactful careers</a></h2>
                                        <!-- Post Meta  -->
                                        <div class="post-meta-wrapper with-button">
                                            <div class="post-meta">
                                                <div class="post-author-avatar border-rounded">
                                                    <img src="assets/images/post-images/author/author-image-3.png"
                                                         alt="Author Images">
                                                </div>
                                                <div class="content">
                                                    <h6 class="post-author-name">
                                                        <a class="hover-flip-item-wrapper" href="">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Gamindu Hemachandra">Gamindu
                                                                    Hemachandra</span>
                                                            </span>
                                                        </a>
                                                    </h6>
                                                    <ul class="post-meta-list">
                                                        <li>Feb 17, 2019</li>
                                                        <li>3 min read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="social-share-transparent justify-content-end">
                                                <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i
                                                            class="fab fa-youtube"></i></a></li>
                                                <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                            <div class="read-more-button cerchio">
                                                <a class="axil-button button-rounded hover-flip-item-wrapper"
                                                   href="">
                                                    <span class="hover-flip-item">
                                                        <span data-text="Read Post">Read Post</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Post Content  -->
                                </div>
                                <!-- End Single Slide  -->

                                <!-- Start Single Slide  -->
                                <div class="content-block">
                                    <!-- Start Post Thumbnail  -->
                                    <div class="post-thumbnail">
                                        <a href="">
                                            <img src="assets/images/post-images/gallery-post-02.jpg"
                                                 alt="Post Images">
                                        </a>
                                    </div>
                                    <!-- End Post Thumbnail  -->
                                    <!-- Start Post Content  -->
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span class="hover-flip-item">
                                                        <span
                                                            data-text="Unveiling the Staffordshire University LLB">Unveiling
                                                            the Staffordshire University LLB</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h2 class="title"><a href="">A Dive into
                                                Comprehensive Legal Knowledge</a></h2>

                                        <!-- Post Meta  -->
                                        <div class="post-meta-wrapper with-button">
                                            <div class="post-meta">
                                                <div class="post-author-avatar border-rounded">
                                                    <img src="assets/images/post-images/author/author-image-2.png"
                                                         alt="Author Images">
                                                </div>
                                                <div class="content">
                                                    <h6 class="post-author-name">
                                                        <a class="hover-flip-item-wrapper" href="">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Dr Chathura Warnasuriya">Dr Chathura
                                                                    Warnasuriya</span>
                                                            </span>
                                                        </a>
                                                    </h6>
                                                    <ul class="post-meta-list">
                                                        <li>May 10, 2022</li>
                                                        <li>4 min read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="social-share-transparent justify-content-end">
                                                <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i
                                                            class="fab fa-youtube"></i></a></li>
                                                <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                            <div class="read-more-button cerchio">
                                                <a class="axil-button button-rounded hover-flip-item-wrapper"
                                                   href="">
                                                    <span class="hover-flip-item">
                                                        <span data-text="Read Post">Read Post</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Post Content  -->
                                </div>
                                <!-- End Single Slide  -->

                                @foreach($featuredPosts as $featuredPost)
                                    @if($featuredPost->featured == 1 && $featuredPost->getAttribute('approved') == 1 && $featuredPost->getAttribute('published_at') <= now())
                                        <div class="content-block">
                                            <!-- Start Post Thumbnail  -->

                                            @if ($featuredPost->image != null)

                                                <div class="post-thumbnail">
                                                    <a href="/blog/{{$featuredPost->slug}}">
                                                        <img src="{{$featuredPost->getThumbnailImage()}}"
                                                             alt="Post Images">
                                                    </a>
                                                </div>
                                                <!-- End Post Thumbnail  -->

                                            @else

                                                <!-- Start Post Thumbnail  -->
                                                <div class="post-thumbnail specific-class">
                                                    <a href="/blog/{{$featuredPost->slug}}">
                                                        <img src="/assets/images/logo/no-image.jpg"
                                                             alt="Post Images">
                                                    </a>
                                                    <style>
                                                        .post-thumbnail.specific-class {
                                                            position: relative;
                                                        }

                                                        .post-thumbnail.specific-class::before {
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
                                            @endif


                                            <!-- Start Post Content  -->
                                            <div class="post-content">
                                                <div class="post-cat-list">
                                                    <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$featuredPost->categories[0]->title}}">{{$featuredPost->categories[0]->title}}</span>
                                                </span>
                                                    </a>
                                                </div>
                                                <h2 class="title"><a
                                                        href="/blog/{{$featuredPost->slug}}">{{$featuredPost->title}}</a>
                                                </h2>
                                                <!-- Post Meta  -->
                                                <div class="post-meta-wrapper with-button">
                                                    <div class="post-meta">
                                                        <div class="post-author-avatar border-rounded">
                                                            <img src="{{$featuredPost->author->profile_photo_url}}"
                                                                 alt="Author Images" style="height: 64px;">
                                                        </div>
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span
                                                                    data-text="{{$featuredPost->author->name}}">{{$featuredPost->author->name}}</span>
                                                            </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">
                                                                <li>{{{$featuredPost->published_at->diffForHumans()}}}</li>
                                                                <li>{{$featuredPost->getReadingTime()}} min read</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="social-share-transparent justify-content-end">
                                                        <li>
                                                            <a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li>
                                                            <a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i
                                                                    class="fab fa-instagram"></i></a></li>
                                                        <li><a href="https://x.com/APIITsl?s=20"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i
                                                                    class="fab fa-youtube"></i></a></li>
                                                        <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                    </ul>
                                                    <div class="read-more-button cerchio">
                                                        <a class="axil-button button-rounded hover-flip-item-wrapper"
                                                           href="/blog/{{$featuredPost->slug}}">
                                                    <span class="hover-flip-item">
                                                        <span data-text="Read Post">Read Post</span>
                                                    </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Post Content  -->
                                        </div>
                                    @endif
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->


        123
        12
        13
        23
        1
        2
        3


        {{--        {{dd(Auth::check())}}--}}

        auth()->user()->interest_computing == 1 && auth()->user()->interest_computing == 2 &&
        auth()->user()->interest_computing == 3

        auth()->user()->interest_computing == 1 && auth()->user()->interest_computing == 2


        auth()->user()->interest_computing == 2 && auth()->user()->interest_computing == 3

        auth()->user()->interest_computing == 1 && auth()->user()->interest_computing == 3

        auth()->user()->interest_computing == 1

        auth()->user()->interest_computing == 2

        auth()->user()->interest_computing == 3


        @if($studentPosts->isNotEmpty())

            <div class="axil-post-grid-area axil-section-gapTop bg-color-grey">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title"
                                 style="display: flex; justify-content: space-between; align-items: baseline; font-weight: lighter">
                                <h2 class="title">Articles By Students</h2>
                                <a href="{{url('/blog?role=7')}}"><h5 style="color: #04B4AC">See More >></h5></a>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <!-- Start Tab Content  -->
                            <div class="grid-tab-content tab-content mt--10">

                                <!-- Start Single Tab Content  -->
                                <div class="single-post-grid tab-pane fade show active" id="gridone" role="tabpanel">
                                    <div class="row" style="display: flex; justify-content: center;">


                                        @foreach($studentPosts as $studentPost)
                                            <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                        <!-- Start Post Grid  -->
                                                        <div class="content-block post-grid mt--30">
                                                            <div class="post-thumbnail"
                                                                 style="align-items: center; justify-content: center; display: flex;">
                                                                <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                    <img src="{{ $studentPost->getThumbnailImage() }}"
                                                                         alt="Post Images"
                                                                         style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                </a>
                                                            </div>
                                                            <div class="post-grid-content">
                                                                <div class="post-content">
                                                                    <div class="post-cat">
                                                                        <div class="post-cat-list">
                                                                            <a class="hover-flip-item-wrapper">
                                                                        <span class="hover-flip-item">
                                                                            <span
                                                                                data-text="{{ $studentPost->categories[0]->title }}">{{ $studentPost->categories[0]->title }}</span>
                                                                        </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <h4 class="title"><a
                                                                            href="{{ route('post.show', $studentPost->slug) }}">{{ $studentPost->title }}</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Start Post Grid  -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <!-- End Single Tab Content  -->


                            </div>
                            <!-- End Tab Content  -->
                        </div>
                    </div>
                </div>
            </div>

        @endif

        @if($alumniPosts->isNotEmpty())

            <div class="axil-post-grid-area axil-section-gapTop bg-color-grey">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title"
                                 style="display: flex; justify-content: space-between; align-items: baseline; font-weight: lighter">
                                <h2 class="title">Articles By Alumni</h2>
                                <a href="{{url('/blog?role=8')}}"><h5 style="color: #04B4AC">See More >></h5></a>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <!-- Start Tab Content  -->
                            <div class="grid-tab-content tab-content mt--10">

                                <div class="single-post-grid tab-pane fade show active" id="gridone" role="tabpanel">
                                    <div class="row" style="display: flex; justify-content: center;">

                                        @foreach($alumniPosts as $alumniPost)
                                            <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                        <!-- Start Post Grid  -->
                                                        <div class="content-block post-grid mt--30">
                                                            <div class="post-thumbnail"
                                                                 style="align-items: center; justify-content: center; display: flex;">
                                                                <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                    <img src="{{ $alumniPost->getThumbnailImage() }}"
                                                                         alt="Post Images"
                                                                         style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                </a>
                                                            </div>
                                                            <div class="post-grid-content">
                                                                <div class="post-content">
                                                                    <div class="post-cat">
                                                                        <div class="post-cat-list">
                                                                            <a class="hover-flip-item-wrapper">
                                                                        <span class="hover-flip-item">
                                                                            <span
                                                                                data-text="{{ $alumniPost->categories[0]->title }}">{{ $alumniPost->categories[0]->title }}</span>
                                                                        </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <h4 class="title"><a
                                                                            href="{{ route('post.show', $alumniPost->slug) }}">{{ $alumniPost->title }}</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Start Post Grid  -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Content  -->
                        </div>
                    </div>
                </div>
            </div>

        @endif

        @if($academicsPosts->isNotEmpty())

            <div class="axil-post-grid-area axil-section-gapTop bg-color-grey">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title"
                                 style="display: flex; justify-content: space-between; align-items: baseline; font-weight: lighter">
                                <h2 class="title">Articles By Academics</h2>
                                <a href="{{url('/blog?role=5')}}"><h5 style="color: #04B4AC">See More >></h5></a>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <!-- Start Tab Content  -->
                            <div class="grid-tab-content tab-content mt--10">

                                <div class="single-post-grid tab-pane fade show active" id="gridone" role="tabpanel">
                                    <div class="row" style="display: flex; justify-content: center;">


                                        @foreach($academicsPosts as $academicsPost)
                                            <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                        <!-- Start Post Grid  -->
                                                        <div class="content-block post-grid mt--30">
                                                            <div class="post-thumbnail"
                                                                 style="align-items: center; justify-content: center; display: flex;">
                                                                <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                    <img src="{{ $academicsPost->getThumbnailImage() }}"
                                                                         alt="Post Images"
                                                                         style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                </a>
                                                            </div>
                                                            <div class="post-grid-content">
                                                                <div class="post-content">
                                                                    <div class="post-cat">
                                                                        <div class="post-cat-list">
                                                                            <a class="hover-flip-item-wrapper">
                                                                        <span class="hover-flip-item">
                                                                            <span
                                                                                data-text="{{ $academicsPost->categories[0]->title }}">{{ $academicsPost->categories[0]->title }}</span>
                                                                        </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <h4 class="title"><a
                                                                            href="{{ route('post.show', $academicsPost->slug) }}">{{ $academicsPost->title }}</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Start Post Grid  -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>


                            </div>
                            <!-- End Tab Content  -->
                        </div>
                    </div>
                </div>
            </div>

        @endif

        @if($nonAcademicsPosts->isNotEmpty())

            <div class="axil-post-grid-area axil-section-gapTop bg-color-grey">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title"
                                 style="display: flex; justify-content: space-between; align-items: baseline; font-weight: lighter">
                                <h2 class="title">Articles By Non-Academics</h2>
                                <a href="{{url('/blog?role=6')}}"><h5 style="color: #04B4AC">See More >></h5></a>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <!-- Start Tab Content  -->
                            <div class="grid-tab-content tab-content mt--10">

                                <div class="single-post-grid tab-pane fade show active" id="gridone" role="tabpanel">
                                    <div class="row" style="display: flex; justify-content: center;">


                                        @foreach($nonAcademicsPosts as $nonAcademicsPost)

                                            @if (Auth::user() == true)

                                                @php
                                                    $categoryCount = $nonAcademicsPost->categories->count();
                                                    $foundComputing = false;
                                                    $foundBusiness = false;
                                                    $foundLaw = false;
                                                @endphp


                                                @for($i=0; $i<$categoryCount; $i++)
                                                    @if ($nonAcademicsPost->categories[$i]->title == 'Computing')
                                                        @php($foundComputing = true)
                                                    @endif

                                                    @if ($nonAcademicsPost->categories[$i]->title == 'Business')
                                                        @php($foundBusiness = true)
                                                    @endif

                                                    @if ($nonAcademicsPost->categories[$i]->title == 'Law')
                                                        @php($foundLaw = true)
                                                    @endif
                                                @endfor

                                                @if (auth()->user()->interest_computing == 0 && auth()->user()->interest_business == 0 && auth()->user()->interest_law == 0)
                                                    <div class="alert alert-warning" id="alert"
                                                         style="margin: 10px 10px; text-align: center">
                                                        Please navigate to the profile page and enable at least one
                                                        interested faculty to see articles.
                                                    </div>
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_business == 1 && auth()->user()->interest_law == 1)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $nonAcademicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $nonAcademicsPost->getThumbnailImage() }}"
                                                                                alt="Post Images"
                                                                                style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-grid-content">
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="{{ $nonAcademicsPost->categories[0]->title }}">{{ $nonAcademicsPost->categories[0]->title }}</span>
                                                                            </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="title"><a
                                                                                    href="{{ route('post.show', $nonAcademicsPost->slug) }}">{{ $nonAcademicsPost->title }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Start Post Grid  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_business == 1 && $foundComputing == true && $foundBusiness == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $nonAcademicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $nonAcademicsPost->getThumbnailImage() }}"
                                                                                alt="Post Images"
                                                                                style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-grid-content">
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="{{ $nonAcademicsPost->categories[0]->title }}">{{ $nonAcademicsPost->categories[0]->title }}</span>
                                                                            </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="title"><a
                                                                                    href="{{ route('post.show', $nonAcademicsPost->slug) }}">{{ $nonAcademicsPost->title }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Start Post Grid  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_law == 1 && $foundComputing == true && $foundLaw == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $nonAcademicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $nonAcademicsPost->getThumbnailImage() }}"
                                                                                alt="Post Images"
                                                                                style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-grid-content">
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="{{ $nonAcademicsPost->categories[0]->title }}">{{ $nonAcademicsPost->categories[0]->title }}</span>
                                                                            </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="title"><a
                                                                                    href="{{ route('post.show', $nonAcademicsPost->slug) }}">{{ $nonAcademicsPost->title }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Start Post Grid  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif (auth()->user()->interest_business == 1 && auth()->user()->interest_law == 1 && $foundBusiness == true && $foundLaw == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $nonAcademicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $nonAcademicsPost->getThumbnailImage() }}"
                                                                                alt="Post Images"
                                                                                style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-grid-content">
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="{{ $nonAcademicsPost->categories[0]->title }}">{{ $nonAcademicsPost->categories[0]->title }}</span>
                                                                            </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="title"><a
                                                                                    href="{{ route('post.show', $nonAcademicsPost->slug) }}">{{ $nonAcademicsPost->title }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Start Post Grid  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif (auth()->user()->interest_computing == 1 && $foundComputing == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $nonAcademicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $nonAcademicsPost->getThumbnailImage() }}"
                                                                                alt="Post Images"
                                                                                style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-grid-content">
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="{{ $nonAcademicsPost->categories[0]->title }}">{{ $nonAcademicsPost->categories[0]->title }}</span>
                                                                            </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="title"><a
                                                                                    href="{{ route('post.show', $nonAcademicsPost->slug) }}">{{ $nonAcademicsPost->title }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Start Post Grid  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif(auth()->user()->interest_business == 1 && $foundBusiness == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $nonAcademicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $nonAcademicsPost->getThumbnailImage() }}"
                                                                                alt="Post Images"
                                                                                style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-grid-content">
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="{{ $nonAcademicsPost->categories[0]->title }}">{{ $nonAcademicsPost->categories[0]->title }}</span>
                                                                            </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="title"><a
                                                                                    href="{{ route('post.show', $nonAcademicsPost->slug) }}">{{ $nonAcademicsPost->title }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Start Post Grid  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif(auth()->user()->interest_law == 1 && $foundLaw == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $nonAcademicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $nonAcademicsPost->getThumbnailImage() }}"
                                                                                alt="Post Images"
                                                                                style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-grid-content">
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="{{ $nonAcademicsPost->categories[0]->title }}">{{ $nonAcademicsPost->categories[0]->title }}</span>
                                                                            </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h4 class="title"><a
                                                                                    href="{{ route('post.show', $nonAcademicsPost->slug) }}">{{ $nonAcademicsPost->title }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Start Post Grid  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="alert alert-warning" id="alert"
                                                         style="margin: 10px 10px; text-align: center">
                                                        No posts of the selected faculty is available. To view other faculty posts, enable the option in the profile page.
                                                    </div>
                                                @endif

                                            @else

                                                <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                            <!-- Start Post Grid  -->
                                                            <div class="content-block post-grid mt--30">
                                                                <div class="post-thumbnail"
                                                                     style="align-items: center; justify-content: center; display: flex;">
                                                                    <a href="{{ route('post.show', $nonAcademicsPost->slug) }}">
                                                                        <img
                                                                            src="{{ $nonAcademicsPost->getThumbnailImage() }}"
                                                                            alt="Post Images"
                                                                            style="max-height: 360px; max-width: 600px; height: 100%; width: auto;">
                                                                    </a>
                                                                </div>
                                                                <div class="post-grid-content">
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper">
                                                                            <span class="hover-flip-item">
                                                                                <span
                                                                                    data-text="{{ $nonAcademicsPost->categories[0]->title }}">{{ $nonAcademicsPost->categories[0]->title }}</span>
                                                                            </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h4 class="title"><a
                                                                                href="{{ route('post.show', $nonAcademicsPost->slug) }}">{{ $nonAcademicsPost->title }}</a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Start Post Grid  -->
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif

                                        @endforeach

                                    </div>
                                </div>


                            </div>
                            <!-- End Tab Content  -->
                        </div>
                    </div>
                </div>
            </div>

        @endif


        <div class="axil-post-grid-area axil-section bg-color-grey">
            <div class="container">
                <div class="row axil-section-gapBottom axil-section-gapTop">
                    <div class="col-lg-12">
                        <div class="axil-social-wrapper bg-color-white radius">
                            <ul class="social-with-text" style="justify-content: space-around;">
                                <li class="twitter"><a href="https://x.com/APIITsl?s=20"><i
                                            class="fab fa-twitter"></i><span>Twitter</span></a>
                                </li>
                                <li class="facebook"><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i
                                            class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                <li class="instagram"><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i
                                            class="fab fa-instagram"></i><span>Instagram</span></a></li>
                                <li class="youtube"><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i
                                            class="fab fa-youtube"></i><span>Youtube</span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start Post List Wrapper  -->
        {{--        <div class="axil-post-list-area post-listview-visible-color axil-section-gap bg-color-white">--}}
        {{--            <div class="container">--}}
        {{--                <div class="row" style="margin-bottom: 40px; margin-top: -50px;">--}}
        {{--                    <div class="col-lg-12">--}}
        {{--                        <div class="section-title">--}}
        {{--                            <h2 class="title">Recent Articles</h2>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-lg-8 col-xl-8">--}}


        {{--                        @foreach($popularPosts as $popularPost)--}}

        {{--                            @if ($popularPost->getAttribute('approved') == 1 && $popularPost->getAttribute('published_at') <= now() && $popularPost->image != null)--}}
        {{--                                @if ($popularPost->image == null)--}}
        {{--                                    <div class="content-block post-list-view format-quote mt--30">--}}
        {{--                                        <div class="post-content">--}}
        {{--                                            <div class="post-cat">--}}
        {{--                                                <div class="post-cat-list">--}}
        {{--                                                    <a class="hover-flip-item-wrapper">--}}
        {{--                                        <span class="hover-flip-item">--}}
        {{--                                            --}}{{-- <span data-text="TRAVEL">TRAVEL</span> --}}
        {{--                                        </span>--}}
        {{--                                                    </a>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}

        {{--                                            <h4 class="title" style="font-size: 24px; font-weight: bold">--}}
        {{--                                                <a href="{{ route('post.show', $popularPost->slug) }}">{{$popularPost->title}}</a>--}}
        {{--                                            </h4>--}}


        {{--                                            <div class="axil-single-widget widget widget_categories mb--30"--}}
        {{--                                                 style="margin-top: 40px;">--}}
        {{--                                                <ul>--}}
        {{--                                                    @foreach ($popularPost->categories as $category)--}}
        {{--                                                        <li class="cat-item">--}}
        {{--                                                            <a class="inner"--}}
        {{--                                                               style="width: fit-content; background-color: #4CAC; color: white; padding-left: 15px; padding-right: 15px;">--}}
        {{--                                                                <div class="content">--}}
        {{--                                                                    <h5 class="title"--}}
        {{--                                                                        style="color: white; font-weight: 600; font-size: 16px">{{$category->title}}</h5>--}}
        {{--                                                                </div>--}}
        {{--                                                            </a>--}}
        {{--                                                        </li>--}}
        {{--                                                    @endforeach--}}
        {{--                                                </ul>--}}
        {{--                                            </div>--}}
        {{--                                            <div class="post-meta-wrapper">--}}
        {{--                                                <div class="post-meta">--}}
        {{--                                                    <div class="content">--}}
        {{--                                                        <h6 class="post-author-name"--}}
        {{--                                                            style="font-size: 16px; font-weight: 500">--}}
        {{--                                                            <a class="hover-flip-item-wrapper">--}}
        {{--                                                <span class="hover-flip-item">--}}
        {{--                                                    <span--}}
        {{--                                                        data-text="{{$popularPost->author->name}}">{{$popularPost->author->name}}</span>--}}
        {{--                                                </span>--}}
        {{--                                                            </a>--}}
        {{--                                                        </h6>--}}
        {{--                                                        <ul class="post-meta-list">--}}
        {{--                                                            <li>{{$popularPost->published_at->diffForHumans()}}</li>--}}
        {{--                                                            <li>{{{$popularPost->getReadingTime()}}} min read</li>--}}
        {{--                                                        </ul>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}

        {{--                                @else--}}

        {{--                                    <div class="content-block post-list-view mt--30">--}}
        {{--                                        <div class="post-thumbnail">--}}
        {{--                                            <a href="{{ route('post.show', $popularPost->slug) }}">--}}
        {{--                                                <img src="{{$popularPost->getThumbnailImage()}}" alt="Post Images">--}}
        {{--                                            </a>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="post-content">--}}
        {{--                                            <div class="post-cat">--}}
        {{--                                                <div class="post-cat-list">--}}
        {{--                                                    <a class="hover-flip-item-wrapper">--}}
        {{--                                                        --}}{{-- <span class="hover-flip-item">--}}
        {{--                                                            <span data-text="{{$post->categories()->first()->getAttributes('title')}}">{{$post->categories()->first()->getAttributes('title')}}</span>--}}
        {{--                                                        </span> --}}
        {{--                                                    </a>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                            <h4 class="title" style="font-size: 24px; font-weight: bold;"><a--}}
        {{--                                                    href="{{ route('post.show', $popularPost->slug) }}">{{$popularPost->title}}</a>--}}
        {{--                                            </h4>--}}

        {{--                                            <div class="axil-single-widget widget widget_categories mb--30"--}}
        {{--                                                 style="margin-top: 40px;">--}}
        {{--                                                <ul>--}}
        {{--                                                    @foreach ($popularPost->categories as $category)--}}
        {{--                                                        <li class="cat-item">--}}
        {{--                                                            <a class="inner"--}}
        {{--                                                               style="width: fit-content; background-color: #4CAC; color: white; padding-left: 15px; padding-right: 15px;">--}}
        {{--                                                                <div class="content">--}}
        {{--                                                                    <h5 class="title"--}}
        {{--                                                                        style="color: white; font-weight: 600; font-size: 16px">{{$category->title}}</h5>--}}
        {{--                                                                </div>--}}
        {{--                                                            </a>--}}
        {{--                                                        </li>--}}
        {{--                                                    @endforeach--}}
        {{--                                                </ul>--}}
        {{--                                            </div>--}}
        {{--                                            <div class="post-meta-wrapper">--}}
        {{--                                                <div class="post-meta">--}}
        {{--                                                    <div class="content">--}}
        {{--                                                        <h6 class="post-author-name"--}}
        {{--                                                            style="font-size: 16px; font-weight: 500">--}}
        {{--                                                            <a class="hover-flip-item-wrapper">--}}
        {{--                                                <span class="hover-flip-item">--}}
        {{--                                                    <span--}}
        {{--                                                        data-text="{{$popularPost->author->name}}">{{$popularPost->author->name}}</span>--}}
        {{--                                                </span>--}}
        {{--                                                            </a>--}}
        {{--                                                        </h6>--}}
        {{--                                                        <ul class="post-meta-list">--}}
        {{--                                                            <li>{{$popularPost->published_at->diffForHumans()}}</li>--}}
        {{--                                                            <li>{{{$popularPost->getReadingTime()}}} min read</li>--}}
        {{--                                                        </ul>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}

        {{--                                @endif--}}

        {{--                            @endif--}}

        {{--                        @endforeach--}}


        {{--                    </div>--}}

        {{--                    <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">--}}
        {{--                        <!-- Start Sidebar Area  -->--}}
        {{--                        <div class="sidebar-inner">--}}

        {{--                            <!-- Start Single Widget  -->--}}
        {{--                            <div class="axil-single-widget widget widget_postlist mb--30">--}}
        {{--                                <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">--}}
        {{--                                    Categories</h5>--}}
        {{--                                <!-- Start Post List  -->--}}
        {{--                                <div class="axil-single-widget widget widget_categories mb--30">--}}
        {{--                                    <ul>--}}
        {{--                                        @foreach ($categories as $category)--}}
        {{--                                            <li class="cat-item" style="padding: 5px 5px;">--}}
        {{--                                                <a href="{{ route('post.index', ['category' => $category->slug]) }}"--}}
        {{--                                                   class="inner"--}}
        {{--                                                   style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">--}}
        {{--                                                    <div class="content">--}}
        {{--                                                        <h5 class="title"--}}
        {{--                                                            style="font-size: 18px; font-weight: bold;">{{$category->title}}--}}
        {{--                                                            ({{($category->posts->where('approved', true)->where('published_at', '<=', now())->count())}})</h5>--}}
        {{--                                                    </div>--}}
        {{--                                                </a>--}}
        {{--                                            </li>--}}
        {{--                                        @endforeach--}}
        {{--                                    </ul>--}}
        {{--                                </div>--}}
        {{--                                <!-- End Post List  -->--}}
        {{--                            </div>--}}
        {{--                            <!-- End Single Widget  -->--}}

        {{--                            <!-- Start Single Widget  -->--}}
        {{--                            <div class="axil-single-widget widget widget_search mb--30">--}}
        {{--                                <h5 class="widget-title">Search</h5>--}}
        {{--                                <a href="/blog">--}}
        {{--                                    <form action="#">--}}
        {{--                                        <div class="axil-search form-group">--}}
        {{--                                            <button type="submit" class="search-button"><i--}}
        {{--                                                    class="fal fa-search"></i></button>--}}
        {{--                                            <input type="text" class="form-control" placeholder="Search">--}}
        {{--                                        </div>--}}
        {{--                                    </form>--}}
        {{--                                </a>--}}
        {{--                            </div>--}}
        {{--                            <!-- End Single Widget  -->--}}

        {{--                            <!-- Start Single Widget  -->--}}
        {{--                            <div class="axil-single-widget widget widget_postlist mb--30">--}}
        {{--                                <h5 class="widget-title">Alumni Spotlights</h5>--}}
        {{--                                <!-- Start Post List  -->--}}
        {{--                                <div class="post-medium-block">--}}

        {{--                                    <!-- Start Single Post  -->--}}
        {{--                                    <div class="content-block post-medium mb--20">--}}
        {{--                                        <div class="post-thumbnail">--}}
        {{--                                            <a>--}}
        {{--                                                <img src="assets/images/post-images/alumni-spotlight1.jpg"--}}
        {{--                                                     alt="Post Images">--}}
        {{--                                            </a>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="post-content">--}}
        {{--                                            <h6 class="title"><a>The Story behind a Successful Tech Innovator</a></h6>--}}
        {{--                                            <div class="post-meta">--}}
        {{--                                                <ul class="post-meta-list">--}}
        {{--                                                    <li>Jun 21, 2022</li>--}}
        {{--                                                    <li>4 min read</li>--}}
        {{--                                                </ul>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <!-- End Single Post  -->--}}

        {{--                                    <!-- Start Single Post  -->--}}
        {{--                                    <div class="content-block post-medium mb--20">--}}
        {{--                                        <div class="post-thumbnail">--}}
        {{--                                            <a>--}}
        {{--                                                <img src="assets/images/post-images/alumni-spotlight2.jpg"--}}
        {{--                                                     alt="Post Images">--}}
        {{--                                            </a>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="post-content">--}}
        {{--                                            <h6 class="title"><a>Road to Becoming a Renowned Business Visionary</a>--}}
        {{--                                            </h6>--}}
        {{--                                            <div class="post-meta">--}}
        {{--                                                <ul class="post-meta-list">--}}
        {{--                                                    <li>Dec 15, 2020</li>--}}
        {{--                                                    <li>3 min read</li>--}}
        {{--                                                </ul>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <!-- End Single Post  -->--}}

        {{--                                    <!-- Start Single Post  -->--}}
        {{--                                    <div class="content-block post-medium mb--20">--}}
        {{--                                        <div class="post-thumbnail">--}}
        {{--                                            <a>--}}
        {{--                                                <img src="assets/images/post-images/alumni-spotlight3.jpg"--}}
        {{--                                                     alt="Post Images">--}}
        {{--                                            </a>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="post-content">--}}
        {{--                                            <h6 class="title"><a>How a Developer Managed To Run a Multi-Million--}}
        {{--                                                    Business</a></h6>--}}
        {{--                                            <div class="post-meta">--}}
        {{--                                                <ul class="post-meta-list">--}}
        {{--                                                    <li>May 06, 2020</li>--}}
        {{--                                                    <li>2 min read</li>--}}
        {{--                                                </ul>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <!-- End Single Post  -->--}}

        {{--                                </div>--}}
        {{--                                <!-- End Post List  -->--}}

        {{--                            </div>--}}
        {{--                            <!-- End Single Widget  -->--}}

        {{--                            <!-- Start Single Widget  -->--}}
        {{--                            --}}{{--                            <div class="axil-single-widget widget widget_postlist mb--30">--}}
        {{--                            --}}{{--                                <h5 class="widget-title">Oldest Articles</h5>--}}
        {{--                            --}}{{--                                <!-- Start Post List  -->--}}
        {{--                            --}}{{--                                <div class="post-medium-block">--}}

        {{--                            --}}{{--                                    @foreach ($oldestPosts as $oldestPost)--}}
        {{--                            --}}{{--                                        @if ($oldestPost->getAttribute('approved') == 1 && $oldestPost->getAttribute('published_at') <= now())--}}
        {{--                            --}}{{--                                            <!-- Start Single Post  -->--}}
        {{--                            --}}{{--                                            <div class="content-block post-medium mb--20">--}}
        {{--                            --}}{{--                                                <div class="post-thumbnail">--}}
        {{--                            --}}{{--                                                    <a href="/blog/{{$oldestPost->slug}}">--}}
        {{--                            --}}{{--                                                        @if ($oldestPost->image == null)--}}
        {{--                            --}}{{--                                                            <img src="assets/images/logo/no-image.jpg"--}}
        {{--                            --}}{{--                                                                 alt="Post Images">--}}
        {{--                            --}}{{--                                                        @else--}}
        {{--                            --}}{{--                                                        <img src="{{$oldestPost->getThumbnailImage()}}"--}}
        {{--                            --}}{{--                                                             alt="Post Images">--}}
        {{--                            --}}{{--                                                        @endif--}}
        {{--                            --}}{{--                                                    </a>--}}
        {{--                            --}}{{--                                                </div>--}}
        {{--                            --}}{{--                                                <div class="post-content">--}}
        {{--                            --}}{{--                                                    <h6 class="title"><a href="/blog/{{$oldestPost->slug}}">{{$oldestPost->title}}</a></h6>--}}
        {{--                            --}}{{--                                                    <div class="post-meta">--}}
        {{--                            --}}{{--                                                        <ul class="post-meta-list">--}}
        {{--                            --}}{{--                                                            <li>{{$oldestPost->published_at->diffForHumans()}}</li>--}}
        {{--                            --}}{{--                                                            <li>{{$oldestPost->getReadingTime()}} min read</li>--}}
        {{--                            --}}{{--                                                        </ul>--}}
        {{--                            --}}{{--                                                    </div>--}}
        {{--                            --}}{{--                                                </div>--}}
        {{--                            --}}{{--                                            </div>--}}
        {{--                            --}}{{--                                            <!-- End Single Post  -->--}}
        {{--                            --}}{{--                                        @endif--}}
        {{--                            --}}{{--                                    @endforeach--}}

        {{--                            --}}{{--                                </div>--}}
        {{--                            --}}{{--                                <!-- End Post List  -->--}}

        {{--                            --}}{{--                            </div>--}}
        {{--                            <!-- End Single Widget  -->--}}

        {{--                            <!-- Start Single Widget  -->--}}
        {{--                            <div class="axil-single-widget widget widget_social mb--30">--}}
        {{--                                <h5 class="widget-title">Stay In Touch</h5>--}}
        {{--                                <!-- Start Post List  -->--}}
        {{--                                <ul class="social-icon md-size justify-content-center">--}}
        {{--                                    <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i--}}
        {{--                                                class="fab fa-facebook-f"></i></a></li>--}}
        {{--                                    <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i--}}
        {{--                                                class="fab fa-instagram"></i></a></li>--}}
        {{--                                    <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>--}}
        {{--                                    <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i--}}
        {{--                                                class="fab fa-youtube"></i></a></li>--}}
        {{--                                    <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i--}}
        {{--                                                class="fab fa-linkedin-in"></i></a></li>--}}
        {{--                                </ul>--}}
        {{--                                <!-- End Post List  -->--}}
        {{--                            </div>--}}
        {{--                            <!-- End Single Widget  -->--}}

        {{--                            <!-- Start Single Widget  -->--}}

        {{--                            <!-- End Single Widget  -->--}}
        {{--                        </div>--}}
        {{--                        <!-- End Sidebar Area  -->--}}

        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}


        <!-- End Video Area  -->


        <!-- End Instagram Area  -->

        <!-- End Footer Area  -->

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>

    <!-- JS
============================================ -->

    {{--    <!-- Modernizer JS -->--}}

    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/main.js"></script>
    {{--    <!-- Main JS -->--}}


    {{--    </body>--}}


    {{--    <!-- Mirrored from new.axilthemes.com/demo/template/blogar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Feb 2024 11:05:41 GMT -->--}}

    {{--    </html>--}}

</x-site-layout>
