@extends('layout.master')

@section('title')
    {{$article->title}}
@endsection

@section('content')
    {{$article->created_at->format('d.m.Y H:i:s')}}
    {{$article->detail_text}}

    <hr>
    <a href="/">Вернутся к списку</a>
@endsection
