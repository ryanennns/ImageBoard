<?php

namespace Tests\Feature\App\Http\Controllers;

use App\Models\User;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    public function test_it_can_create_a_user()
    {
        $userAttributes = User::factory()->raw();

        $this->post('/register', $userAttributes);

        $this->assertDatabaseHas('users', [
            'username' => $userAttributes['username'],
        ]);
    }

    /**
     * @param $key
     * @param $invalidValue
     * @return void
     * @dataProvider providerInvalidUserCases
     */
    public function test_it_wont_create_an_invalid_user($key, $invalidValue): void
    {
        $userAttributes = User::factory()->raw();
        $userAttributes[$key] = $invalidValue;

        $this->post('/register', $userAttributes);

        $this->assertDatabaseMissing('users', [
            'username' => $userAttributes['username'],
        ]);
    }

    public function providerInvalidUserCases(): array
    {
        return [
            'invalid username' => [
                'key' => 'username',
                'invalidValue' => 'a',
            ],
            'invalid email' => [
                'key' => 'email',
                'invalidValue' => 'a',
            ],
            'invalid password' => [
                'key' => 'password',
                'invalidValue' => 'a',
            ],
        ];
    }
}
