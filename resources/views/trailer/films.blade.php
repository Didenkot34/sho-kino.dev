@extends('layouts.app')

@section('content')
    <div class="container box-shadow-jumbotron">
        <!-- Page Header -->
        <div class="row">
            <div class="col-md-5">
                <div class="dropdown btn-group">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"
                            data-hover="dropdown">
                        Жанр
                        @if($selectedGenre !== 'all' )
                            <span class="premiere">{{mb_strtoupper($nameOfGenre)}}</span>
                        @endif
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu ">
                        <div class="row">
                            <div class="col-xs-7 col-xs-offset-3">
                                @if($selectedGenre === 'all' )
                                    <i class="fa fa-check" aria-hidden="true" style="color: #00C0B5"></i>
                                @endif
                                <a href="{{route('filters', ['genre_all', 'year_' . $selectedYear,'country_'. $selectedCountry])}}"
                                   @if($selectedGenre === 'all' ) style="color: #00C0B5" @endif>
                                    Любой жанр
                                </a>
                            </div>
                            @foreach($genres as $genre)
                                <div class="col-xs-7 col-xs-offset-3">
                                    @if($selectedGenre === $genre->slug )
                                        <i class="fa fa-check" aria-hidden="true" style="color: #00C0B5"></i>
                                    @endif
                                    <a href="{{route('filters', ['genre_' . $genre->slug, 'year_' . $selectedYear,'country_'. $selectedCountry])}}"
                                       @if($selectedGenre === $genre->slug ) style="color: #00C0B5"
                                            @endif>
                                        {{$genre->name}}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="dropdown btn-group">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"
                            data-hover="dropdown">
                        Год @if($selectedYear !== 'all')<span class="premiere">{{$selectedYear}}</span> @endif <span
                                class="caret"></span>
                    </button>
                    <div class="dropdown-menu ">
                        <div class="row">
                            <div class="col-xs-7 col-xs-offset-3">
                                @if($selectedYear == 'all' ) <i class="fa fa-check" aria-hidden="true"
                                                                style="color: #00C0B5"></i>@endif
                                <a href="{{route('filters', ['genre_'.$selectedGenre,'year_all','country_'. $selectedCountry])}}"
                                   @if($selectedYear == 'all') style="color: #00C0B5" @endif> Любой год </a>
                            </div>
                            @foreach($allTrailerYears as $year)
                                <div class="col-xs-7 col-xs-offset-3">
                                    @if($selectedYear == $year ) <i class="fa fa-check" aria-hidden="true"
                                                                    style="color: #00C0B5"></i>@endif
                                    <a href="{{route('filters', ['genre_'.$selectedGenre,'year_' . $year,'country_'. $selectedCountry])}}"
                                       @if($selectedYear == $year) style="color: #00C0B5" @endif>  {{$year}} </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="dropdown btn-group">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"
                            data-hover="dropdown">
                        Страна @if($selectedCountry !== 'all')<span class="premiere">{{$nameOfCountry}}</span> @endif <span
                                class="caret"></span>
                    </button>
                    <div class="dropdown-menu ">
                        <div class="row">
                            <div class="col-xs-7 col-xs-offset-3">
                                @if($selectedCountry == 'all' ) <i class="fa fa-check" aria-hidden="true"
                                                                style="color: #00C0B5"></i>@endif
                                <a href="{{route('filters', ['genre_'.$selectedGenre,'year_'.$selectedYear,'country_all'])}}"
                                   @if($selectedCountry == 'all') style="color: #00C0B5" @endif> Любая страна </a>
                            </div>
                            @foreach($countries as $country)
                                <div class="col-xs-7 col-xs-offset-3">
                                    @if($selectedCountry == $country->slug ) <i class="fa fa-check" aria-hidden="true"
                                                                    style="color: #00C0B5"></i>@endif
                                    <a href="{{route('filters', ['genre_'.$selectedGenre,'year_' . $selectedYear,'country_'. $country->slug])}}"
                                       @if($selectedCountry == $country->slug) style="color: #00C0B5" @endif>  {{$country->name}} </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header premiere">
                    <small>Популярные фильмы</small>
                    @if($selectedYear !== 'all' )  {{$selectedYear}} года @endif
                    @if($nameOfGenre)
                        <small> в жанре</small>
                        "{{mb_strtoupper($nameOfGenre)}}"
                    @endif
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            @foreach($trailers as $trailer)
                <div class="col-md-4 portfolio-item">
                    <div class="box-shadow-jumbotron">
                        <h3>
                            <p data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">{!!$trailer->title!!}</p>
                        </h3>
                        <img class="img img-responsive img-thumbnail"
                             src="/uploads/trailers/originals/carousel/{!! $trailer->carousel_image !!}"
                             data-toggle="modal" data-target="#trailer_id{{$trailer->id}}">
                    </div>
                </div>
            @endforeach
        </div>

        @foreach($trailers as $trailer)
                <!-- Modal -->
        <div id="trailer_id{{$trailer->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">{!! $trailer->title !!}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{$trailer->video_link}}" allowfullscreen
                                    draggable="true"></iframe>
                        </div>
                        <p>{!!$trailer->description!!}</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{url('/view/' . $trailer->slug)}}">
                            <button type="button" class="btn btn-info">На страницу трейлера</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
@stop