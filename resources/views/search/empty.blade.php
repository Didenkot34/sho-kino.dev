@extends('layouts.app')

@section('content')
    @include('titleInBox', ['title' => Lang::get('title.notFoundSearch',['search' => $search])])
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                <h1 class="premiere"> {{Lang::get('title.editorsChoice')}}</h1>

                <p class="lead">{{Lang::get('title.editorsChoiceDescription')}}</p>

                <div class="slider4" data-slick='{"slidesToShow": 3, "slidesToScroll":3}'>
                    @each('trailer.trailersSlider', $editorsChoice, 'trailer')
                </div>
            </div>
        </div>
    </div>
@stop