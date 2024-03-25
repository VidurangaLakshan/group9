
<x-site-layout>


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
                                               class="inner" style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                                <div class="content">
                                                    <h5 class="title"
                                                        style="font-size: 18px; font-weight: bold;">{{$category->title}}
                                                        ({{($category->posts->where('approved', true)->where('published_at', '<=', now())->count())}})</h5>


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
                                        <a href="{{ route('post.index', ['role' => '1','3','4']) }}"
                                           class="inner" style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
                                            <div class="content">

                                                @if(request()->get('role') == '1' || request()->get('role') == '3' || request()->get('role') == '4')
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
                                        <a href="{{ route('post.index', ['role' => '5']) }}"
                                           class="inner" style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
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
                                           class="inner" style="justify-content: center; background: #ffffff; justify-content: center; background: #ffffff; border: lightgray 1px solid; padding: 8px 0px; border-radius: 50px;}">
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
                            <h5 class="widget-title" style="color: black; font-size: 18px; font-weight: bold;">Stay In
                                Touch</h5>
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
    <!-- End Post List Wrapper  -->
    </div>
</div>



</x-site-layout>





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
