@extends('layouts.app')

@section('content')

    @include('trailer.trailersLists', ['trailers' => $trailers])

@stop