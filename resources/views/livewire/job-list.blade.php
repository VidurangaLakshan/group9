<div class="col-lg-8 col-xl-8">

    <div style="margin-bottom: 15px; font-weight:bold;">
        @if ($search)
            <a href="/job" style="color:rgb(92, 92, 92);">x</a>
        @endif

        @if ($search)
            Searching for : "{{$search}}"
        @endif


    </div>

    @if ($this->jobs->isEmpty())
        <div class="content-block post-list-view format-quote mt--30">
            <div class="post-content">
                <h4 class="title" style="font-size: 24px; font-weight: bold">No jobs found</h4>
            </div>
        </div>
    @endif

    @foreach ($this->jobs as $job)

        @if ($job->author->role->value == 4 && (auth()->user()->role->value == 1 ||  auth()->user()->role->value == 4 || (auth()->user()->role->value == 7 && (auth()->user()->degree_level == 6 || auth()->user()->degree_level == 7 || auth()->user()->role->value == 8 && auth()->user()->degree_level == 9 && auth()->user()->degree_level == 10))))

            @if ($job->faculty == 'Computing' && auth()->user()->interest_computing == 1)
                @if ($job->getAttribute('approved') == 1)
                    <div class="content-block post-list-view format-quote mt--30">
                        @if ($job->image != null)
                            <div class="post-thumbnail">
                                @if ($job->image == null)
                                    <a href="{{ route('job.show', $job->slug) }}">
                                        <img src="{{asset('/assets/images/logo/no-image.jpg')}}" alt="Post Images">
                                    </a>
                                @else
                                    <a href="{{ route('job.show', $job->slug) }}">
                                        <img src="{{$job->getThumbnailImage()}}" alt="Post Images">
                                    </a>
                                @endif
                            </div>
                        @endif
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
                                <a href="{{ route('job.show', $job->slug) }}">{{$job->name}}</a></h4>


                            <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                                <ul>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->faculty}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->company}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
                                            <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$job->author->name}}">{{$job->author->name}}</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{$job->updated_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

            @if ($job->faculty == 'Business' && auth()->user()->interest_business == 1)
                @if ($job->getAttribute('approved') == 1)
                    <div class="content-block post-list-view format-quote mt--30">
                        @if ($job->image != null)
                            <div class="post-thumbnail">
                                @if ($job->image == null)
                                    <a href="{{ route('job.show', $job->slug) }}">
                                        <img src="{{asset('/assets/images/logo/no-image.jpg')}}" alt="Post Images">
                                    </a>
                                @else
                                    <a href="{{ route('job.show', $job->slug) }}">
                                        <img src="{{$job->getThumbnailImage()}}" alt="Post Images">
                                    </a>
                                @endif
                            </div>
                        @endif
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
                                <a href="{{ route('job.show', $job->slug) }}">{{$job->name}}</a></h4>


                            <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                                <ul>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->faculty}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->company}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
                                            <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$job->author->name}}">{{$job->author->name}}</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{$job->updated_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

            @if ($job->faculty == 'Law' && auth()->user()->interest_law == 1)
                @if ($job->getAttribute('approved') == 1)
                    <div class="content-block post-list-view format-quote mt--30">
                        @if ($job->image != null)
                            <div class="post-thumbnail">
                                @if ($job->image == null)
                                    <a href="{{ route('job.show', $job->slug) }}">
                                        <img src="{{asset('/assets/images/logo/no-image.jpg')}}" alt="Post Images">
                                    </a>
                                @else
                                    <a href="{{ route('job.show', $job->slug) }}">
                                        <img src="{{$job->getThumbnailImage()}}" alt="Post Images">
                                    </a>
                                @endif
                            </div>
                        @endif
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
                                <a href="{{ route('job.show', $job->slug) }}">{{$job->name}}</a></h4>


                            <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                                <ul>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->faculty}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->company}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
                                            <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$job->author->name}}">{{$job->author->name}}</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{$job->updated_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

        @endif

        @if ($job->author->role->value == 8 || $job->author->role->value == 1)

            @if ($job->faculty == 'Computing' && auth()->user()->interest_computing == 1)
                @if ($job->getAttribute('approved') == 1)
                    <div class="content-block post-list-view format-quote mt--30">
                        <div class="post-thumbnail">
                            @if ($job->image == null)
                                <a href="{{ route('job.show', $job->slug) }}">
                                    <img src="{{asset('/assets/images/logo/no-image.jpg')}}" alt="Post Images">
                                </a>
                            @else
                                <a href="{{ route('job.show', $job->slug) }}">
                                    <img src="{{$job->getThumbnailImage()}}" alt="Post Images">
                                </a>
                            @endif
                        </div>
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
                                <a href="{{ route('job.show', $job->slug) }}">{{$job->name}}</a></h4>


                            <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                                <ul>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->faculty}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->company}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
                                            <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$job->author->name}}">{{$job->author->name}}</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{$job->updated_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

            @if ($job->faculty == 'Law' && auth()->user()->interest_law == 1)
                @if ($job->getAttribute('approved') == 1)
                    <div class="content-block post-list-view format-quote mt--30">
                        <div class="post-thumbnail">
                            @if ($job->image == null)
                                <a href="{{ route('job.show', $job->slug) }}">
                                    <img src="{{asset('/assets/images/logo/no-image.jpg')}}" alt="Post Images">
                                </a>
                            @else
                                <a href="{{ route('job.show', $job->slug) }}">
                                    <img src="{{$job->getThumbnailImage()}}" alt="Post Images">
                                </a>
                            @endif
                        </div>
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
                                <a href="{{ route('job.show', $job->slug) }}">{{$job->name}}</a></h4>


                            <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                                <ul>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->faculty}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->company}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
                                            <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$job->author->name}}">{{$job->author->name}}</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{$job->updated_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

            @if ($job->faculty == 'Business' && auth()->user()->interest_business == 1)
                @if ($job->getAttribute('approved') == 1)
                    <div class="content-block post-list-view format-quote mt--30">
                        <div class="post-thumbnail">
                            @if ($job->image == null)
                                <a href="{{ route('job.show', $job->slug) }}">
                                    <img src="{{asset('/assets/images/logo/no-image.jpg')}}" alt="Post Images">
                                </a>
                            @else
                                <a href="{{ route('job.show', $job->slug) }}">
                                    <img src="{{$job->getThumbnailImage()}}" alt="Post Images">
                                </a>
                            @endif
                        </div>
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
                                <a href="{{ route('job.show', $job->slug) }}">{{$job->name}}</a></h4>


                            <div class="axil-single-widget widget widget_categories mb--30" style="margin-top: 40px;">
                                <ul>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->faculty}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="cat-item">
                                        <a class="inner"
                                           style="width: fit-content; background-color: #04B4AC; color: white; padding-left: 15px; padding-right: 15px;">
                                            <div class="content">
                                                <h5 class="title"
                                                    style="color: white; font-weight: 600; font-size: 16px">{{$job->company}}</h5>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
                                            <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$job->author->name}}">{{$job->author->name}}</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>{{$job->updated_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

        @endif

    @endforeach

    <div class="my-3" id="pagination">
        {{$this->jobs->onEachSide(1)->links()}}
    </div>

</div>

