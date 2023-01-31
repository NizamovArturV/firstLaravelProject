@extends('layout.master')

@section('title')
    Список обращений
@endsection

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Дата получения</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <th scope="row">{{$ticket->id}}</th>
                <td>{{$ticket->email}}</td>
                <td>{{$ticket->message}}</td>
                <td>{{$ticket->created_at->format('d.m.Y H:i:s')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
