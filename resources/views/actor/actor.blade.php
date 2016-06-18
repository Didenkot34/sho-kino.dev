@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">{!!$actor->name!!}</h1>
            </div>
        </div>
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

