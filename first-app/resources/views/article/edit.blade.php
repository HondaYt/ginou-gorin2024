@extends('layouts.template')

@section('content')
    <div>
        <form action="{{ route('article.update', $id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="title">
            <button type="submit">更新</button>
        </form>
    </div>
@endsection
