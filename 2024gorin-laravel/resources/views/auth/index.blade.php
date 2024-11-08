@extends('layouts.layout')

@section('content')

<div>
    <h2>ログイン</h2>
    @error('auth')
        <p>{{$message}}</p>
    @enderror
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div>
            <label for="email">EMail</label>
            <input type="email" name="email">
            @error('email')
                <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="email">Password</label>
            <input type="password" name="password">
            @error('password')
                <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <button type="submit" >ログイン</button>
        </div>
    </form>
</div>

@endsection