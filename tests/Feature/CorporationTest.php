<?php

namespace Tests\Feature;

use App\Models\Corporation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CorporationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Retrieve list of corporations test.
     *
     * @test
     * @return void
     */
    public function listOfCorporationsCanBeRetrieved()
    {
        $this->withExceptionHandling();

        $corporations = Corporation::factory(10)->create();

        $response = $this->get('/api/corporations');

        $response->assertOk();

        $this->assertCount(10, Corporation::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporations'
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Create a new corporation test.
     *
     * @test
     * @return void
     */
    public function aCorporationCanBeCreated()
    {
        $this->withExceptionHandling();

        $corporation = Corporation::factory()->make();

        $response = $this->post('/api/corporations', $corporation->toArray());

        $response->assertOk();

        $this->assertCount(1, Corporation::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation' => $corporation->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Show a corporation test.
     *
     * @test
     * @return void
     */
    public function aCorporationCanBeRetrieved()
    {
        $this->withExceptionHandling();

        Corporation::factory()->create();

        $corporation = Corporation::first();

        $response = $this->get("/api/corporations/{$corporation->id}");

        $response->assertOk();

        $this->assertCount(1, Corporation::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation' => $corporation->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Update a new corporation test.
     *
     * @test
     * @return void
     */
    public function aCorporationCanBeUpdated()
    {
        $this->withExceptionHandling();

        Corporation::factory()->create();

        $corporation = Corporation::first();
        $corporation_factory = Corporation::factory()->make();
        $corporation->fill($corporation_factory->toArray());

        $response = $this->put("/api/corporations/{$corporation->id}", $corporation->toArray());

        $response->assertOk();

        $this->assertCount(1, Corporation::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation' => $corporation_factory->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Delete a corporation test.
     *
     * @test
     * @return void
     */
    public function aCorporationCanBeDeleted()
    {
        $this->withExceptionHandling();

        Corporation::factory()->create();

        $corporation = Corporation::first();

        $response = $this->delete("/api/corporations/{$corporation->id}");

        $response->assertOk();

        $this->assertCount(0, Corporation::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation' => $corporation->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }
}
