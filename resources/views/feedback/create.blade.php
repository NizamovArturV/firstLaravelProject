@extends('layout.master')

@section('title')
    Обратная связь
@endsection

@section('content')

    @include('layout.errors')

    <form method="post" action="/contacts">
        @csrf
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Введите email" value="{{old('email')}}">
        </div>
        <div class="mb-3">
            <label for="inputMessage" class="form-label">Сообщение</label>
            <textarea name="message" class="form-control" id="inputMessage" placeholder="Опишите вашу проблему">{{old('message')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Создать обращение</button>
    </form>


@endsection
