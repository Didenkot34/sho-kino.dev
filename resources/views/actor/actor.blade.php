@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <!-- Title in Box-->
    @include('titleInBox' , ['title' => $actor->name ])
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                @include('actor.biography', ['actor' => $actor])
            </div>

            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                @include('actor.videoFromYoutube' , ['videosFromYoutube' => $actor->youtube()->get(), 'actorName' => $actor->name, 'actorSex' => $actor->sex])
            </div>
            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                @include('actor.trailers' , ['trailers' => $actor->trailers()->get(), 'actorName' => $actor->name, 'actorSex' => $actor->sex])
            </div>
        </div>
    </div>
@endsection

