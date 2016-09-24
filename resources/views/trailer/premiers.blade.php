@extends('layouts.app')
@section('meta-tag')
    {!! $metaTags !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                @include('titleForBox' , [
                            'title' => Lang::get('title.premiere'),
                            'titleDescription' => Lang::get('title.premiereDescription')
                            ])
                <div class="slider4" data-slick='{"slidesToShow": 4, "slidesToScroll":1}'>
                    @each('trailer.trailersSlider', $premiers, 'trailer')
                </div>
            </div>
        </div>
    </div>
@stop
