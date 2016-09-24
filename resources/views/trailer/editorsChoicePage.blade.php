@extends('layouts.app')
@section('meta-tag')
    {!! $metaTags !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('trailer.editorsChoiceLists', ['editorsChoice' => $editorsChoice])
        </div>
    </div>
@stop
