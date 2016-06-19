@include('layouts.header')
<body id="app-layout">
@include('layouts.navbar')

@yield('content')

{{--Scroll Top Button--}}
@include('layouts.scrollTop')
{{--END Scroll Top Button--}}
<!-- Footer -->
@include('layouts.footer')
<!-- JavaScripts -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
<script src="/assets/js/jquery-2.2.3.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/slick/slick.min.js"></script>
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/bootstrap-dropdownhover.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
