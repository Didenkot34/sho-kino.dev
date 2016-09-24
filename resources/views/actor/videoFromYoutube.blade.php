<!-- Biography VIDEO From Youtube-->
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="premiere"> @if($actorSex == 'м'){!! Lang::get('actor.videosFromYoutube',['sex' =>'стал популярен','actorName' => $actorName]) !!} @else
                {!! Lang::get('actor.videosFromYoutube',['sex' =>'стала популярной','actorName' => $actorName]) !!}  @endif
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    @foreach($videosFromYoutube as $video)
        <div class="@if(count($videosFromYoutube) === 1)col-md-12
        @elseif(count($videosFromYoutube) === 2) col-md-6
        @elseif(count($videosFromYoutube) > 2) col-md-4
        @endif portfolio-item">
            <div class="box-shadow-jumbotron">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{$video->video_link}}"
                            allowfullscreen></iframe>
                </div>

                {{--<p>{!!$video->title!!}</p>--}}
            </div>
        </div>
    @endforeach
</div>

<!--END Biography VIDEO From Youtube-->