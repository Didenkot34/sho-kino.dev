@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    <h1 class="premiere">{{Lang::get('title.premiere')}}</h1>
                    <p class="lead"> {{Lang::get('title.premiereDescription')}}</p>

                    <div class="slider4" data-slick='{"slidesToShow": 4, "slidesToScroll":1}'>
                        @each('trailer.trailersSlider', $premiers, 'trailer')
                    </div>
                </div>
            </div>
    </div>
@stop
