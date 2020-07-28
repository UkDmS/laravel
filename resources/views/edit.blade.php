@extends('app')
@section('title', 'Редактирование')


@section('content')
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

    <form action="{{route('savePost')}}" method="post" enctype="multipart/form-data">
        <div class="row">
            {{ csrf_field() }}
            <div class="col-lg-12">
                <label for="title" class="col-xs-3 col-form-label mr-2">Заголовок</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label for="description" class="col-xs-3 col-form-label mr-2">Описание</label>
                <div class="col-xs-9">
                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 offset-lg-3">
                <label for="tags" class="col-xs-3 col-form-label mr-2">Тэги</label>
                <div class="col-xs-12">
                    <select type="text" class="form-control" id="tags" name="tags">
                        <option>lll</option>
                        <option>2l</option>
                        <option>3ll</option>
                        <option>4ll</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
            <label for="image" class="col-xs-3 col-form-label mr-2">Изображение</label>

                <input type="file" name="image" class="form-control">

            </div>
        </div>
        <div class="form-group row">
            <div class="offset-lg-2 offset-lg-5">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
@endsection