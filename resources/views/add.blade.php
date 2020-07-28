<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
Добавить
                </div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="container">



        <div class="panel panel-primary">

            <div class="panel-body">

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                </div>
                <img src="images/{{ Session::get('image') }}">
                @endif

                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                        @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                        @endforeach
                                </ul>
                        </div>
                @endif

                <form action="add/submit" method="post" enctype="multipart/form-data">

                        <div class="row">
                                   {{ csrf_field() }}

        <div class="form-group row">
            <label for="title" class="col-xs-3 col-form-label mr-2">Заголовок</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
         <div class="form-group row">
            <label for="description" class="col-xs-3 col-form-label mr-2">Описание</label>
            <div class="col-xs-9">
                <textarea type="text" class="form-control" id="description" name="description">
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="tags" class="col-xs-3 col-form-label mr-2">Тэги</label>
            <div class="col-xs-9">
                <select type="text" class="form-control" id="tags" name="tags">
                    <option>lll</option>
                    <option>lll</option>
                    <option>lll</option>
                    <option>lll</option>
                </select>
            </div>
        </div>
                                <div class="col-md-6">
                                        <input type="file" name="image" class="form-control">
                                </div>

                                <div class="col-md-6">
                                        <button type="submit" class="btn btn-success">Upload</button>
                                </div>

                        </div>
                </form>

            </div>
        </div>

        <div class="form-group row">
            <div class="offset-xs-3 col-xs-9">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>

</div>
            </div>
        </div>
    </body>
</html>
