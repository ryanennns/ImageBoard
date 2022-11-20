<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;

class PostControllerTest extends TestCase
{
    public function test_it_can_create_posts()
    {
        $postContent = 'this is a meme post ! please enjoy this meme';
        $this->post('posts/', [
            'title' => 'meme',
            'content' => $postContent,
        ])
            ->assertSuccessful()
            ->assertJsonFragment([
                'content' => $postContent,
            ]);

        $this->assertDatabaseHas('posts', [
            'content' => $postContent,
        ]);
    }
}
