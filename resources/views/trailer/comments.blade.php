<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="span4 well" style="padding-bottom:0">
                <div id="error-comment" class="alert alert-danger hidden"></div>
                <div id="success-comment" class="alert alert-success hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                    </button>
                    <span class="glyphicon glyphicon-ok"></span>
                    {!!Lang::get('title.comments.successComment')!!}
                </div>
                <form id="form-comment" accept-charset="UTF-8" action="" method="POST" class="form-group">
                    {!! csrf_field() !!}
                    <input type="hidden" name="trailer_id" value="{{$trailerId}}">
                    <textarea id="comment" name="comment" autofocus rows="5" wrap="soft" maxlength="520"></textarea>
                    <h6 class="pull-right">520 characters remaining</h6>
                    <button id="comment-submit" class="btn btn-info"
                            @if (Auth::guest())
                            data-toggle="modal" data-target="#signUp" type="button"
                            @else
                            type='submit'
                            @endif
                    >
                        {!!Lang::get('title.comments.submitButton')!!}
                    </button>
                </form>
            </div>
        </div>
        <div class='col-md-12'>
            @foreach($comments as $key => $comment)
                <blockquote class="user-comment">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img class="img-circle"
                                 src="@if($comment->avatar){{$comment->avatar}}@else /profile.png @endif">
                        </div>
                        <div class="col-md-9">
                            <p>{{$comment->comment}}</p>
                            <small>{{$comment->name}}</small>
                        </div>
                    </div>
                </blockquote>
            @endforeach
        </div>
    </div>
</div>