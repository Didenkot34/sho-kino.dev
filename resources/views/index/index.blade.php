@extends('layouts.app')
@section('meta-tag')
    {!! $metaTags !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="container-fluid container-padding">
            <!-- Wrapper for slides -->
            <div class="fade-slider">
                @each('trailer.indexCarousel', $premiers, 'trailer')
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- Premier -->
                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    @include('titleForBox' , [
                                  'title' => mb_strtoupper(Lang::get('title.premiere')),
                                  'titleDescription' => Lang::get('title.premiereDescription')
                                  ])
                    <div class="center-slider">
                        @each('trailer.trailersSlider', $premiers, 'trailer')
                    </div>
                </div>
                <!-- All Films -->
                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    @include('titleForBox' , [
                                  'title' => mb_strtoupper(Lang::get('title.films')),
                                  'titleDescription' => Lang::get('title.filmsDescription')
                                  ])
                    <div class="center-slider">
                        @each('trailer.trailersSlider', $trailers, 'trailer')
                    </div>
                </div>
                <!-- Actors -->
                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    @include('titleForBox' , [
                                  'title' => mb_strtoupper(Lang::get('title.actors')),
                                  'titleDescription' => Lang::get('title.actorsDescription')
                                  ])
                    <div class="row">
                        @each('actor.list', $actors, 'actor')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
