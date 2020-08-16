<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Classroom Finder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #00916e;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .link-bg a:link, a:visited {
                border: 2px solid #ffffff;
                color: #ffffff;
                padding: 14px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                transition: all 0.2s ease-out;
                box-shadow: inset 0 0 0 0 #31302B;
            }

            a:hover, a:active {
                border: 2px solid #00916e;
                background-color: #fff;
                color: #00916e;
                font-weight: bold;
                box-shadow: inset 100px 0 0 0 #e0e0e0;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/userAccount') }}">Welcome {{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Classroom Finder
                </div>

                <div class="link-bg">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('index') }}">Homepage</a>
                        @else
                            <a href="{{ route('home') }}">Login</a>
                        @endauth
                    @endif
                </div>

            </div>
        </div>
    </body>
</html>
