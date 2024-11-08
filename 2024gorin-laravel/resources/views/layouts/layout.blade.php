<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面</title>
</head>
<body>
    @auth
        
    <header>
        <nav>
            <ul>
                {{-- <li><a href="{{route("admin.index")}}">Top</a></li> --}}
                <li><a href="{{route("index")}}">Top</a></li>
                <li><a href="{{route("events.index")}}">Event</a></li>
                
            </ul>
        </nav>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
    </header>
    
    @endauth
    <main>
        @yield('content')
    </main>
</body>
</html>