@extends('app')
@section('title', 'Список')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Описание</th>
                <th scope="col">Изображение</th>
                <th scope="col">Тэги</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата изменения</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $l)
                <tr>
                    <td> {{ $l->id }}</td>
                    <td> {{ $l->title }}</td>
                    <td> {{ $l->body }}</td>
                    <td> <img class="preview" src="{{config('app.url')}}public/images/{{ $l->img}}"></td>
                    <td> {{ $l->tags }}</td>
                    <td> {{ $l->created_at }}</td>
                    <td> {{ $l->tags }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
