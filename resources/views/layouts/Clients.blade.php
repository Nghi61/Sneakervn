<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <title>@yield('title')</title>

    <!-- BASE CSS -->
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home_1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body>

    <div id="page">
        @include('block.Clients.header')
        <!-- /header -->
        @yield('noidung')
        <!-- /main -->

        @include('block.Clients.footer')
        <!--/footer-->
    </div>
    <!-- page -->
    <div id="toTop"></div><!-- Back to top button -->
    <!-- COMMON SCRIPTS -->
    @yield('js')
    <script src="{{ asset('js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('js/carousel-home.js') }}"></script>
    <script src="https://kit.fontawesome.com/d7f51baa37.js" crossorigin="anonymous"></script>
</body>

</html>
