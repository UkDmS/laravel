@extends('app')
@section('title', 'Добавить')


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
            <div class="col-lg-12">
            <label for="image" class="col-xs-3 col-form-label mr-2">Изображение</label>

                <input type="file" name="image" class="form-control">

            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label for="tags">Тэги</label>
                @if (count($tag) > 0)
                    <select multiple="on" size="5" name="options[]" id="options">
                        @foreach ($tag as $item)
                            <option value="{{$item->id}}" data-name="{{$item->tag}}">{{$item->tag}}</option>
                        @endforeach
                    </select>
                    <div class="mselect">
                        @foreach ($tag as $item)
                            <label><input type="checkbox" value="{{$item->tag}}">{{$item->tag}}</label>
                        @endforeach
                    </div>
                @else
                    <select multiple="on" size="5" name="options[]" id="options"></select>
                    <div class="mselect"></div>
                @endif
                <a id="add__tag" >Добавить тег</a>
                <div id="wrapper__tag">
                    <input id="new__tag">
                    <input type="button" name="close__tag" id="close__tag" value="Закрыть">
                    <input type="button" name="save__tag" id="save__tag" value="Сохранить">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-lg-2 offset-lg-5">
                <button type="submit" class="btn btn-primary">Отправить</button>
                <button class="btn btn-primary" onclick="javascript:history.back(); return false;">Назад</button>
            </div>
        </div>
    </form>
@endsection