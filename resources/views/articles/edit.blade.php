@extends('layout.master')

@section('title')
    Изменение статьи {{$article->title}}
@endsection

@section('content')

    @include('layout.errors')

    <form class="mt-3" method="post" action="{{route('articles.update', [$article])}}">
        @csrf
        @method('PATCH')
        @include('articles.form')
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

    <form class="mt-3" method="post" action="{{route('articles.destroy', [$article])}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>


@endsection
