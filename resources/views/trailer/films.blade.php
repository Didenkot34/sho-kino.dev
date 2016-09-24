@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 box-shadow-jumbotron">
                <!-- Page Header -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="dropdown btn-group">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"
                                    data-hover="dropdown">
                                {{Lang::get('navbar.genre')}}
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
                                Год @if($selectedYear !== 'all')<span class="premiere">{{$selectedYear}}</span> @endif
                                <span
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
                                Страна @if($selectedCountry !== 'all')<span
                                        class="premiere">{{$nameOfCountry}}</span> @endif
                                <span
                                        class="caret"></span>
                            </button>
                            <div class="dropdown-menu ">
                                <div class="row">
                                    <div class="col-xs-7 col-xs-offset-3">
                                        @if($selectedCountry == 'all' ) <i class="fa fa-check" aria-hidden="true"
                                                                           style="color: #00C0B5"></i>@endif
                                        <a href="{{route('filters', ['genre_'.$selectedGenre,'year_'.$selectedYear,'country_all'])}}"
                                           @if($selectedCountry == 'all') style="color: #00C0B5" @endif> Любая
                                            страна </a>
                                    </div>
                                    @foreach($countries as $country)
                                        <div class="col-xs-7 col-xs-offset-3">
                                            @if($selectedCountry == $country->slug ) <i class="fa fa-check"
                                                                                        aria-hidden="true"
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
                @if(count($trailers))
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header premiere">
                            <small>Фильмы</small>
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
                    @include('trailer.trailersLists', ['trailers' => $trailers])
                    @include('trailer.trailersListsModal', ['trailers' => $trailers])
                @else
                    <h1 class="text-center premiere">{{Lang::get('title.usersChoiceEmpty')}}</h1>

                @endif
            </div>
            @if(!count($trailers))
                @include('trailer.editorsChoiceLists', ['editorsChoice' => $editorsChoice])
            @endif
        </div>
    </div>
@stop