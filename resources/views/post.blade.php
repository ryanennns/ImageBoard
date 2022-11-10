<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Post #{{$post->id}}</title>
</head>
<body class="bg-slate-800 text-white p-10">

    <div class="bg-slate-600 p-5">
        <h1 class="text-3xl font-bold">{{$post->title}}</h1>
        <p class="text-gray-300">{{ $post->created_at }}</p>
        <p class="text-base">{{ $post->content }}</p>
    </div>

    <div class="m-5">
        <ul>
            @foreach($post->comments as $comment)
                <li class="bg-slate-600 p-5 m-5 w-1/2">
                    <p class="text-base">{{$comment->content}}</p>
                    <p class="text-base text-gray-300">{{$comment->created_at}}</p>
                </li>
            @endforeach
        </ul>

        <form action="/posts/{{$post->id}}/comments" method="post">
            @csrf
            <textarea
                name="body"
                id="comment"
                cols="30"
                rows="10"
                placeholder="Write a comment"
                class="bg-slate-600 p-5"
            ></textarea>
            <br>
            <button type="submit">Post Comment</button>
        </form>
    </div>
</body>
</html>
