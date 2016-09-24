@extends('layouts.app')
@section('meta-tag')
    {!! $metaTags !!}
@stop
@section('content')
    @include('titleInBox', ['title' => $title])
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                @include('trailer.trailersLists', ['trailers' => $data['trailers']])
                @include('trailer.trailersListsModal', ['trailers' => $data['trailers']])
            </div>

            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
              <div class="row">
                  @each('actor.list', $data['actors'], 'actor')
              </div>
            </div>
        </div>
    </div>
@stop