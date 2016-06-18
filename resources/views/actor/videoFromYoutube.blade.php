<!-- Biography VIDEO From Youtube-->
<div class="container box-shadow-jumbotron">
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="premiere">Видео благодаря которым он стал популярен
                <small>Secondary Text</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        @foreach($videosFromYoutube as $video)
            <div class="col-md-4 portfolio-item">
                <div class="premiere-jumbotron">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$video->video_link}}"
                                allowfullscreen></iframe>
                    </div>

                    <p>{!!$video->title!!}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!--END Biography VIDEO From Youtube-->