<?php

namespace Tests\Feature;

use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Retrieve list of documents test.
     *
     * @test
     * @return void
     */
    public function listOfDocumentsCanBeRetrieved()
    {
        $this->withExceptionHandling();

        $documents = Document::factory(10)->create();

        $response = $this->get('/api/documents');

        $response->assertOk();

        $this->assertCount(10, Document::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'documents'
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Create a new document test.
     *
     * @test
     * @return void
     */
    public function aDocumentCanBeCreated()
    {
        $this->withExceptionHandling();

        $document = Document::factory()->make();

        $response = $this->post('/api/documents', $document->toArray());

        $response->assertOk();

        $this->assertCount(1, Document::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'document' => $document->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Show a document test.
     *
     * @test
     * @return void
     */
    public function aDocumentCanBeRetrieved()
    {
        $this->withExceptionHandling();

        Document::factory()->create();

        $document = Document::first();

        $response = $this->get("/api/documents/{$document->id}");

        $response->assertOk();

        $this->assertCount(1, Document::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'document' => $document->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Update a new document test.
     *
     * @test
     * @return void
     */
    public function aDocumentCanBeUpdated()
    {
        $this->withExceptionHandling();

        Document::factory()->create();

        $document = Document::first();
        $document_factory = Document::factory()->make();
        $document->fill($document_factory->toArray());

        $response = $this->put("/api/documents/{$document->id}", $document->toArray());

        $response->assertOk();

        $this->assertCount(1, Document::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'document' => $document_factory->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Delete a document test.
     *
     * @test
     * @return void
     */
    public function aDocumentCanBeDeleted()
    {
        $this->withExceptionHandling();

        Document::factory()->create();

        $document = Document::first();

        $response = $this->delete("/api/documents/{$document->id}");

        $response->assertOk();

        $this->assertCount(0, Document::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'document' => $document->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }
}
