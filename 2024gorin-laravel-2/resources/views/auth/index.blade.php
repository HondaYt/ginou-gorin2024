@extends('layouts.layout')

@section('content')
<div>
    @error('auth')
    <p>{{$message}}</p>
    @enderror
    <form method="POST">
        @csrf
        <div>
            <label for="email">メールアドレス:</label>
            <input type="email" name="email" id="email" value='{{old('email')}}'>
        </div>
        @error('email')
            <p>{{$message}}</p>
        @enderror
        <div>
            <label for="password">パスワード:</label>
            <input type="password" name="password" id="password">
        </div>
        @error('password')
            <p>{{$message}}</p>
        @enderror
        <button type="submit">ログイン</button>
    </form>
</div>

@endsection