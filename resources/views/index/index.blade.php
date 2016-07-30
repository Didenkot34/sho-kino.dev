@extends('layouts.app')

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
                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    <h1 class="premiere">{{mb_strtoupper(Lang::get('title.premiere'))}}</h1>
                    <p class="lead">{{Lang::get('title.premiereDescription')}} </p>

                    <div class="center-slider">
                        @each('trailer.trailersSlider', $premiers, 'trailer')
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    <h1 class="premiere">{{ mb_strtoupper(Lang::get('title.films'))}}</h1>

                    <p class="lead">{{Lang::get('title.filmsDescription')}} </p>

                    <div class="center-slider" >
                        @each('trailer.trailersSlider', $trailers, 'trailer')
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    <h1 class="premiere">{{mb_strtoupper(Lang::get('title.actors'))}}</h1>

                    <p class="lead">{{Lang::get('title.actorsDescription')}}</p>

                    <div class="row">
                        @each('actor.list', $actors, 'actor')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
