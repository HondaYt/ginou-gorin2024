@extends('layouts.layout')

@section('content')
<div>
    <form action="{{route('events.store')}}" method="POST">
        @csrf

        <div>
            <label for="">Title</label>
            <input type="text" name="title" value="{{old('title')}}">
        </div>
        <div>
            <label for="">Address</label>
            <input type="text" name="address" value="{{old('address')}}">
        </div>
        <div>
            <label for="">Event Date</label>
            <input type="date" name="event_date" value="{{old('event_date')}}">
        </div>
        <button type="submit">登録</button>
    </form>
</div>
@endsection