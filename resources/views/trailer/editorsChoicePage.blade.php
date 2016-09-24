@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('trailer.editorsChoiceLists', ['editorsChoice' => $editorsChoice])
        </div>
    </div>
@stop
