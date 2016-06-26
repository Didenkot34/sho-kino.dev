{{--<nav class="navbar navbar-default navbar-static-top" id="top">--}}
{{--<div class="container">--}}
{{--<div class="navbar-header">--}}

{{--<!-- Collapsed Hamburger -->--}}
{{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
{{--data-target="#app-navbar-collapse">--}}
{{--<span class="sr-only">Toggle Navigation</span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}

{{--<!-- Branding Image -->--}}
{{--<a class="navbar-brand " href="{{ url('/') }}">--}}
{{--<i class="fa fa-video-camera premiere" aria-hidden="true"></i>--}}
{{--<span class="premiere text-uppercase">sho-kinopoisk</span>--}}
{{--</a>--}}
{{--</div>--}}

{{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
{{--<!-- Left Side Of Navbar -->--}}
{{--<ul class="nav navbar-nav">--}}
{{--<li><a href="{{ url('/home') }}">Home</a></li>--}}
{{--</ul>--}}

{{--<!-- Right Side Of Navbar -->--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<!-- Authentication Links -->--}}
{{--@if (Auth::guest())--}}
{{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
{{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
{{--@else--}}
{{--<li class="dropdown">--}}
{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
{{--{{ Auth::user()->name }} <span class="caret"></span>--}}
{{--</a>--}}

{{--<ul class="dropdown-menu" role="menu">--}}
{{--<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>--}}
{{--<li><a href="{{ url('/admin/users') }}"><i class="fa fa-btn fa-lock  "></i>Admin</a></li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <i class="fa fa-video-camera premiere" aria-hidden="true"></i>
                <span class="premiere text-uppercase">sho-kinopoisk</span>
            </a>
        </div>


        <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Collection <span
                                class="glyphicon glyphicon-chevron-down pull-right"></span></a>

                    <ul class="dropdown-menu mega-dropdown-menu row">
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Выбор редакции</li>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">

                                        <div class="item active">
                                            <a href="#"><img
                                                        src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection"
                                                        class="img-responsive" alt="product 1"></a>
                                            <h4>
                                                <small>Summer dress floral prints</small>
                                            </h4>
                                            <button class="btn btn-primary" type="button">49,99 €</button>
                                            <button href="#" class="btn btn-default" type="button"><span
                                                        class="glyphicon glyphicon-heart"></span> Add to Wishlist
                                            </button>
                                        </div><!-- End Item -->
                                        @foreach($menu['editorsChoice'] as $trailer)
                                            <div class="item ">
                                                <a href="/view/{{$trailer->slug}}"><img
                                                            class="img img-responsive img-thumbnail"
                                                            src="/uploads/trailers/originals/carousel/{!! $trailer->carousel_image !!}"</a>
                                                <h4>
                                                    <small>{!!$trailer->title!!}</small>
                                                </h4>
                                                <button class="btn btn-primary" type="button">49,99 €</button>
                                                <button href="#" class="btn btn-default" type="button"><span
                                                            class="glyphicon glyphicon-heart"></span> Add to Wishlist
                                                </button>
                                            </div><!-- End Item -->
                                        @endforeach
                                    </div><!-- End Carousel Inner -->
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="#">View all Collection <span
                                                class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Жанр</li>
                                @foreach($menu['genres'] as $genre)
                                    <li><a href="/films/genre_{{$genre->slug}}/year_all/country_all">{{$genre->name}}</a></li>
                                @endforeach
                                <li class="divider"></li>
                                {{--<li class="dropdown-header">Tops</li>--}}
                                {{--<li><a href="#">Good Typography</a></li>--}}
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Страна</li>
                                @foreach($menu['countries'] as $country)
                                    <li><a href="/films/genre_all/year_all/country_{{$country->slug}}">{{$country->name}}</a></li>
                                @endforeach
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Год</li>
                                @foreach($menu['years'] as $year)
                                    <li><a href="/films/genre_all/year_{{$year}}/country_all">{{$year}}</a></li>
                                @endforeach
                                <li class="divider"></li>
                                <li class="dropdown-header">Newsletter</li>
                                <form class="form" role="form">
                                    <div class="form-group">
                                        <label class="sr-only" for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </form>
                            </ul>
                        </li>
                    </ul>

                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#search">
                        <i class="fa fa-search "></i>
                    </a>
                </li>
            </ul>

        </div><!-- /.nav-collapse -->
    </nav>
</div>
