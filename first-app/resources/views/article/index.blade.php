@extends('layouts.template')

@section('name', 'honda')

@section('content')

    <h1>{{ $title }}</h1>

    @foreach ($articles as $response)
        <h2>{{ $response['title'] }}</h2>
        <p>{{ $response['body'] }}</p>
    @endforeach

@endsection
