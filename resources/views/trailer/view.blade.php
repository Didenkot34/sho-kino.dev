@extends('layouts.app')

@section('content')

<!-- Page Content -->
    <!-- Title in Box-->
     @include('titleInBox' , ['title' => $trailer->title ])
    <!-- /.row -->

    <!-- Portfolio Item Row -->
   <div class="container-fluid">
       <div class="row">

           <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
               @include('trailer.trailerInfo', ['trailer' => $trailer])
           </div>

           <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
               @include('titleForBox' , [
               'title' => Lang::get('title.whatWatch'),
               'titleDescription' => Lang::get('title.noveltyAndBlockbaster')
               ])
               <div class="center-slider">
                   @each('trailer.trailersSlider', $activeTrailers, 'trailer')
               </div>
           </div>

           <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
               @include('titleForBox' , [
               'title' => Lang::get('title.editorsChoice'),
               'titleDescription' => Lang::get('title.editorsChoiceDescription')
               ])
               <div class="slider4" data-slick='{"slidesToShow": 3, "slidesToScroll":3}'>
                   @each('trailer.trailersSlider', $editorsChoice, 'trailer')
               </div>
           </div>

       </div>
   </div>
    <!-- /.row -->
<!-- /.container -->
@endsection
