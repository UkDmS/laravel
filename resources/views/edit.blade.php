@extends('app')
@section('title', 'Редактирование')


@section('content')
    <form  action="{{route('saveChange',['id' => $edit->id])}}" method="post" enctype="multipart/form-data">
        <div class="row">
            {{ csrf_field() }}
            <div class="col-lg-12">
                <label for="title" class="col-xs-3 col-form-label mr-2">Заголовок</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="title" name="title" value="{{$edit->title}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label for="description" class="col-xs-3 col-form-label mr-2">Описание</label>
                <div class="col-xs-9">
                    <textarea type="text" class="form-control" id="description" name="description">{{$edit->body}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-xs-9">
                    <label class="col-xs-3 col-form-label mr-2">Изображение</label>
                    <img src="{{config('app.img')}}{{$edit->img}}" alt="" class="img__post"/>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label for="tags">Тэги</label>
                @if(isset($arrayTagsPosts))
                      @if (count($tag) > 0)
                        <select multiple="on" size="5" name="options[]" id="options">
                            @foreach ($tag as $item)
                                @if (in_array($item->tag, $arrayTagsPosts))
                                    <option value="{{$item->id}}" data-name="{{$item->tag}}" selected="selected">{{$item->tag}}</option>
                                @else
                                    <option value="{{$item->id}}" data-name="{{$item->tag}}">{{$item->tag}}</option>
                                @endif

                            @endforeach
                        </select>
                        <div class="mselect">
                            @foreach ($tag as $item)
                                @if (in_array($item->tag, $arrayTagsPosts))
                                     <label class="check"><input type="checkbox" value="{{$item->tag}}" checked>{{$item->tag}}</label>
                                @else
                                <label><input type="checkbox" value="{{$item->tag}}">{{$item->tag}}</label>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @else
                    @foreach ($tag as $item)
                        <select multiple="on" size="5" name="options[]" id="options">
                            <option value="{{$item->id}}" data-name="{{$item->tag}}">{{$item->tag}}</option>
                        </select>
                    @endforeach
                    <div class="mselect">
                        @foreach ($tag as $item)
                            <label><input type="checkbox" value="{{$item->tag}}">{{$item->tag}}</label>
                        @endforeach
                    </div>
                    <a id="add__tag" >Добавить тег</a>
                    <div id="wrapper__tag">
                        <input id="new__tag">
                        <input type="button" name="close__tag" id="close__tag" value="Закрыть">
                        <input type="button" name="save__tag" id="save__tag" value="Сохранить">
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
            <label for="image" class="col-xs-3 col-form-label mr-2">Изображение</label>

                <input type="file" name="image" class="form-control">
                <input type="hidden" name="hidden_img" value="{{$edit->img}}"/>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-lg-2 offset-lg-5">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
@endsection