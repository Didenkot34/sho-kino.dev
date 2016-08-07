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
    </div>
    <div class="row">
        <div class='col-md-12'>
            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators">
                    @foreach($comments as $key => $comment)
                        <li data-target="#quote-carousel" data-slide-to="{{$key}}"
                            @if($key === 0) class="active" @endif>  </li>
                    @endforeach
                </ol>

                <!-- Carousel Slides / Quotes -->
                <div class="carousel-inner">

                    <!-- Quotes -->
                    @foreach($comments as $key => $comment)
                        <div class="item @if($key === 0) active @endif">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-3 text-center">
                                        <img class="img-circle" src="@if($comment->avatar){{$comment->avatar}}@else /profile.png @endif"
                                             style="width: 100px;height:100px;">
                                    </div>
                                    <div class="col-sm-9">
                                        <p>{{$comment->comment}}</p>
                                        <small>{{$comment->name}}</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                @endforeach
                <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i
                                class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i
                                class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>