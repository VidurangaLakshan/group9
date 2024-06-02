<x-site-layout>

    @auth
        @if (auth()->user()->approved == 1 && auth()->user()->newUserPersonalized == 0 && (auth()->user()->role->value == 5 || auth()->user()->role->value == 6 || auth()->user()->role->value == 7 || auth()->user()->role->value == 8))
            <div class="overlay">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center"
                     class="overlay-div">
                    <h1 class="overlay-h1" style="margin: 10px 0 30px 0">How to Use the APIIT Blog</h1>
                    @if (auth()->user()->role->value == 5 || auth()->user()->role->value == 6)
                        <iframe style="border: #04B4AC 7px solid; border-radius: 5px" width="560" height="315"
                                src="https://www.youtube.com/embed/xopvkx6CpNs?si=BQ7zpViwHY63uf7h"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @elseif (auth()->user()->role->value == 7)
                        <iframe style="border: #04B4AC 7px solid; border-radius: 5px" width="560" height="315"
                                src="https://www.youtube.com/embed/xopvkx6CpNs?si=BQ7zpViwHY63uf7h"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @elseif (auth()->user()->role->value == 8)
                        <iframe style="border: #04B4AC 7px solid; border-radius: 5px" width="560" height="315"
                                src="https://www.youtube.com/embed/xopvkx6CpNs?si=BQ7zpViwHY63uf7h"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @endif
{{--                    <iframe style="border: #04B4AC 7px solid; border-radius: 5px" width="560" height="315"--}}
{{--                            src="https://www.youtube.com/embed/xopvkx6CpNs?si=BQ7zpViwHY63uf7h"--}}
{{--                            title="YouTube video player" frameborder="0"--}}
{{--                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"--}}
{{--                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>--}}
                    <div style="display: flex; margin-top: 20px; justify-content: space-around; width: 100%;">
                        {{--                <form style="">--}}
                        {{--                    <button style="border: #04B4AC 1px solid;  background-color: white; border-radius: 40px; padding: 10px 20px">--}}
                        {{--                        Remind Me Later--}}
                        {{--                    </button>--}}
                        {{--                </form>--}}
                        <form class="completeTutorial" action="{{ route('overlay') }}">
                            <button type="submit"
                                    style="color: white; background-color: #04B4AC; border-radius: 40px; padding: 10px 20px">
                                Complete Tutorial
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endauth


    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black background with 50% opacity */
            z-index: 9999; /* Ensure the overlay is on top of other elements */
        }

        .overlay-div {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            width: 50%;
            /*height: 50%;*/
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        @media screen and (min-width: 1000px) and (max-width: 1200px) {
            .overlay-div {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: #f1f1f1;
                width: 60%;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
            }
        }

        @media screen and (min-width: 720px) and (max-width: 1000px) {
            .overlay-div {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: #f1f1f1;
                width: 80%;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
            }
        }

        @media screen and (max-width: 720px) {
            .overlay-div {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: #f1f1f1;
                width: 90%;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
            }
        }

        @media screen and (min-width: 585px) and (max-width: 720px) {
            iframe {
                width: 500px;
                height: 281px;
            }
        }

        @media screen and (min-width: 470px) and (max-width: 585px) {
            iframe {
                width: 400px;
                height: 225px;
            }
        }

        @media screen and (min-width: 356px) and (max-width: 470px) {
            iframe {
                width: 300px;
                height: 168px;
            }
        }

        @media screen and (min-width: 200px) and (max-width: 356px) {
            iframe {
                width: 250px;
                height: 130px;
            }

            .overlay-h1 {
                font-size: 1.5rem;
            }
        }

        .completeTutorial {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0 15px 0;
        }
    </style>


    {{--    FIRST TIME LOGIN MESSAGES  --}}

    @if (Auth::user() == true)
        @if ((Auth::user()->role->value == 5 || Auth::user()->role->value == 6 || Auth::user()->role->value == 7 || Auth::user()->role->value == 8) && Auth::user()->approved == 0)
            <div class="alert alert-warning" id="alert" style="margin: 10px 10px; text-align: center">
                Your account is not verified yet. Please wait for 24-48 hours until the administrator approves your
                account.
                Till
                then, you can only view articles.
            </div>
        @endif

{{--        @if (Auth::user()->approved == 1 && Auth::user()->newUserPersonalized == 0)--}}
{{--            <div class="alert alert-warning" id="alert" style="margin: 10px 10px; text-align: center">--}}
{{--                Please complete your profile settings to personalize your experience.--}}
{{--            </div>--}}
{{--        @endif--}}
    @endif


    <div class="main-wrapper">


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

                                                <div class="post-thumbnail"
                                                     style="display: flex; justify-content: center">
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

        <div class="axil-trending-post-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Events @ APIIT</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Axil Tab Button  -->
                        <ul class="axil-tab-button nav nav-tabs mt--20" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="trend-one" data-bs-toggle="tab" href="#trendone"
                                   role="tab"
                                   aria-controls="trend-one" aria-selected="true">Upcoming</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="trend-two" data-bs-toggle="tab" href="#trendtwo" role="tab"
                                   aria-controls="trend-two" aria-selected="false">Previous</a>
                            </li>
                        </ul>
                        <!-- End Axil Tab Button  -->

                        <!-- Start Axil Tab Content  -->
                        <div class="tab-content">


                            <?php

                            $ongoingEventsCount = 0;
                            $upcomingEventsCount = 0;
                            $pastEventsCount = $pastEvents->count();
                            ?>


                                <!-- Single Tab Content  -->

                            <!-- Single Tab Content  -->
                            <div class="row trend-tab-content tab-pane fade show active" id="trendone" role="tabpanel"
                                 aria-labelledby="trend-two">
                                <div class="col-lg-8">

                                    <!-- Start Single Post  -->
                                    @foreach($upcomingEvents as $upcomingEvent)
                                            <?php
                                            $upcomingEventsCount++;
                                            ?>
                                        <div class="content-block trend-post post-order-list is-active">
                                            <div class="post-inner">

                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper" href="">
                                                            <span class="hover-flip-item">
                                                                @if ($upcomingEvent->start_date != null)
                                                                    <span
                                                                        data-text="{{$upcomingEvent->start_date}}">{{$upcomingEvent->start_date}}</span>
                                                                @endif
                                                            </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h3 class="title"><a
                                                            href="{{ route('event.show', $upcomingEvent->slug) }}">{{$upcomingEvent->title}}</a>
                                                    </h3>
                                                    <div class="post-meta-wrapper">
                                                        <div class="post-meta">
                                                            <div class="content">
                                                                <h6 class="post-author-name">
                                                                    <a class="hover-flip-item-wrapper"
                                                                       href="{{ route('event.club', $upcomingEvent->user_id) }}">
                                                                    <span class="hover-flip-item">
                                                                        <span
                                                                            data-text="{{$upcomingEvent->author->name}}">{{$upcomingEvent->author->name}}</span>
                                                                    </span>
                                                                    </a>
                                                                </h6>
                                                                <ul class="post-meta-list">
                                                                    <li>{{$upcomingEvent->getReadingTime()}} min read
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <ul class="social-share-transparent justify-content-end">

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail">
                                                <a href="{{ route('event.show', $upcomingEvent->slug) }}">
                                                    <img src="{{$upcomingEvent->getThumbnailImage()}}"
                                                         alt="Post Images">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if ($upcomingEvents->count() == 1)
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    @endif
                                    <!-- End Single Post  -->


                                </div>
                            </div>
                            <!-- Single Tab Content  -->

                            <!-- Single Tab Content  -->
                            <div class="row trend-tab-content tab-pane fade" id="trendtwo" role="tabpanel"
                                 aria-labelledby="trend-two">
                                <div class="col-lg-8">


                                    <!-- Start Single Post  -->
                                    @foreach($pastEvents as $pastEvent)

                                            <?php
                                            $pastEventsCount--;
                                            ?>
                                        <div class="content-block trend-post post-order-list is-active">
                                            <div class="post-inner">

                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper" href="">
                                                            <span class="hover-flip-item">
                                                                @if ($pastEvent->start_date != null)
                                                                    <span
                                                                        data-text="{{$pastEvent->start_date}}">{{$pastEvent->start_date}}</span>
                                                                @endif
                                                            </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h3 class="title"><a
                                                            href="{{ route('event.show', $pastEvent->slug) }}">{{$pastEvent->title}}</a>
                                                    </h3>
                                                    <div class="post-meta-wrapper">
                                                        <div class="post-meta">
                                                            <div class="content">
                                                                <h6 class="post-author-name">
                                                                    <a class="hover-flip-item-wrapper"
                                                                       href="{{ route('event.club', $pastEvent->user_id) }}">
                                                                    <span class="hover-flip-item">
                                                                        <span
                                                                            data-text="{{$pastEvent->author->name}}">{{$pastEvent->author->name}}</span>
                                                                    </span>
                                                                    </a>
                                                                </h6>
                                                                <ul class="post-meta-list">
                                                                    <li>{{$pastEvent->getReadingTime()}} min read</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <ul class="social-share-transparent justify-content-end">

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-thumbnail">
                                                <a href="{{ route('event.show', $pastEvent->slug) }}">
                                                    <img src="{{$pastEvent->getThumbnailImage()}}"
                                                         alt="Post Images">
                                                </a>
                                            </div>
                                        </div>

                                    @endforeach

                                    @if ($pastEvents->count() == 1)
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    @endif
                                    <!-- End Single Post  -->

                                </div>
                            </div>
                            <!-- Single Tab Content  -->
                        </div>
                        <!-- End Axil Tab Content  -->
                    </div>
                </div>
            </div>
        </div>


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


                                            <?php
                                            $counter1 = 0;
                                            $counter2 = 0;
                                            $counter3 = 0;
                                            $counter4 = 0;
                                            $counter5 = 0;
                                            $counter6 = 0;
                                            $counter7 = 0;
                                            $counter8 = 0;
                                            ?>


                                        @foreach($studentPosts as $studentPost)

                                            @if (Auth::user() == true)

                                                    <?php


                                                    $categoryCountStudent = $studentPost->categories->count();
                                                    $foundComputingStudent = false;
                                                    $foundBusinessStudent = false;
                                                    $foundLawStudent = false;



                                                    for ($i = 0; $i < $categoryCountStudent; $i++) {
                                                        if ($studentPost->categories[$i]->title == 'Computing') {
                                                            $foundComputingStudent = true;
                                                        }


                                                        if ($studentPost->categories[$i]->title == 'Business') {
                                                            $foundBusinessStudent = true;
                                                        }


                                                        if ($studentPost->categories[$i]->title == 'Law') {
                                                            $foundLawStudent = true;
                                                        }

                                                    }

                                                    ?>

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

                                                        <?php
                                                        $counter1++;
                                                        ?>

                                                    @if ($counter1 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter2++;
                                                        ?>

                                                    @if ($counter2 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter3++;
                                                        ?>

                                                    @if ($counter3 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter4++;
                                                        ?>

                                                    @if ($counter4 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter5++;
                                                        ?>

                                                    @if ($counter5 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter6++;
                                                        ?>

                                                    @if ($counter6 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter7++;

                                                        ?>
                                                    @if ($counter7 >= 4)
                                                        @break
                                                    @endif

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

                                                    <?php
                                                    $counter8++;
                                                    ?>

                                                @if ($counter8 >= 4)
                                                    @break
                                                @endif

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

                                            <?php
                                            $counter1 = 0;
                                            $counter2 = 0;
                                            $counter3 = 0;
                                            $counter4 = 0;
                                            $counter5 = 0;
                                            $counter6 = 0;
                                            $counter7 = 0;
                                            $counter8 = 0;
                                            ?>

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

                                                        <?php
                                                        $counter1++;
                                                        ?>

                                                    @if ($counter1 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter2++;
                                                        ?>

                                                    @if ($counter2 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter3++;
                                                        ?>

                                                    @if ($counter3 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter4++;
                                                        ?>

                                                    @if ($counter4 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter5++;
                                                        ?>

                                                    @if ($counter5 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter6++;
                                                        ?>

                                                    @if ($counter6 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter7++;
                                                        ?>

                                                    @if ($counter7 >= 4)
                                                        @break
                                                    @endif

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


                                                    <?php
                                                    $counter8++;
                                                    ?>

                                                @if ($counter8 >= 4)
                                                    @break
                                                @endif

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

                                            <?php
                                            $counter1 = 0;
                                            $counter2 = 0;
                                            $counter3 = 0;
                                            $counter4 = 0;
                                            $counter5 = 0;
                                            $counter6 = 0;
                                            $counter7 = 0;
                                            $counter8 = 0;
                                            ?>

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

                                                        <?php
                                                        $counter1++;
                                                        ?>

                                                    @if ($counter1 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter2++;
                                                        ?>

                                                    @if ($counter2 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter3++;
                                                        ?>

                                                    @if ($counter3 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter4++;
                                                        ?>

                                                    @if ($counter4 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter5++;
                                                        ?>

                                                    @if ($counter5 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter6++;
                                                        ?>

                                                    @if ($counter6 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter7++;
                                                        ?>

                                                    @if ($counter7 >= 4)
                                                        @break
                                                    @endif

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

                                                    <?php
                                                    $counter8++;
                                                    ?>

                                                @if ($counter8 >= 4)
                                                    @break
                                                @endif

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


                                            <?php
                                            $counter1 = 0;
                                            $counter2 = 0;
                                            $counter3 = 0;
                                            $counter4 = 0;
                                            $counter5 = 0;
                                            $counter6 = 0;
                                            $counter7 = 0;
                                            $counter8 = 0;
                                            ?>

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

                                                        <?php
                                                        $counter1++;
                                                        ?>

                                                    @if ($counter1 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter2++;
                                                        ?>

                                                    @if ($counter2 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter3++;
                                                        ?>

                                                    @if ($counter3 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter4++;
                                                        ?>

                                                    @if ($counter4 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter5++;
                                                        ?>

                                                    @if ($counter5 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter6++;
                                                        ?>

                                                    @if ($counter6 >= 4)
                                                        @break
                                                    @endif

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

                                                        <?php
                                                        $counter7++;
                                                        ?>

                                                    @if ($counter7 >= 4)
                                                        @break
                                                    @endif

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

                                                    <?php
                                                    $counter8++;
                                                    ?>

                                                @if ($counter8 >= 4)
                                                    @break
                                                @endif

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
                                <li class="twitter"><a href="https://x.com/APIITsl"><i
                                            class="fab fa-twitter"></i><span>Twitter</span></a>
                                </li>
                                <li class="facebook"><a href="https://www.facebook.com/APIITofficial"><i
                                            class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                <li class="instagram"><a href="https://www.instagram.com/apiitsl"><i
                                            class="fab fa-instagram"></i><span>Instagram</span></a></li>
                                <li class="youtube"><a href="https://youtube.com/@APIITedu"><i
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
