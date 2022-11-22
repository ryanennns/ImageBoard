<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>this is a login page</h1>
    <form method="POST" action="/login">
        @csrf
        <input name="email" type="text" placeholder="email">
        <br>
        <br>
        <input name="password" type="text" placeholder="password">
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
