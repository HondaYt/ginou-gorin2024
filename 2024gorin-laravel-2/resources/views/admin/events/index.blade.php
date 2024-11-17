@extends('layouts.layout')

@section('content')
<a href="{{route('events.create')}}">新規登録</a>

<ul>
    @foreach ($events as $event)
    <li>
        <h1>{{$event->title}}</h1>
        <p>{{$event->address}}</p>
        <p>{{$event->event_date}}</p>
        <a href="{{route('events.edit',$event->id)}}">編集</a>
        <form action="{{route('events.destroy',$event->id)}}" method="POST">
            @csrf
            @method('DELETE')
            
            <button type="submit">削除</a>
        </form>
    </li>
    @endforeach
</ul>
@endsection