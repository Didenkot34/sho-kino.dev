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
                    <h1 class="premiere">PREMIERE</h1>
                    <p class="lead"> Пародии на Новинки мирового кинопроката и блокбастеры</p>

                    <div class="center-slider">
                        @each('trailer.trailersSlider', $premiers, 'trailer')
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    <h1 class="premiere">FILMS</h1>

                    <p class="lead">Только лучшие пародии</p>

                    <div class="center-slider" >
                        @each('trailer.trailersSlider', $trailers, 'trailer')
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                    <h1 class="premiere">Actors</h1>

                    <p class="lead">Только лучшие актеры</p>

                    <div class="row">
                        @each('actor.list', $actors, 'actor')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
