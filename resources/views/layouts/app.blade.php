<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
        <meta name="description" content="@yield('description')" />
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
        <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('style')
    </head>


    <body style="font-family:Mitr">
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
        @yield('content')
        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/tether.min.js') }}"></script><!-- Tether for Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/modernizr.min.js') }}"></script>
        <script src="{{ asset('js/detect.js') }}"></script>
        <script src="{{ asset('js/fastclick.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('pages/sweet-alert.init.js') }}"></script>
        <!-- App js -->
        @yield('script')
        <script src="{{ asset('js/app.js') }}"></script>
        @include('sweetalert::alert')
    </body>
</html>