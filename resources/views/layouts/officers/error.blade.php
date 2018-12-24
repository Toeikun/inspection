<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <mete http-equi="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <meta name="description" content="@yield('description')" />
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('style')
    </head>


    <body style="font-family:Kanit">
        @yield('content')
        <!-- jQuery  -->
    </body>
</html>