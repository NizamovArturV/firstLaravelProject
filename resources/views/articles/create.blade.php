@extends('layout.master')

@section('title')
    Создание статьи
@endsection

@section('content')

    @include('layout.errors')

    <form method="post" action="{{route('articles.store')}}">
        @csrf
        @include('articles.form')
        <button type="submit" class="btn btn-primary">Создать статью</button>
    </form>


@endsection
