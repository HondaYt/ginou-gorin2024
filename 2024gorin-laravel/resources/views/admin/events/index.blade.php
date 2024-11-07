@extends('layouts.layout')

@section('content')

<a href="{{route('events.create')}}">新規登録</a>
<ul>
    @foreach ($events as $event)   
    <li>
        {{$event->title}}
        {{$event->address}}
        {{$event->event_date}}

        <p>{{$message}}</p>
        <div>
            <a href="{{route('events.edit',$event->id)}}">編集</a>
        </div>
        <div>
            <form action="{{route('events.destroy',$event->id)}}" class="form" method="POST">
                @csrf
                @method('DELETE')
                <a href="#" class="delete">削除</a>
            </form>
        </div>
    </li>
    @endforeach
</ul>
<script>
    const formElms = document.querySelectorAll('.form');
    for(const formElm of formElms){
        const deleteElm = formElm.querySelector('.delete');
        deleteElm.addEventListener('click',(e)=>{
            e.preventDefault();
            if(confirm('削除します？')){
                deleteElm.closest('form').submit();
            };
        })
    }
</script>

@endsection
