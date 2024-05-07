<div class="col-lg-8 col-xl-8">

    @if ($this->events->isEmpty())
        <div class="content-block post-list-view format-quote mt--30">
            <div class="post-content">
                <h4 class="title" style="font-size: 24px; font-weight: bold">No events found</h4>
            </div>
        </div>
    @endif

    @foreach ($this->events as $event)

        @if ($event->getAttribute('status') == 1)

            <div class="content-block post-list-view mt--30">
                <div class="post-thumbnail">
                    <a href="{{ route('event.show', $event->slug) }}">
                        <img src="{{$event->getThumbnailImage()}}" alt="Post Images">
                    </a>
                </div>
                <div class="post-content">
                    <div class="post-cat">
                        <div class="post-cat-list">
                            <a class="hover-flip-item-wrapper">
                                {{-- <span class="hover-flip-item">
                                    <span data-text="{{$event->categories()->first()->getAttributes('title')}}">{{$event->categories()->first()->getAttributes('title')}}</span>
                                </span> --}}
                            </a>
                        </div>
                    </div>
                    <h4 class="title" style="font-size: 24px; font-weight: bold;"><a
                            href="{{ route('event.show', $event->slug) }}">{{$event->title}}</a></h4>


                    <div class="post-meta-wrapper">
                        <div class="post-meta">
                            <div class="content">
                                <h6 class="post-author-name" style="font-size: 16px; font-weight: 500">
                                    <a class="hover-flip-item-wrapper">
                                                <span class="hover-flip-item">
                                                    <span
                                                        data-text="{{$event->author->name}}">{{$event->author->name}}</span>
                                                </span>
                                    </a>
                                </h6>
                                <ul class="post-meta-list">
                                    <li>{{{$event->getReadingTime()}}} min read</li>
                                </ul>
                            </div>
                        </div>
                        <ul class="social-share-transparent justify-content-end">
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <div class="my-3" id="pagination">
        {{$this->events->onEachSide(1)->links()}}
    </div>


</div>

