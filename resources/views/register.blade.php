<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    @vite('resources/css/app.css')--}}
    <title>Posts</title>
</head>
<body class="bg-slate-800 text-white p-10">
    <form method="POST" action="/register">
        @csrf
        <input type="text" name="username" id="username">
        <br>
        <br>
        <input type="text" name="email" id="email">
        <br>
        <br>
        <input type="text" name="password" id="password">
        <br>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
