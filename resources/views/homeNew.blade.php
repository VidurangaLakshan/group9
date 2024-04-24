<x-site-layout>

    {{--    FIRST TIME LOGIN MESSAGES  --}}

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


        <!-- Start Banner Area -->

        <div class="slider-area bg-color-grey" style="padding-bottom: 25px;">
            <div class="axil-slide slider-style-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-activation axil-slick-arrow">

                                {{--                            FEATURED POSTS DISPLAY SLIDER --}}

                                @foreach($featuredPosts as $featuredPost)
                                    @if($featuredPost->featured == 1 && $featuredPost->getAttribute('approved') == 1 && $featuredPost->getAttribute('published_at') <= now())
                                        <div class="content-block">
                                            <!-- Start Post Thumbnail  -->

                                            @if ($featuredPost->image != null)

                                                <div class="post-thumbnail" style="display: flex; justify-content: center">
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
                                                            <a href="https://www.facebook.com/APIITofficial"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li>
                                                            <a href="https://www.instagram.com/apiitsl"><i
                                                                    class="fab fa-instagram"></i></a></li>
                                                        <li><a href="https://x.com/APIITsl?s=20"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li><a href="https://youtube.com/@APIITedu"><i
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


        {{--        STUDENT POST AREA --}}
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

                                            @if (Auth::user() == true)

                                                @php
                                                    $categoryCountStudent = $studentPost->categories->count();
                                                    $foundComputingStudent = false;
                                                    $foundBusinessStudent = false;
                                                    $foundLawStudent = false;



                                                for($i=0; $i<$categoryCountStudent; $i++) {
                                                    if ($studentPost->categories[$i]->title == 'Computing'){
                                                        $foundComputingStudent = true;
                                                        }


                                                    if ($studentPost->categories[$i]->title == 'Business'){
                                                        $foundBusinessStudent = true;
                                                    }


                                                    if ($studentPost->categories[$i]->title == 'Law'){
                                                        $foundLawStudent = true;
                                                    }

                                                }

                                                @endphp

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
                                                                        <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                            <img
                                                                                src="{{ $studentPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_business == 1 && $foundComputingStudent == true && $foundBusinessStudent == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                            <img
                                                                                src="{{ $studentPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_law == 1 && $foundComputingStudent == true && $foundLawStudent == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                            <img
                                                                                src="{{ $studentPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_business == 1 && auth()->user()->interest_law == 1 && $foundBusinessStudent == true && $foundLawStudent == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                            <img
                                                                                src="{{ $studentPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && $foundComputingStudent == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                            <img
                                                                                src="{{ $studentPost->getThumbnailImage() }}"
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
                                                @elseif(auth()->user()->interest_business == 1 && $foundBusinessStudent == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                            <img
                                                                                src="{{ $studentPost->getThumbnailImage() }}"
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
                                                @elseif(auth()->user()->interest_law == 1 && $foundLawStudent == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                            <img
                                                                                src="{{ $studentPost->getThumbnailImage() }}"
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
                                                @else
                                                    <div class="alert alert-warning" id="alert"
                                                         style="margin: 10px 10px; text-align: center">
                                                        No posts of the selected faculty is available. To view other
                                                        faculty posts, enable the option in the profile page.
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
                                                                    <a href="{{ route('post.show', $studentPost->slug) }}">
                                                                        <img
                                                                            src="{{ $studentPost->getThumbnailImage() }}"
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

                                            @endif

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

        {{--        ALUMNI POST AREA --}}
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

                                            @if (Auth::user() == true)

                                                @php
                                                    $categoryCountAlumni = $alumniPost->categories->count();
                                                    $foundComputingAlumni = false;
                                                    $foundBusinessAlumni = false;
                                                    $foundLawAlumni = false;



                                                for($i=0; $i<$categoryCountAlumni; $i++) {
                                                    if ($alumniPost->categories[$i]->title == 'Computing'){
                                                        $foundComputingAlumni = true;
                                                        }


                                                    if ($alumniPost->categories[$i]->title == 'Business'){
                                                        $foundBusinessAlumni = true;
                                                    }


                                                    if ($alumniPost->categories[$i]->title == 'Law'){
                                                        $foundLawAlumni = true;
                                                    }

                                                }

                                                @endphp

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
                                                                        <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                            <img
                                                                                src="{{ $alumniPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_business == 1 && $foundComputingAlumni == true && $foundBusinessAlumni == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                            <img
                                                                                src="{{ $alumniPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_law == 1 && $foundComputingAlumni == true && $foundLawAlumni == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                            <img
                                                                                src="{{ $alumniPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_business == 1 && auth()->user()->interest_law == 1 && $foundBusinessAlumni == true && $foundLawAlumni == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                            <img
                                                                                src="{{ $alumniPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && $foundComputingAlumni == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                            <img
                                                                                src="{{ $alumniPost->getThumbnailImage() }}"
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
                                                @elseif(auth()->user()->interest_business == 1 && $foundBusinessAlumni == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                            <img
                                                                                src="{{ $alumniPost->getThumbnailImage() }}"
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
                                                @elseif(auth()->user()->interest_law == 1 && $foundLawAlumni == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                            <img
                                                                                src="{{ $alumniPost->getThumbnailImage() }}"
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
                                                @else
                                                    <div class="alert alert-warning" id="alert"
                                                         style="margin: 10px 10px; text-align: center">
                                                        No posts of the selected faculty is available. To view other
                                                        faculty posts, enable the option in the profile page.
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
                                                                    <a href="{{ route('post.show', $alumniPost->slug) }}">
                                                                        <img
                                                                            src="{{ $alumniPost->getThumbnailImage() }}"
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

            {{--        ACADEMICS POST AREA --}}
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

                                            @if (Auth::user() == true)

                                                @php
                                                    $categoryCountAcademics = $academicsPost->categories->count();
                                                    $foundComputingAcademics = false;
                                                    $foundBusinessAcademics = false;
                                                    $foundLawAcademics = false;


                                                for($i=0; $i<$categoryCountAcademics; $i++){
                                                    if ($academicsPost->categories[$i]->title == 'Computing'){
                                                        $foundComputingAcademics = true;
                                                        }

                                                    if ($academicsPost->categories[$i]->title == 'Business'){
                                                       $foundBusinessAcademics = true;
                                                       }

                                                    if ($academicsPost->categories[$i]->title == 'Law'){
                                                       $foundLawAcademics = true;
                                                       }

                                                }

                                                @endphp

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
                                                                        <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $academicsPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_business == 1 && $foundComputingAcademics == true && $foundBusinessAcademics == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $academicsPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_law == 1 && $foundComputingAcademics == true && $foundLawAcademics == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $academicsPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_business == 1 && auth()->user()->interest_law == 1 && $foundBusinessAcademics == true && $foundLawAcademics == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $academicsPost->getThumbnailImage() }}"
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
                                                @elseif (auth()->user()->interest_computing == 1 && $foundComputingAcademics == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $academicsPost->getThumbnailImage() }}"
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
                                                @elseif(auth()->user()->interest_business == 1 && $foundBusinessAcademics == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $academicsPost->getThumbnailImage() }}"
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
                                                @elseif(auth()->user()->interest_law == 1 && $foundLawAcademics == true)
                                                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                                <!-- Start Post Grid  -->
                                                                <div class="content-block post-grid mt--30">
                                                                    <div class="post-thumbnail"
                                                                         style="align-items: center; justify-content: center; display: flex;">
                                                                        <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                            <img
                                                                                src="{{ $academicsPost->getThumbnailImage() }}"
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
                                                @else
                                                    <div class="alert alert-warning" id="alert"
                                                         style="margin: 10px 10px; text-align: center">
                                                        No posts of the selected faculty is available. To view other
                                                        faculty posts, enable the option in the profile page.
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
                                                                    <a href="{{ route('post.show', $academicsPost->slug) }}">
                                                                        <img
                                                                            src="{{ $academicsPost->getThumbnailImage() }}"
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

        {{--        NON-ACADEMICS POST AREA --}}
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
                                                    $categoryCountNonAcademics = $nonAcademicsPost->categories->count();
                                                    $foundComputingNonAcademics = false;
                                                    $foundBusinessNonAcademics = false;
                                                    $foundLawNonAcademics = false;



                                                for($i=0; $i<$categoryCountNonAcademics; $i++) {
                                                    if ($nonAcademicsPost->categories[$i]->title == 'Computing'){
                                                        $foundComputingNonAcademics = true;
                                                        }


                                                    if ($nonAcademicsPost->categories[$i]->title == 'Business'){
                                                        $foundBusinessNonAcademics = true;
                                                    }


                                                    if ($nonAcademicsPost->categories[$i]->title == 'Law'){
                                                        $foundLawNonAcademics = true;
                                                    }

                                                }

                                                @endphp

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
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_business == 1 && $foundComputingNonAcademics == true && $foundBusinessNonAcademics == true)
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
                                                @elseif (auth()->user()->interest_computing == 1 && auth()->user()->interest_law == 1 && $foundComputingNonAcademics == true && $foundLawNonAcademics == true)
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
                                                @elseif (auth()->user()->interest_business == 1 && auth()->user()->interest_law == 1 && $foundBusinessNonAcademics == true && $foundLawNonAcademics == true)
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
                                                @elseif (auth()->user()->interest_computing == 1 && $foundComputingNonAcademics == true)
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
                                                @elseif(auth()->user()->interest_business == 1 && $foundBusinessNonAcademics == true)
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
                                                @elseif(auth()->user()->interest_law == 1 && $foundLawNonAcademics == true)
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
                                                        No posts of the selected faculty is available. To view other
                                                        faculty posts, enable the option in the profile page.
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

        <!-- Start Back To Top  -->
        <a id="backto-top"></a>
        <!-- End Back To Top  -->

    </div>


    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/main.js"></script>


</x-site-layout>
