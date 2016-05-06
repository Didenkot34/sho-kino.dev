@extends('layouts.app')

@section('content')

        <!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{!!$trailer->title!!}</h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">
        <div class="col-md-12  box-shadow-jumbotron">
            @include('trailer.trailerInfo', ['trailer' => $trailer])
        </div>

        <div class="col-md-12 box-shadow-jumbotron">
            <h1 class="premiere">Что еще посмотреть?</h1>

            <p class="lead">Новинки мирового кинопроката и блокбастеры</p>

            <div class="center-slider">
                @include('trailer.premiere', ['trailers' => $activeTrailers])
            </div>
        </div>
        <div class="col-md-12 box-shadow-jumbotron">
            <h1 class="premiere"> Выбор Редакции</h1>

            <p class="lead">Новинки мирового кинопроката и блокбастеры</p>

            <div class="slider4" data-slick='{"slidesToShow": 3, "slidesToScroll":3}'>
                @include('trailer.editorsChoice', ['editorsChoice' => $editorsChoice])
            </div>
        </div>
    </div>
    <!-- /.row -->
    <hr>
</div>
<!-- /.container -->
@endsection
