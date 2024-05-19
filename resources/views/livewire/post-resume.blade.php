<div>
    <!-- Start Comment Form Area  -->
    <div class="axil-comment-area">


        <!-- Start Comment Respond  -->
        <div class="comment-respond">
            <h4 class="title">Apply For This Position</h4>

            <?php
            if (auth()->user()->role->value == 1) {
                $role = 'admin';
            } elseif (auth()->user()->role->value == 7) {
                $role = 'user';
            } elseif (auth()->user()->role->value == 4) {
                $role = 'alumniLiaison';
            }
            ?>

            @php
                $resume = \App\Models\Resume::where('user_id', auth()->id())
                                            ->where('job_id', $job->id);
            @endphp

            {{--            @if($resume->count() == 0)--}}

            {{--                <form action="/{{$role}}/resumes/create" target="_blank">--}}
            {{--                    <p class="comment-notes"><span id="email-notes" style="color: gray">Note:- Include Your Name, Contact No. and Email.</span>--}}
            {{--                    </p>--}}
            {{--                    <div class="row row--10">--}}
            {{--                        <div class="col-12">--}}
            {{--                            <div class="form-group">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-lg-12">--}}
            {{--                            <div class="form-submit cerchio">--}}
            {{--                                <input name="submit" type="submit" id="submit" class="axil-button button-rounded"--}}
            {{--                                        value="Upload CV">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </form>--}}

            {{--            @else--}}

            {{--                <form action="/{{$role}}/resumes/{{$job->id}}/edit" target="_blank">--}}
            {{--                    <p class="comment-notes"><span id="email-notes" style="color: gray">Note:- Include Your Name, Contact No. and Email.</span>--}}
            {{--                    </p>--}}
            {{--                    <div class="row row--10">--}}
            {{--                        <div class="col-12">--}}
            {{--                            <div class="form-group">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-lg-12">--}}
            {{--                            <div class="form-submit cerchio">--}}
            {{--                                <input name="submit" type="submit" id="submit" class="axil-button button-rounded"--}}
            {{--                                       value="Re-Upload CV">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            @endif--}}

            <form action="mailto:{{$job->author->email}}">
            <div class="row row--10">
                <div class="col-12">
                    <div class="form-group">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-submit cerchio">
                        <input name="submit" type="submit" id="submit" class="axil-button button-rounded"
                               value="Email CV">
                    </div>
                </div>
            </div>
            </form>
        </div>

        <!-- End Comment Respond  -->
    </div>
    <!-- End Comment Form Area  -->

</div>
