<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    @vite('resources/css/app.css')--}}
    <title>posts</title>
</head>
<body class="bg-slate-800 text-white p-10">
    <h1 class="text-3xl font-bold underline">posts</h1>
    @guest()
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    @else
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <br>
    @endguest
    @auth()
        <div>
            <a href="/posts/create">Write Post</a>
        </div>
    @endauth
    <ul>
        @foreach($posts as $post)
            <li class="underline"><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
</body>
</html>
