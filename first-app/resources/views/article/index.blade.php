@extends('layouts.template')

@section('name', 'honda')

@section('content')

    <h1>{{ $title }}</h1>

    @foreach ($articles as $article)
        <h2>{{ $article['title'] }}</h2>
        <p>{{ $article['body'] }}</p>
        <a href="{{route('article.edit',$article->id)}}">EDIT</a>
        <form action="{{route('article.destroy',$article->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type='submit'>DELETE</button>
        </form>
    @endforeach

@endsection
