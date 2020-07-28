<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                flex-direction: column;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .preview{
                width:150px;
                height:150px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <nav>
        <div class="links">
            <a href="{{ url('add') }}">Добавить</a>
            <a href="{{ url('list') }}">Просмотреть</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </nav>
    <body>
        <div class="container">
        <div class="flex-center">
            <div class="row">
                <div class="col-md-6 col-lg-6 title m-b-md">
                    @yield('title')
                </div>
            </div>
            <div class="row">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
