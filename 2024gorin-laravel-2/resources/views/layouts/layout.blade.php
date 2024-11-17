<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
    <header>
        <ul>
            <li><a href="{{route('index')}}">top</a></li>
            <li><a href="{{route('events.index')}}">events</a></li>
        </ul>
    </header>
    @endauth
    <main>
        @yield('content')
    </main>
</body>
</html>