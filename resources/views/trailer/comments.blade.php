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
        <div class="col-md-12">
            {{--@include('trailer.commentsModal', ['trailerId' => $trailer->id])--}}
            @if (Auth::guest()) @include('auth.popup.authorization') @endif
            @foreach($comments as $comment)
                <blockquote>
                    {!! $comment->comment !!}
                </blockquote>
            @endforeach
        </div>
    </div>
</div>