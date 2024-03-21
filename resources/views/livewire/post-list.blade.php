
<div class="col-lg-8 col-xl-8">

    <div style="margin-bottom: 15px; font-weight:bold;">

        @if ($this->activeCategory || $search)
            <button style="width: 50px; border: none; color:rgb(92, 92, 92);" wire:click="clearFilters()">x</button>
        @endif
        @if ($this->activeCategory)
            All Posts From : "{{$this->activeCategory->title}}"
        @endif
        @if ($search)
            Containing : "{{$search}}"
        @endif




    </div>


{{--    <div class="axil-single-widget widget widget_categories mb--30">--}}
{{--        <ul>--}}
{{--            <li class="cat-item" style="padding-left: 50px;padding-right: 50px;">--}}
{{--                <a class="inner" href="?sort=desc" style="justify-content: center">--}}
{{--                    <div class="content">--}}
{{--                        --}}{{-- if the current url is equal to ?sort=desc, then add the style to the h5 tag --}}
{{--                        <h5 class="title" style="{{request()->get('sort') == 'desc' ? 'color: #41bcb8' : ''}}">Latest</h5>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="cat-item" style="padding-left: 50px;padding-right: 50px;">--}}
{{--                <a class="inner" href="?sort=asc" style="justify-content: center">--}}
{{--                    <div class="content" >--}}
{{--                        <h5 class="title" style="{{request()->get('sort') == 'asc' ? 'color: #41bcb8' : ''}}">Oldest</h5>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}

    @foreach ($this->posts as $post)
        @if ($post->image == null)
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
                        <a href="{{ route('post.show', $post->slug) }}">{{$post->title}}</a></h4>


                    <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                        <ul>
                            @foreach ($post->categories as $category)
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
                                                <span data-text="{{$post->author->name}}">{{$post->author->name}}</span>
                                            </span>
                                    </a>
                                </h6>
                                <ul class="post-meta-list">
                                    <li>{{$post->published_at->diffForHumans()}}</li>
                                    <li>{{{$post->getReadingTime()}}} min read</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else

            <div class="content-block post-list-view mt--30">
                <div class="post-thumbnail">
                    <a href="{{ route('post.show', $post->slug) }}">
                        <img src="{{$post->getThumbnailImage()}}" alt="Post Images">
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
                    <h4 class="title" style="font-size: 24px; font-weight: bold;"><a href="{{ route('post.show', $post->slug) }}">{{$post->title}}</a></h4>

                    <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                        <ul>
                            @foreach ($post->categories as $category)
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
                                                <span data-text="{{$post->author->name}}">{{$post->author->name}}</span>
                                            </span>
                                    </a>
                                </h6>
                                <ul class="post-meta-list">
                                    <li>{{$post->published_at->diffForHumans()}}</li>
                                    <li>{{{$post->getReadingTime()}}} min read</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <div class="my-3" id="pagination">
        {{$this->posts->onEachSide(1)->links()}}
    </div>



</div>

