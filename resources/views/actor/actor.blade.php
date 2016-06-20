@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Title in Box-->
        @include('titleInBox' , ['title' => $actor->name ])
        <!-- /.row -->

        <!-- Biography-->
    @include('actor.biography', ['actor' => $actor])
    <!--END Biography-->

        <!-- Biography VIDEO From Youtube-->
    @include('actor.videoFromYoutube' , ['videosFromYoutube' => $actor->youtube()->get()])
    <!--END Biography VIDEO From Youtube-->

        <!-- Trailers with this actors-->
       @include('actor.trailers' , ['trailers' => $actor->trailers()->get()])
        <!-- Trailers with this actors-->
    </div>
    <!-- /.container -->
@endsection

