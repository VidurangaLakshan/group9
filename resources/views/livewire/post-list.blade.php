
<div class="col-lg-8 col-xl-8">

    <div style="margin-bottom: 15px; font-weight:bold;">
        @if ($this->activeCategory || $search || request()->get('role') == '1' || request()->get('role') == '3' || request()->get('role') == '4' || request()->get('role') == '5' || request()->get('role') == '6')
{{--            <button style="width: 50px; border: none; color:rgb(92, 92, 92);" wire:click="clearFilters()">x</button>--}}
            <a href="/blog?role" style="color:rgb(92, 92, 92);">x</a>
        @endif
        @if ($this->activeCategory)
            All Posts From : "{{$this->activeCategory->title}}"
        @endif

        @if((request()->get('role') == '4'))
            In : "Academics"
        @endif

        @if(request()->get('role') == '3')
            In : "Student Support Services"
        @endif

        @if(request()->get('role') == '5')
            In : "Students"
        @endif

        @if(request()->get('role') == '6')
            In : "Alumni"
        @endif


        @if ($search)
            Containing : "{{$search}}"
        @endif




    </div>

{{--    {{dd($this->posts)}}--}}

    {{--    {{dd($this->posts[0]->author->name)}}--}}

    @if ($this->posts->isEmpty())
        <div class="content-block post-list-view format-quote mt--30">
            <div class="post-content">
                <h4 class="title" style="font-size: 24px; font-weight: bold">No posts found</h4>
            </div>
        </div>
    @endif

    @foreach ($this->posts as $post)

        @if ($post->getAttribute('approved') == 1 && $post->getAttribute('published_at') <= now())
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
                                        <a class="inner" style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
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
                                        <a class="inner" style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
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
        @endif
    @endforeach

    <div class="my-3" id="pagination">
        {{$this->posts->onEachSide(1)->links()}}
    </div>



</div>

