<div>
    <form action="{{route('events.update',$event->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="">Title</label>
            <input type="text" name="title" value="{{$event->title}}">
        </div>
        <div>
            <label for="">Address</label>
            <input type="text" name="address" value="{{$event->address}}">
        </div>
        <div>
            <label for="">Event Date</label>
            <input type="date" name="event_date" value="{{$event->event_date}}">
        </div>
        <button type="編集">登録</button>
    </form>
</div>
