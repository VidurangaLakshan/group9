<div>
    <!-- Start Comment Form Area  -->
    <div class="axil-comment-area">


        <!-- Start Comment Respond  -->
        <div class="comment-respond">
            <h4 class="title">Discussions</h4>
            @auth
                @if (auth()->user()->post_comments == 1)
                    <form wire:submit.prevent="postComment">
                        <p class="comment-notes"><span id="email-notes" style="color: gray">Note:- Please refrain from using abusive or hurtful language in the comments section.</span>
                        </p>
                        <div class="row row--10">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Leave a Comment</label>
                                    <textarea wire:model="comment" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-submit cerchio">
                                    <input name="submit" type="submit" id="submit" class="axil-button button-rounded"
                                           value="Post Comment">
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-danger" role="alert">
                        You are not allowed to post comments. Please enable it in your profile settings.
                    </div>
                @endif
            @else
                <a href="{{ route('login') }}" id="comment-error" style="font-size: medium; font-weight: 500;">Login to
                    Comment</a>

                <style>
                    #comment-error:hover {
                        text-decoration: underline;
                    }
                </style>

            @endauth
        </div>
        <!-- End Comment Respond  -->

        <!-- Start Comment Area  -->
        <div class="axil-comment-area">

            @auth
                @if (auth()->user()->display_comments == 1)
                    <h4 class="title">{{ count($this->comments) }} comments</h4>
                    <ul class="comment-list">
                        <!-- Start Single Comment  -->
                        @forelse($this->comments as $comment)
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="single-comment">
                                        <div class="comment-img">
                                            <img src="{{ $comment->user->profile_photo_url }}" style="height:64px;"
                                                 alt="Author Images">
                                        </div>
                                        <div class="comment-inner">
                                            <h6 class="commenter">
                                                <a class="hover-flip-item-wrapper">
                                                                <span class="hover-flip-item">
                                                                    <span
                                                                        data-text="{{ $comment->user->name }}">{{ $comment->user->name }}</span>
                                                                </span>
                                                </a>
                                            </h6>
                                            <div class="comment-meta">
                                                <div
                                                    class="time-spent">
                                                    @if ($comment->updated_at != null)
                                                        {{ $comment->updated_at->diffForHumans() }}
                                                    @else
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    @endif
                                                </div>
                                                <div class="reply-edit">
                                                    <div class="reply">
                                                        @auth
                                                            @if (auth()->user()->id == $comment->user_id)

                                                                @php

                                                                    $panel = '';

                                                                    if (auth()->user()->role->value == 1) {
                                                                        $panel = 'admin';
                                                                    } elseif (auth()->user()->role->value == 2){
                                                                        $panel = 'editor';
                                                                    } elseif (auth()->user()->role->value == 4){
                                                                        $panel = 'career';
                                                                    } elseif (auth()->user()->role->value == 5){
                                                                        $panel = 'academic';
                                                                    } elseif (auth()->user()->role->value == 6){
                                                                        $panel = 'nonacademcis';
                                                                    } elseif (auth()->user()->role->value == 7){
                                                                        $panel = 'user';
                                                                    } elseif (auth()->user()->role->value == 8){
                                                                        $panel = 'alumni';
                                                                    }

                                                                @endphp


                                                                <a class="comment-reply-link hover-flip-item-wrapper"
                                                                   href="/{{$panel}}/comments/{{$comment->id}}/edit">
                                                                                <span class="hover-flip-item">
                                                                                    <span
                                                                                        data-text="Manage">Manage</span>
                                                                                </span>
                                                                </a>
                                                            @else
                                                            @endif
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p class="b2">{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div style="">
                                <span>No Comments Posted</span>
                            </div>

                        @endforelse
                        <!-- End Single Comment  -->
                    </ul>
                @else
                    <div class="alert alert-danger" role="alert">
                        You are not allowed to view comments. Please enable it in your profile settings.
                    </div>
                @endif
            @endauth
        </div>
        <!-- End Comment Area  -->

    </div>
    <!-- End Comment Form Area  -->

</div>
