<div class="col-lg-8 col-xl-8">

    @if ($this->events->isEmpty())
        <div class="content-block post-list-view format-quote mt--30">
            <div class="post-content">
                <h4 class="title" style="font-size: 24px; font-weight: bold">No events found</h4>
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
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$category->title}}</h5>
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
                                        <a class="hover-flip-item-wrapper" href="{{ route('post.author', $post->user_id) }}">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$post->author->name}}">{{$post->author->name}}</span>
                                                </span>
                                        </a>
                                    </h6>
                                    <ul class="post-meta-list">
                                        <li>{{$post->published_at->diffForHumans()}}</li>
                                        <li>{{{$post->getReadingTime()}}} min read</li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="social-share-transparent justify-content-end">
                                <livewire:like-button :key="$post->id" :$post/>
                            </ul>
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
                        <h4 class="title" style="font-size: 24px; font-weight: bold;"><a
                                href="{{ route('post.show', $post->slug) }}">{{$post->title}}</a></h4>

                        <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                            <ul>
                                @foreach ($post->categories as $category)
                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$category->title}}</h5>
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
                                        <a class="hover-flip-item-wrapper" href="{{ route('post.author', $post->user_id) }}">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$post->author->name}}">{{$post->author->name}}</span>
                                                </span>
                                        </a>
                                    </h6>
                                    <ul class="post-meta-list">
                                        <li>{{$post->published_at->diffForHumans()}}</li>
                                        <li>{{{$post->getReadingTime()}}} min read</li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="social-share-transparent justify-content-end">
                                <livewire:like-button :key="$post->id" :$post/>
                            </ul>
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

