<x-site-layout>


    @if (Auth::user() == true)
        @if (Auth::user()->role->value == 6 && Auth::user()->approved == 0)
            <div class="alert alert-warning" id="alert" style="margin: 10px 10px; text-align: center">
                Your account is not verified yet. Please wait for 24-48 hours until the admin approves your account. Till
                then, you can't write articles.
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
                                                <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i class="fab fa-linkedin-in"></i></a></li>
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
                                                <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i class="fab fa-linkedin-in"></i></a></li>
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
                                    @if($featuredPost->featured == 1)
                                        <div class="content-block">
                                            <!-- Start Post Thumbnail  -->
                                            <div class="post-thumbnail">
                                                <a href="/blog/{{$featuredPost->slug}}">
                                                    <img src="{{$featuredPost->getThumbnailImage()}}"
                                                         alt="Post Images">
                                                </a>
                                            </div>
                                            <!-- End Post Thumbnail  -->

                                            <!-- Start Post Content  -->
                                            <div class="post-content">
                                                <div class="post-cat-list">
                                                    <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span data-text="{{$featuredPost->categories[0]->title}}">{{$featuredPost->categories[0]->title}}</span>
                                                </span>
                                                    </a>
                                                </div>
                                                <h2 class="title"><a href="/blog/{{$featuredPost->slug}}">{{$featuredPost->title}}</a></h2>
                                                <!-- Post Meta  -->
                                                <div class="post-meta-wrapper with-button">
                                                    <div class="post-meta">
                                                        <div class="post-author-avatar border-rounded">
                                                            <img src="{{$featuredPost->author->profile_photo_url}}"
                                                                 alt="Author Images">
                                                        </div>
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="{{$featuredPost->author->name}}">{{$featuredPost->author->name}}</span>
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
                                                        <li><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i class="fab fa-instagram"></i></a></li>
                                                        <li><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i class="fab fa-youtube"></i></a></li>
                                                        <li><a href="https://www.linkedin.com/company/apiit-sri-lanka/"><i class="fab fa-linkedin-in"></i></a></li>
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




        <div class="axil-featured-post axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">More Featured Posts</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Single Post  -->
                    <div class="col-lg-6 col-xl-6 col-md-12 col-12 mt--30">
                        <div class="content-block content-direction-column post-horizontal thumb-border-rounded is-active">
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Law / Computing">Law / Computing</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="title"><a href="">The Future of Artificial Intelligence in Legal Practice</a></h4>
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">
                                        <img src="assets/images/post-images/author/author-image-2.png" alt="Author Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="author.html">
                                                <span class="hover-flip-item">
                                                    <span data-text="Dr Chathura Warnasuriya">Dr Chathura Warnasuriya</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>2 min read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-thumbnail">
                                <a href="">
                                    <img src="assets/images/post-images/post-images-1.jpg" alt="Post Images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Post  -->

                    <!-- Start Single Post  -->
                    <div class="col-lg-6 col-xl-6 col-md-12 col-12 mt--30">
                        <div class="content-block content-direction-column post-horizontal thumb-border-rounded axil-control">
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Business">Business</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="title"><a href="">Business Analytics Innovations</a></h4>
                                <div class="post-meta">
                                    <div class="post-author-avatar border-rounded">
                                        <img src="assets/images/post-images/author/author-image-1.png" alt="Author Images">
                                    </div>
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="">
                                                <span class="hover-flip-item">
                                                    <span data-text="Vithara Mannage">Vithara Mannage</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>4 min read</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="post-thumbnail">
                                <a href="">
                                    <img src="assets/images/post-images/post-images-2.jpg" alt="Post Images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Post  -->
                </div>
            </div>
        </div>



        <!-- Start Trending Post Area  -->
        <div class="axil-trending-post-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">News & Events</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Axil Tab Button  -->
                        <ul class="axil-tab-button nav nav-tabs mt--20" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="trend-one" data-bs-toggle="tab" href="#trendone"
                                   role="tab" aria-controls="trend-one" aria-selected="true">Computing
                                    School</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="trend-two" data-bs-toggle="tab" href="#trendtwo"
                                   role="tab" aria-controls="trend-two" aria-selected="false">Law School</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="trend-three" data-bs-toggle="tab" href="#trendthree"
                                   role="tab" aria-controls="trend-three" aria-selected="false">Business
                                    School</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="trend-four" data-bs-toggle="tab" href="#trendfour"
                                   role="tab" aria-controls="trend-four" aria-selected="false">Kandy Campus</a>
                            </li>
                        </ul>
                        <!-- End Axil Tab Button  -->

                        <!-- Start Axil Tab Content  -->
                        <div class="tab-content">

                            <!-- Single Tab Content  -->
                            <div class="row trend-tab-content tab-pane fade show active" id="trendone"
                                 role="tabpanel" aria-labelledby="trend-one">
                                <div class="col-lg-8">
                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">01</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Commencement">Commencement</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a>School of
                                                        computing 27th batch inauguration</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Innovate.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list is-active">
                                        <div class="post-inner">
                                            <span class="post-order-list">02</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Connect">Connect</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a>Networking
                                                        Event Fosters Collaboration in Computing Community</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Connect.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">03</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" >
                                                            <span class="hover-flip-item">
                                                                <span data-text="Explore">Explore</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a>Computing
                                                        School's Latest Research Initiatives Unveiled

                                                    </a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper" >
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/Explore.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">04</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Inspire">Inspire</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a >Igniting
                                                        Passion: Inspiring Talks at Computing School's Motivational
                                                        Symposium
                                                    </a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper" >
                                                                    <span class="hover-flip-item">

                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Inspire.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->
                                </div>
                            </div>
                            <!-- Single Tab Content  -->

                            <!-- Single Tab Content  -->
                            <div class="row trend-tab-content tab-pane fade" id="trendtwo" role="tabpanel"
                                 aria-labelledby="trend-two">
                                <div class="col-lg-8">

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">01</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Justice">Justice</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a>Law School
                                                        Empowers Future Legal Leaders Globally</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Justice.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control is-active">
                                        <div class="post-inner">
                                            <span class="post-order-list">02</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Advocate">Advocate</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a> Law School's
                                                        Impactful Initiatives Transforming Tomorrow's Advocates</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Advocate.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">03</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Ethics">Ethics</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a>Law School
                                                        Nurtures Leaders in Legal Integrity</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Ethics.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">04</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Litigate">Litigate</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a>Law School’s
                                                        Dynamic Programs Shape Future Legal Experts</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Litigate.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                </div>
                            </div>
                            <!-- Single Tab Content  -->

                            <!-- Single Tab Content  -->
                            <div class="row trend-tab-content tab-pane fade" id="trendthree" role="tabpanel"
                                 aria-labelledby="trend-two">
                                <div class="col-lg-8">

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">01</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" >
                                                            <span class="hover-flip-item">
                                                                <span data-text="Strategize">Strategize</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a>Business School
                                                        Inspires Leaders in Global Innovation</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Strategize.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control is-active">
                                        <div class="post-inner">
                                            <span class="post-order-list">02</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" >
                                                            <span class="hover-flip-item">
                                                                <span
                                                                    data-text="Entrepreneurship

                                                                ">Entrepreneurship</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a >Business
                                                        School's Incubator Sparks Start-up Revolution Worldwide.</a>
                                                </h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper">
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/Entrepreneurship.jpg"
                                                     alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">03</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" >
                                                            <span class="hover-flip-item">
                                                                <span data-text="Leadership">Leadership</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a >Business School
                                                        Molds Visionaries for Global Success.</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper" >
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/Leadership.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">04</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" >
                                                            <span class="hover-flip-item">
                                                                <span data-text="Innovate">Innovate</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a>Business
                                                        School
                                                        Drives Transformative Solutions for Future Industries.




                                                    </a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper"
                                                                  >
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/Innovate2.jpg"
                                                     alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                </div>
                            </div>
                            <!-- Single Tab Content  -->

                            <!-- Single Tab Content  -->
                            <div class="row trend-tab-content tab-pane fade" id="trendfour" role="tabpanel"
                                 aria-labelledby="trend-two">
                                <div class="col-lg-8">

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">01</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" >
                                                            <span class="hover-flip-item">
                                                                <span data-text="Unity">Unity</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a >An Event
                                                        Uniting Communities in Harmony and Understanding.</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper"
                                                                   >
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/Unity.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control is-active">
                                        <div class="post-inner">
                                            <span class="post-order-list">02</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Harmony">Harmony</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a >A Spectacle
                                                        of Unity, Diversity, and Shared Humanity.</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper"
                                                                   >
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/Harmony.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">03</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" >
                                                            <span class="hover-flip-item">
                                                                <span data-text="Inspire">Inspire</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a >An Event
                                                        Inspiring Minds, Creativity, and Positive Change.</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper"
                                                                   >
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/Inspire3.jpg" alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block trend-post post-order-list axil-control">
                                        <div class="post-inner">
                                            <span class="post-order-list">04</span>
                                            <div class="post-content">
                                                <div class="post-cat">
                                                    <div class="post-cat-list">
                                                        <a class="hover-flip-item-wrapper" >
                                                            <span class="hover-flip-item">
                                                                <span data-text="Celebrate">Celebrate</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h3 class="title"><a >A Joyous
                                                        Celebration of Cultures, Ideas, and Togetherness.</a></h3>
                                                <div class="post-meta-wrapper">
                                                    <div class="post-meta">
                                                        <div class="content">
                                                            <h6 class="post-author-name">
                                                                <a class="hover-flip-item-wrapper"
                                                                   >
                                                                    <span class="hover-flip-item">
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <ul class="post-meta-list">

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/Celebrate.jpg"
                                                     alt="Post Images">
                                            </a>
                                        </div>
                                    </div>
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
        <!-- End Trending Post Area  -->





        <div class="axil-post-grid-area axil-section-gap bg-color-grey">
            <div class="container">
                <div class="row axil-section-gapBottom">
                    <div class="col-lg-12">
                        <div class="axil-social-wrapper bg-color-white radius">
                            <ul class="social-with-text" style="justify-content: space-around;">
                                <li class="twitter"><a href="https://x.com/APIITsl?s=20"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                                </li>
                                <li class="facebook"><a href="https://www.facebook.com/APIITofficial?mibextid=kFxxJD"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                                <li class="instagram"><a href="https://www.instagram.com/apiitsl?igsh=cjI0aHczMmthaDR2"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
                                <li class="youtube"><a href="https://youtube.com/@APIITedu?si=asVIXIdV5i59rdDF"><i class="fab fa-youtube"></i><span>Youtube</span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Most Popular Articles</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">

                        <!-- Start Tab Content  -->
                        <div class="grid-tab-content tab-content mt--10">

                            <!-- Start Single Tab Content  -->
                            <div class="single-post-grid tab-pane fade show active" id="gridone" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-7 col-md-12 col-12">
                                        <!-- Start Post Grid  -->
                                        <div class="content-block post-grid post-grid-large mt--30">
                                            <div class="post-thumbnail">
                                                <a>
                                                    <img src="assets/images/post-images/post-grid-01.jpg" alt="Post Images">
                                                </a>
                                            </div>
                                            <div class="post-grid-content">
                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="APIIT">APIIT</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h3 class="title"><a >Stories of Campus Graduates</a></h3>
                                                    <div class="post-meta-wrapper">
                                                        <div class="post-meta">
                                                            <div class="post-author-avatar border-rounded">
                                                                <img src="assets/images/post-images/author/author-image-2.png" alt="Author Images">
                                                            </div>
                                                            <div class="content">
                                                                <h6 class="post-author-name">
                                                                    <a class="hover-flip-item-wrapper" >
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Ismat Jahan">Ismat
                                                                                Jahan</span>
                                                                        </span>
                                                                    </a>
                                                                </h6>
                                                                <ul class="post-meta-list">
                                                                    <li>Feb 17, 2024</li>
                                                                    <li>2 min read</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Post Grid  -->
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                <!-- Start Post Grid  -->
                                                <div class="content-block post-grid mt--30">
                                                    <div class="post-thumbnail">
                                                        <a >
                                                            <img src="assets/images/post-images/post-grid-07.jpg" alt="Post Images">
                                                        </a>
                                                    </div>
                                                    <div class="post-grid-content">
                                                        <div class="post-content">
                                                            <div class="post-cat">
                                                                <div class="post-cat-list">
                                                                    <a class="hover-flip-item-wrapper" >
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Alumni Perspectives">Alumni Perspectives</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <h4 class="title"><a >Insights from Campus Graduates in Computing, Law, and Business</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start Post Grid  -->
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                <!-- Start Post Grid  -->
                                                <div class="content-block post-grid mt--30">
                                                    <div class="post-thumbnail">
                                                        <a >
                                                            <img src="assets/images/post-images/post-grid-08.jpg" alt="Post Images">
                                                        </a>
                                                    </div>
                                                    <div class="post-grid-content">
                                                        <div class="post-content">
                                                            <div class="post-cat">
                                                                <div class="post-cat-list">
                                                                    <a class="hover-flip-item-wrapper" >
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="Journey">Journey</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <h4 class="title"><a >Triumphs and Trials of Recent Campus Graduates' Journey</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start Post Grid  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab Content  -->


                        </div>
                        <!-- End Tab Content  -->
                    </div>
                </div>
            </div>
        </div>


        <!-- Start Post List Wrapper  -->
        <div class="axil-post-list-area post-listview-visible-color axil-section-gap bg-color-white">
            <div class="container">
                <div class="row" style="margin-bottom: 40px; margin-top: -50px;">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Recent Articles</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-xl-8">


                        @foreach($popularPosts as $popularPost)

                            @if ($popularPost->getAttribute('approved') == 1 && $popularPost->getAttribute('published_at') <= now())
                                @if ($popularPost->image == null)
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
                                                <a href="{{ route('post.show', $popularPost->slug) }}">{{$popularPost->title}}</a></h4>


                                            <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                                                <ul>
                                                    @foreach ($popularPost->categories as $category)
                                                        <li class="cat-item">
                                                            <a class="inner" style="width: fit-content; background-color: #4CAC; color: white; padding-left: 15px; padding-right: 15px;">
                                                                <div class="content">
                                                                    <h5 class="title" style="color: white; font-weight: 600; font-size: 16px">{{$category->title}}</h5>
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
                                                            <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span data-text="{{$popularPost->author->name}}">{{$popularPost->author->name}}</span>
                                                </span>
                                                            </a>
                                                        </h6>
                                                        <ul class="post-meta-list">
                                                            <li>{{$popularPost->published_at->diffForHumans()}}</li>
                                                            <li>{{{$popularPost->getReadingTime()}}} min read</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                @else

                                    <div class="content-block post-list-view mt--30">
                                        <div class="post-thumbnail">
                                            <a href="{{ route('post.show', $popularPost->slug) }}">
                                                <img src="{{$popularPost->getThumbnailImage()}}" alt="Post Images">
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
                                            <h4 class="title" style="font-size: 24px; font-weight: bold;"><a href="{{ route('post.show', $popularPost->slug) }}">{{$popularPost->title}}</a></h4>

                                            <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                                                <ul>
                                                    @foreach ($popularPost->categories as $category)
                                                        <li class="cat-item">
                                                            <a class="inner" style="width: fit-content; background-color: #4CAC; color: white; padding-left: 15px; padding-right: 15px;">
                                                                <div class="content">
                                                                    <h5 class="title" style="color: white; font-weight: 600; font-size: 16px">{{$category->title}}</h5>
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
                                                            <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span data-text="{{$popularPost->author->name}}">{{$popularPost->author->name}}</span>
                                                </span>
                                                            </a>
                                                        </h6>
                                                        <ul class="post-meta-list">
                                                            <li>{{$popularPost->published_at->diffForHumans()}}</li>
                                                            <li>{{{$popularPost->getReadingTime()}}} min read</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                            @endif

                        @endforeach




                    </div>

                    <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                        <!-- Start Sidebar Area  -->
                        <div class="sidebar-inner">

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_categories mb--30">
                                <ul>
                                    @foreach ($categories as $category)

                                        @if ($category->posts->count() > 0)
                                            <li class="cat-item">
                                                <a href="/blog" class="inner" style="justify-content: center">

                                                    <div class="content">
                                                        <h5 class="title">{{$category->title}} ({{$category->posts->count()}})</h5>
                                                    </div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_search mb--30">
                                <h5 class="widget-title">Search</h5>
                                <a href="/blog">
                                    <form action="#">
                                        <div class="axil-search form-group">
                                            <button type="submit" class="search-button"><i
                                                    class="fal fa-search"></i></button>
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                    </form>
                                </a>
                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title">Alumni Spotlights</h5>
                                <!-- Start Post List  -->
                                <div class="post-medium-block">

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a>
                                                <img src="assets/images/post-images/alumni-spotlight1.jpg"
                                                     alt="Post Images">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a>The Story behind a Successful Tech Innovator</a></h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>Jun 21, 2022</li>
                                                    <li>4 min read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/alumni-spotlight2.jpg"
                                                     alt="Post Images">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a>Road to Becoming a Renowned Business Visionary</a>
                                            </h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>Dec 15, 2020</li>
                                                    <li>3 min read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                    <!-- Start Single Post  -->
                                    <div class="content-block post-medium mb--20">
                                        <div class="post-thumbnail">
                                            <a >
                                                <img src="assets/images/post-images/alumni-spotlight3.jpg"
                                                     alt="Post Images">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h6 class="title"><a>How a Developer Managed To Run a Multi-Million Business</a></h6>
                                            <div class="post-meta">
                                                <ul class="post-meta-list">
                                                    <li>May 06, 2020</li>
                                                    <li>2 min read</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Post  -->

                                </div>
                                <!-- End Post List  -->

                            </div>
                            <!-- End Single Widget  -->

                            <!-- Start Single Widget  -->
                            <div class="axil-single-widget widget widget_postlist mb--30">
                                <h5 class="widget-title">Oldest Articles</h5>
                                <!-- Start Post List  -->
                                <div class="post-medium-block">

                                    @foreach ($oldestPosts as $oldestPost)
                                        <!-- Start Single Post  -->
                                        <div class="content-block post-medium mb--20">
                                            <div class="post-thumbnail">
                                                <a href="/blog/{{$oldestPost->slug}}">
                                                    @if ($oldestPost->image == null)
                                                        <img src="assets/images/logo/no-image.jpg"
                                                             alt="Post Images">
                                                    @else
                                                    <img src="{{$oldestPost->getThumbnailImage()}}"
                                                         alt="Post Images">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <h6 class="title"><a href="/blog/{{$oldestPost->slug}}">{{$oldestPost->title}}</a></h6>
                                                <div class="post-meta">
                                                    <ul class="post-meta-list">
                                                        <li>{{$oldestPost->published_at->diffForHumans()}}</li>
                                                        <li>{{$oldestPost->getReadingTime()}} min read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Post  -->
                                    @endforeach

                                </div>
                                <!-- End Post List  -->

                            </div>
                            <!-- End Single Widget  -->

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

                            <!-- Start Single Widget  -->

                            <!-- End Single Widget  -->
                        </div>
                        <!-- End Sidebar Area  -->

                    </div>
                </div>
            </div>
        </div>



        <div class="axil-video-post-area axil-section-gap bg-color-black">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2 class="title">Featured Videos</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-12 col-md-6 col-12">
                        <!-- Start Post List  -->
                        <div class="content-block post-default image-rounded mt--30">
                            <div class="post-thumbnail">
                                <a href=https://fb.watch/qJAVPlt1Jj/">
                                    <img src="assets/images/post-images/ds.jpg" alt="Post Images">
                                </a>
                                <a class="video-popup position-top-center" href="https://fb.watch/qJAVPlt1Jj/"><span
                                        class="play-icon"></span></a>
                            </div>
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper">
                                            <span class="hover-flip-item">
                                                <span data-text="GRADUATION ">GRADUATION </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <h3 class="title"><a href=https://fb.watch/qJAVPlt1Jj/">Celebrating Achievements,
                                        Embracing Futures Unfolded.</a></h3>
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper">
                                                    <span class="hover-flip-item">

                                                    </span>
                                                </a>
                                            </h6>
                                            <ul class="post-meta-list">

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Post List  -->
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-md-6 col-12">
                        <div class="row">
                            <!-- Start Post List  -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="content-block post-default image-rounded mt--30">
                                    <div class="post-thumbnail">
                                        <a href="https://www.facebook.com/APIITofficial/videos/269887455558352">
                                            <img src="assets/images/post-images/asd.jpg" alt="Post Images">
                                        </a>
                                        <a class="video-popup size-medium position-top-center"
                                           href="https://www.facebook.com/APIITofficial/videos/269887455558352"><span class="play-icon"></span></a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper" >
                                                    <span class="hover-flip-item">
                                                        <span data-text="FACILITIES">FACILITIES</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h5 class="title"><a
                                                href="https://www.facebook.com/APIITofficial/videos/269887455558352">Cutting-Edge
                                                Facilities Enriching the University Experience. </a></h5>
                                    </div>
                                </div>
                            </div>
                            <!-- End Post List  -->

                            <!-- Start Post List  -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="content-block post-default  image-rounded mt--30">
                                    <div class="post-thumbnail">
                                        <a >
                                            <img src="assets/images/post-images/gsdfg.jpg" alt="Post Images">
                                        </a>
                                        <a class="video-popup size-medium position-top-center"
                                           ><span class="play-icon"></span></a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper">
                                                    <span class="hover-flip-item">
                                                        <span data-text="LEADERSHIP">LEADERSHIP</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h5 class="title"><a > Nurturing Leaders
                                                through Visionary Guidance.</a></h5>
                                    </div>
                                </div>
                            </div>
                            <!-- End Post List  -->

                            <!-- Start Post List  -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="content-block post-default image-rounded mt--30">
                                    <div class="post-thumbnail">
                                        <a >
                                            <img src="assets/images/post-images/sdgs.jpg" alt="Post Images">
                                        </a>
                                        <a class="video-popup size-medium position-top-center"
                                           ><span class="play-icon"></span></a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper">
                                                    <span class="hover-flip-item">
                                                        <span data-text="Prize Giving Ceremony">Prize Giving
                                                            Ceremony</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h5 class="title"><a > Honoring
                                                Achievements at the Prestigious Awards Ceremony.</a></h5>
                                    </div>
                                </div>
                            </div>
                            <!-- End Post List  -->

                            <!-- Start Post List  -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="content-block post-default image-rounded mt--30">
                                    <div class="post-thumbnail">
                                        <a >
                                            <img src="assets/images/post-images/asdfs.jpg" alt="Post Images">
                                        </a>
                                        <a class="video-popup size-medium position-top-center"
                                           ><span class="play-icon"></span></a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper" >
                                                    <span class="hover-flip-item">
                                                        <span data-text="COLLABORATION">COLLABORATION</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h5 class="title"><a >The Best Tool That Helps
                                                Remote Teams
                                                Collaborate Better.</a></h5>
                                    </div>
                                </div>
                            </div>
                            <!-- End Post List  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
