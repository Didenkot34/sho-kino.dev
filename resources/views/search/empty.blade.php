@extends('layouts.app')

@section('content')
    @include('titleInBox', ['title' => 'Поиск по запросу: "' . $search . '"  не дал результатов.<br>
    Уточните поиск или выберите что посмотреть из наших рекомендаций: '])
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                <h1 class="premiere"> Выбор Редакции</h1>

                <p class="lead">Новинки мирового кинопроката и блокбастеры</p>

                <div class="slider4" data-slick='{"slidesToShow": 3, "slidesToScroll":3}'>
                    @each('trailer.trailersSlider', $editorsChoice, 'trailer')
                </div>
            </div>
        </div>
    </div>
@stop