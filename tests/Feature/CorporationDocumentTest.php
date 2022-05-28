<?php

namespace Tests\Feature;

use App\Models\CorporationDocument;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class CorporationDocumentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Retrieve list of corporation_document test.
     *
     * @test
     * @return void
     */
    public function listOfCorporationDocumentCanBeRetrieved()
    {
        $this->withExceptionHandling();

        $corporation_document = CorporationDocument::factory(10)->create();

        Passport::actingAs(
            User::factory()->create(),
            ['corporation-document']
        );

        $response = $this->get('/api/corporation-document');

        $response->assertOk();

        $this->assertCount(10, CorporationDocument::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation_document'
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Create a new corporation_document test.
     *
     * @test
     * @return void
     */
    public function aCorporationDocumentCanBeCreated()
    {
        $this->withExceptionHandling();

        $corporation_document = CorporationDocument::factory()->make();

        Passport::actingAs(
            User::factory()->create(),
            ['corporation-document']
        );

        $response = $this->post('/api/corporation-document', $corporation_document->toArray());

        $response->assertOk();

        $this->assertCount(1, CorporationDocument::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation_document' => $corporation_document->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Show a corporation_document test.
     *
     * @test
     * @return void
     */
    public function aCorporationDocumentCanBeRetrieved()
    {
        $this->withExceptionHandling();

        CorporationDocument::factory()->create();

        $corporation_document = CorporationDocument::first();

        Passport::actingAs(
            User::factory()->create(),
            ['corporation-document']
        );

        $response = $this->get("/api/corporation-document/{$corporation_document->id}");

        $response->assertOk();

        $this->assertCount(1, CorporationDocument::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation_document' => $corporation_document->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Update a new corporation_document test.
     *
     * @test
     * @return void
     */
    public function aCorporationDocumentCanBeUpdated()
    {
        $this->withExceptionHandling();

        CorporationDocument::factory()->create();

        $corporation_document = CorporationDocument::first();
        $corporation_document_factory = CorporationDocument::factory()->make();
        $corporation_document->fill($corporation_document_factory->toArray());

        Passport::actingAs(
            User::factory()->create(),
            ['corporation-document']
        );

        $response = $this->put(
            "/api/corporation-document/{$corporation_document->id}",
            $corporation_document->toArray()
        );

        $response->assertOk();

        $this->assertCount(1, CorporationDocument::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation_document' => $corporation_document_factory->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Delete a corporation_document test.
     *
     * @test
     * @return void
     */
    public function aCorporationDocumentCanBeDeleted()
    {
        $this->withExceptionHandling();

        CorporationDocument::factory()->create();

        $corporation_document = CorporationDocument::first();

        Passport::actingAs(
            User::factory()->create(),
            ['corporation-document']
        );

        $response = $this->delete("/api/corporation-document/{$corporation_document->id}");

        $response->assertOk();

        $this->assertCount(0, CorporationDocument::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'corporation_document' => $corporation_document->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }
}
