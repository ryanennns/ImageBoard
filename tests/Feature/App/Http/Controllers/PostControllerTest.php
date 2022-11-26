<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\User;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    public function test_it_can_create_posts()
    {
        $password = 'snickers';
        $user = User::factory()->create([
            'id' => 1,
            'password' => $password,
        ]);

        $this->post(route('session.create'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $postTitle = 'snickers';
        $postContent = 'this is a meme post ! please enjoy this snickers bar !';
        $this->post(route('post.store'), [
            'title' => $postTitle,
            'content' => $postContent,
            'author_id' => $user->id,
        ])->assertSuccessful();

        $this->assertDatabaseHas('posts', [
            'title' => $postTitle,
            'author_id' => $user->id,
            'content' => $postContent,
        ]);
    }
}
