<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Mitr', sans-serif;
                /* font-weight: 200; */
                height: 100vh;
                margin: 0;
            }

            .bg {
                /* The image used */
                background-image: url("{{ asset('images/bg1.jpg')}}");
                /* Full height */
                height: 100%;
                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                opacity: 0.6;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
                color: #fff;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="bg">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md text-dark">
                    ระบบตรวจ
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <a class="btn btn-outline-dark" href="{{ url('/student') }}">นักศึกษา</a>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <a class="btn btn-outline-dark" href="{{ url('/officer') }}">ผู้ตรวจ</a>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <a class="btn btn-outline-dark" href="{{ url('/staff') }}">แอดมิน</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
