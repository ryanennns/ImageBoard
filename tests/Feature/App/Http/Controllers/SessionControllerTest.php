<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\User;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function test_it_can_create_a_session()
    {
        $password = 'snickers';
        $user = User::factory()->create([
            'password' => $password,
        ]);
        $this->post(route('session.create'), [
            'email' => $user['email'],
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_it_can_destroy_a_session()
    {
        $password = 'snickers';
        $user = User::factory()->create([
            'password' => $password,
        ]);

        $this->post(route('session.create'), [
            'email' => $user['email'],
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($user);

        $this->post(route('session.logout'));
        $this->assertGuest();
    }
}
