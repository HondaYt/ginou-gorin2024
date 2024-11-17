@extends('layouts.layout')

@section('content')
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