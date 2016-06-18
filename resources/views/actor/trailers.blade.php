<!-- Trailers with this actors-->
<div class="container box-shadow-jumbotron">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="premiere">Трейлеры с его участием
                <small>Secondary Text</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        @foreach($trailers as $trailer)
            <div class="col-md-4 portfolio-item">
                <div class="box-shadow-jumbotron">
                    <h3>
                        <p data-toggle="modal"
                           data-target="#trailer_id{{$trailer->id}}">{!!$trailer->title!!}</p>
                    </h3>
                    <img class="img img-responsive img-thumbnail"
                         src="/uploads/trailers/originals/carousel/{!! $trailer->carousel_image !!}"
                         data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Trailers with this actors-->
<hr>
@foreach($trailers as $trailer)
    <!-- Modal -->
    <div id="trailer_id{{$trailer->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">{!! $trailer->title !!}</h4>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$trailer->video_link}}" allowfullscreen
                                draggable="true"></iframe>
                    </div>
                    <p>{!!$trailer->description!!}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{url('view/' . $trailer->slug)}}">
                        <button type="button" class="btn btn-info">На страницу трейлера</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endforeach
