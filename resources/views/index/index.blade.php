@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container container-padding">
            <!-- Indicators -->

            <!-- Wrapper for slides -->
            <div class="fade-slider">
                @foreach($trailers as $trailer)
                    <div>
                        <a href="{{url('view/' . $trailer->slug)}}">
                            <img class="img img-responsive "
                                 src="/uploads/trailers/originals/carousel/{!! $trailer->carousel_image !!}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 premiere-jumbotron">
                    <h1 class="premiere">PREMIERE</h1>

                    <p class="lead">Новинки мирового кинопроката и блокбастеры</p>

                    <div class="center-slider">
                        @foreach($trailers as $trailer)
                            <div class="col-md-2">
                                <a href="{{url('view/' . $trailer->slug)}}">
                                    <img class="img img-responsive img-thumbnail"
                                         src="/uploads/trailers/poster/{!! $trailer->poster !!}"
                                         data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">
                                </a>

                                <p>{!!$trailer->title!!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1 premiere-jumbotron">
                    <h1 class="premiere">FILMS</h1>

                    <p class="lead">Новинки мирового кинопроката и блокбастеры</p>

                    <div class="slider4" data-slick='{"slidesToShow": 3, "slidesToScroll":3}'>
                        @foreach($trailers as $trailer)
                            <div class="col-md-2">
                                <a href="{{url('view/' . $trailer->slug)}}">
                                    <img class="img img-responsive img-thumbnail"
                                         src="/uploads/trailers/poster/{!! $trailer->poster !!}"
                                         data-toggle="modal" data-target="#trailer_id{{$trailer->id}}
                                            ">
                                </a>

                                <p>{!!$trailer->title!!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
