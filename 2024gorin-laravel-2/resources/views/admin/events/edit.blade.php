@extends('layouts.layout')

@section('content') 
<div>
    <form action="{{route('events.store')}}" method="POST">
        @csrf

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{$event->title}}">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="{{$event->address}}">
        </div>
        <div>
            <label for="event_date">EventDate:</label>
            <input type="text" name="event_date" id="event_date" value="{{$event->event_date}}">
        </div>
        <button type="submit">登録</button>
    </form>
</div>
@endsection
