<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function show(Post $post): Response
    {
        return response()->view('post', [
            'post' => $post,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $post = Post::query()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        return response()->json($post->toArray());
    }

    public function index(Request $request): Response
    {
        return response()->view('index', [
            'posts' => Post::query()->paginate(10),
        ]);
    }
}
