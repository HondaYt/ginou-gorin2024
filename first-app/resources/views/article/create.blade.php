@extends('layouts.template')

@section('content')
    <div>
        <form action="{{ route('article.store') }}" method="POST">
            @csrf

            <input type="text" name="title">
            <button type="submit">登録</button>
        </form>
    </div>
@endsection
