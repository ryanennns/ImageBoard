<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post->comments()->create([
            'content' => $request->input('content')
        ]);

        return response()->redirectTo("/posts/$post->id");
    }
}
