@extends('layouts.app')
@section('meta-tag')
    {!! $metaTags !!}
@stop
@section('content')

<!-- Page Content -->
    <!-- Title in Box-->
     @include('titleInBox' , ['title' => $trailer->title ])
    <!-- /.row -->

    <!-- Portfolio Item Row -->
   <div class="container-fluid">
       <div class="row">
           <!-- Trailers info -->
           <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
               @include('trailer.trailerInfo', ['trailer' => $trailer])
           </div>
           <!-- Similar films -->
           <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
               @include('titleForBox' , [
               'title' => Lang::get('title.similarFilms'),
               'titleDescription' => Lang::get('title.similarFilmsDescription')
               ])
               <div class="center-slider">
                   @each('trailer.trailersSlider', $activeTrailers, 'trailer')
               </div>
           </div>

           @include('trailer.editorsChoiceLists', ['editorsChoice' => $editorsChoice])

       </div>
   </div>
    <!-- /.row -->
<!-- /.container -->
@endsection
