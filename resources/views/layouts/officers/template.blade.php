<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <title>@yield('title')</title>
      <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
      {{-- <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css') }}"> --}}
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @yield('style')
  </head>


  <body class="fixed-left" style="font-family:Mitr">
    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
      <!-- Begin page -->
      <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
          @include('layouts.officers.sidebar')
        </div>
        <!-- Left Sidebar End -->
        <!-- Start right Content here -->
        <div class="content-page">
          <!-- Start content -->
          <div class="content">
            <!-- Top Bar Start -->
            <div class="topbar">
              @include('layouts.officers.header')
            </div>
            <div class="page-content-wrapper ">
              @yield('content')
            </div><!-- content -->
            @include('layouts.officers.footer')
          </div>
        </div>
      </div>

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
      @yield('script')
      <!-- App js -->
      <script src="{{ asset('js/app.js') }}"></script>
      @include('sweetalert::alert')
  </body>
</html>
