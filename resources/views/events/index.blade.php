<x-site-layout>
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
                            <a class="nav-link active" id="trend-one" data-bs-toggle="tab" href="#trendone" role="tab"
                               aria-controls="trend-one" aria-selected="true">Today</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="trend-two" data-bs-toggle="tab" href="#trendtwo" role="tab"
                               aria-controls="trend-two" aria-selected="false">Upcoming</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="trend-three" data-bs-toggle="tab" href="#trendthree" role="tab"
                               aria-controls="trend-three" aria-selected="false">Previous</a>
                        </li>
                    </ul>
                    <!-- End Axil Tab Button  -->

                    <!-- Start Axil Tab Content  -->
                    <div class="tab-content">


                        <!-- Single Tab Content  -->
                        <div class="row trend-tab-content tab-pane fade show active" id="trendone" role="tabpanel"
                             aria-labelledby="trend-one">
                            <div class="col-lg-8">
                                <?php

                                $ongoingEventsCount = 0;
                                $upcomingEventsCount = 0;
                                $pastEventsCount = $pastEvents->count();
                                ?>


                                @if ($ongoingEvents->isEmpty())
                                    <div class="content-block post-list-view format-quote mt--30">
                                        <div class="post-content" style="margin-top: 30px;">
                                            <h4 class="title" style="font-size: 24px; font-weight: bold">No events today</h4>
                                        </div>
                                    </div>
                                @endif


                                <!-- Start Single Post  -->
                                @foreach($ongoingEvents as $ongoingEvent)
                                        <?php
                                        $ongoingEventsCount++;
                                        ?>
                                    <div class="content-block trend-post post-order-list is-active">
                                        <div class="post-inner">
                                            {{--                                            <span class="post-order-list">{{$ongoingEventsCount}}</span>--}}

                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" href="">
                                                            <span class="hover-flip-item">
                                                                <span data-text=""></span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a
                                                        href="{{ route('event.show', $ongoingEvent->slug) }}">{{$ongoingEvent->title}}</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper" href="{{ route('event.club', $ongoingEvent->user_id) }}">
                                                                    <span class="hover-flip-item">
                                                                        <span
                                                                            data-text="{{$ongoingEvent->author->name}}">{{$ongoingEvent->author->name}}</span>
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">
                                                                <li>{{$ongoingEvent->getReadingTime()}} min read</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="social-share-transparent justify-content-end">

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a href="{{ route('event.show', $ongoingEvent->slug) }}">
                                                <img src="{{$ongoingEvent->getThumbnailImage()}}"
                                                     alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                                @if ($ongoingEvents->count() == 1)
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
                                                                    <span data-text="{{$upcomingEvent->start_date}}">{{$upcomingEvent->start_date}}</span>
                                                                @endif
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a
                                                        href="{{ route('event.show', $upcomingEvent->slug) }}">{{$upcomingEvent->title}}</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper" href="{{ route('event.club', $upcomingEvent->user_id) }}">
                                                                    <span class="hover-flip-item">
                                                                        <span
                                                                            data-text="{{$upcomingEvent->author->name}}">{{$upcomingEvent->author->name}}</span>
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">
                                                                <li>{{$upcomingEvent->getReadingTime()}} min read</li>
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
                        <div class="row trend-tab-content tab-pane fade" id="trendthree" role="tabpanel"
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
                                                                    <span data-text="{{$pastEvent->start_date}}">{{$pastEvent->start_date}}</span>
                                                                @endif
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a
                                                        href="{{ route('event.show', $pastEvent->slug) }}">{{$pastEvent->title}}</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper" href="{{ route('event.club', $pastEvent->user_id) }}">
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
</x-site-layout>
