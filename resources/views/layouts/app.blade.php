@include('layouts.header')
<body id="app-layout">
<div class="container-fluid">

    @include('layouts.navbar')
    <div class="container-fluid">
        @yield('content')
    </div>
    {{--Scroll Top Button--}}
    @include('layouts.scrollTop')
    {{--END Scroll Top Button--}}
<!-- Footer -->
    @include('layouts.footer')
    @include('layouts.search')
    @include('auth.popup.authorization')
<!-- JavaScripts -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
    <script src="/assets/js/jquery-2.2.3.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/slick/slick.min.js"></script>
    <script src="/assets/js/app.min.js"></script>
    <script src="/assets/js/bootstrap-dropdownhover.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</div>

</body>
</html>
