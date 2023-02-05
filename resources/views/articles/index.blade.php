@extends('layout.master')

@section('title')
    Главная
@endsection

@section('content')
    @include('layout.success')
    @foreach($articles as $article)
        @include('articles.item')
    @endforeach

@endsection
