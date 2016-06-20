@extends('layouts.app')

@section('content')
    <div class="container box-shadow-jumbotron">
        @include('trailer.trailersLists', ['trailers' => $data['trailers']])
        @include('trailer.trailersListsModal', ['trailers' => $data['trailers']])
    </div>

    <div class="container box-shadow-jumbotron">
        @include('actor.list', ['actors' => $data['actors']])
    </div>
@stop