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

    public function create()
    {
        dd('snickers');
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'author_id' => ['required'],
        ]);

        $post = Post::query()->create([
            'author_id' => $request->input('author_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return response()->json($post->toArray());
    }

    public function index(): Response
    {
        return response()->view('index', [
            'posts' => Post::query()->paginate(10),
        ]);
    }
}
