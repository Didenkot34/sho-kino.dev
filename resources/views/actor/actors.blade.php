@extends('layouts.app')
@section('meta-tag')
    {!! $metaTags !!}
@stop
@section('content')
    <div class="container-fluid">
        <!-- Actors -->
        <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
            @include('titleForBox' , [
                          'title' => mb_strtoupper(Lang::get('title.actors')),
                          'titleDescription' => Lang::get('title.actorsDescription')
                          ])
            <div class="row">
                @each('actor.list', $actors, 'actor')
            </div>
            {{ $actors->links() }}
        </div>
    </div>
@stop
