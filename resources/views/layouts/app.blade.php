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
    @include('layouts.script')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</div>

</body>
</html>
