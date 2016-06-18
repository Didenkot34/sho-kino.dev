<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="span4 well" style="padding-bottom:0">
                <form accept-charset="UTF-8" action="" method="POST" class="form-group">
                                        <textarea class="span4" id="new_message" name="new_message" style="width: 99%"
                                                  placeholder="Type in your message" rows="5">
                                        </textarea>
                    <h6 class="pull-right">320 characters remaining</h6>
                    <button class="btn btn-info"
                            @if (Auth::guest())
                            data-toggle="modal" data-target="#signUp" type="button"
                            @else
                            type='submit'
                            @endif
                    >
                        Post New Message
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @if (Auth::guest()) @include('auth.popup.authorization') @endif
        @foreach($comments as $comment)
            <div class="col-md-12">
                <blockquote class="quote-box">
                    <p class="quotation-mark">
                        “
                    </p>
                    <p class="quote-text">
                        {!! $comment->comment !!}
                    </p>
                    <hr>
                    <div class="blog-post-actions">
                        <p class="blog-post-bottom pull-left">
                            Abraham Lincoln
                        </p>
                        {{--<p class="blog-post-bottom pull-right">--}}
                        {{--<span class="badge quote-badge">896</span> <i class="fa fa-heart-o"></i>--}}
                        {{--</p>--}}
                    </div>
                </blockquote>
            </div>
        @endforeach
    </div>
</div>
