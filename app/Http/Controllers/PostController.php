<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return response()->view('post', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::query()->create(['content' => $request->input('content')]);
        return response()->json($post->toArray());
    }

    public function index(Request $request)
    {
        return response()->view('index', [
            'posts' => Post::query()->paginate(10),
        ]);
    }
}
