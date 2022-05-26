<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Retrieve list of users test.
     *
     * @test
     * @return void
     */
    public function listOfUserCanBeRetrieved()
    {
        $this->withExceptionHandling();

        $users = User::factory(10)->create();

        $response = $this->get('/api/users');

        $response->assertOk();

        $this->assertCount(10, User::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'users'
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Create a new user test.
     *
     * @test
     * @return void
     */
    public function aUserCanBeCreated()
    {
        $this->withExceptionHandling();

        $user = User::factory()->make();

        $response = $this->post('/api/users', $user->toArray());

        $response->assertOk();

        $this->assertCount(1, User::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'user' => $user->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Show a user test.
     *
     * @test
     * @return void
     */
    public function aUserCanBeRetrieved()
    {
        $this->withExceptionHandling();

        User::factory()->create();

        $user = User::first();

        $response = $this->get("/api/users/{$user->id}");

        $response->assertOk();

        $this->assertCount(1, User::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'user' => $user->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Update a new user test.
     *
     * @test
     * @return void
     */
    public function aUserCanBeUpdated()
    {
        $this->withExceptionHandling();

        User::factory()->create();

        $user = User::first();
        $user_factory = User::factory()->make();
        $user->fill($user_factory->toArray());

        $response = $this->put("/api/users/{$user->id}", $user->toArray());

        $response->assertOk();

        $this->assertCount(1, User::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'user' => $user_factory->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Delete a user test.
     *
     * @test
     * @return void
     */
    public function aUserCanBeDeleted()
    {
        $this->withExceptionHandling();

        User::factory()->create();

        $user = User::first();

        $response = $this->delete("/api/users/{$user->id}");

        $response->assertOk();

        $this->assertCount(0, User::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'user' => $user->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }
}
