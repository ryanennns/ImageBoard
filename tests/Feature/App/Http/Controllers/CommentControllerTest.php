<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    public function test_it_can_create_comments_on_posts()
    {
        $comment = 'this is a meme comment';
        $post = Post::factory()->create();

        $this->post("posts/$post->id/comments", [
            'post' => $post,
            'content' => $comment,
        ]);

        $this->assertDatabaseHas(Comment::class, [
            'content' => $comment,
        ]);
    }
}
