@extends('layouts.layout')

@section('content')
<a href="{{route('events.create')}}">新規登録</a>

<ul>
    @foreach ($events as $event)
    <li>
        <h1>{{$event->title}}</h1>
        <p>{{$event->address}}</p>
        <p>{{$event->event_date}}</p>
    </li>
    @endforeach
</ul>
@endsection