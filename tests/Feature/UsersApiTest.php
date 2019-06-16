<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersApiTest extends TestCase
{
    use WithFaker;
    /**
     * Testing whether returns a json with users
     *
     * @return void
     */
    public function testGetUsersList()
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCanCreateUser() {
        $response = $this->json('POST', '/users', [
            'name' => $this->faker->name,
            'age' => rand(18, 99),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'city' => $this->faker->city,
            'state' => $this->faker->stateAbbr
            ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'response' => true,
            ]);
    }
}
