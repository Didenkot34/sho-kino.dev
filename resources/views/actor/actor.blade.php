@extends('layouts.app')

@section('content')

        <!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{!!$actor->name!!}</h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Biography-->
    <div class="container premiere-jumbotron">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <img class="img img-responsive img-thumbnail trailer-img-max-height"
                         src="/uploads/actors/avatarks/originals/{!! $actor->avatarka !!}">
                </div>
                <div class="col-md-8">
                    <table class="table table-responsive table-no-border">
                        <tr>
                            <td><h4>День Рождения : </h4></td>
                            <td>
                                <h4 class="premiere"> {{$actor->birthday}}
                                </h4>
                            </td>
                        </tr>
                        <tr>
                            <td><h4>Возраст: </h4></td>
                            <td>
                                <h4 class="premiere">
                                    {{date('Y-m-d') - $actor->birthday }}
                                </h4>
                            </td>
                        </tr>
                        <tr>
                            <td><h4>Знак Зодиака: </h4></td>
                            <td>
                                <h4>
                                    <a href="#" class="premiere text-capitalize"> </a>
                                </h4>
                            </td>
                        </tr>
                        <tr>
                            <td><h4>Страна: </h4></td>
                            <td>
                                <h4>
                                </h4>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-mb-12">
                            <h3 class="premiere text-center ">Биография</h3>
                        </div>
                        <div class="col-mb-12">
                            {!!$actor->biography!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Biography-->

    <!-- Biography VIDEO From Youtube-->
    <div class="container premiere-jumbotron">
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
            @foreach($actor->youtube()->get() as $videoYoutube)
                <div class="col-md-4 portfolio-item">
                   <div class="premiere-jumbotron">
                       <div class="embed-responsive embed-responsive-16by9">
                           <iframe class="embed-responsive-item" src="{{$videoYoutube->video_link}}"
                                   allowfullscreen></iframe>
                       </div>

                       <p>{!!$videoYoutube->title!!}</p>
                   </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--END Biography VIDEO From Youtube-->
    <!-- Trailers with this actors-->
    <div class="container premiere-jumbotron">

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
            @foreach($actor->trailers()->get() as $trailer)
                <div class="col-md-4 portfolio-item">
                    <div class="premiere-jumbotron">
                        <h3>
                            <p data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">{!!$trailer->title!!}</p>
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
    @foreach($actor->trailers()->get()as $trailer)
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
</div>
<!-- /.container -->
@endsection

