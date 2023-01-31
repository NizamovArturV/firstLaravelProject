@extends('layout.master')

@section('title')
    Главная
@endsection

@section('content')
    @foreach($articles as $article)
        @include('articles.item')
    @endforeach

@endsection
