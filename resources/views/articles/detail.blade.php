@extends('layout.master')

@section('title')
    {{$article->title}}
@endsection

@section('content')
    @include('layout.success')
    @include('layout.tags', ['tags' => $article->tags])
    {{$article->created_at->format('d.m.Y H:i:s')}}
    {{$article->detail_text}}

    <hr>
    <a href="{{route('articles.edit', [$article])}}">Изменить статью</a>
    <a href="{{route('mainPage')}}">Вернутся к списку</a>
@endsection
