<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Retrieve list of contacts test.
     *
     * @test
     * @return void
     */
    public function listOfContactsCanBeRetrieved()
    {
        $this->withExceptionHandling();

        $contacts = Contact::factory(10)->create();

        $response = $this->get('/api/contacts');

        $response->assertOk();

        $this->assertCount(10, Contact::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contacts'
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Create a new contact test.
     *
     * @test
     * @return void
     */
    public function aContactCanBeCreated()
    {
        $this->withExceptionHandling();

        $contact = Contact::factory()->make();

        $response = $this->post('/api/contacts', $contact->toArray());

        $response->assertOk();

        $this->assertCount(1, Contact::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contact' => $contact->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Show a contact test.
     *
     * @test
     * @return void
     */
    public function aContactCanBeRetrieved()
    {
        $this->withExceptionHandling();

        Contact::factory()->create();

        $contact = Contact::first();

        $response = $this->get("/api/contacts/{$contact->id}");

        $response->assertOk();

        $this->assertCount(1, Contact::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contact' => $contact->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Update a new contact test.
     *
     * @test
     * @return void
     */
    public function aContactCanBeUpdated()
    {
        $this->withExceptionHandling();

        Contact::factory()->create();

        $contact = Contact::first();
        $contact_factory = Contact::factory()->make();
        $contact->fill($contact_factory->toArray());

        $response = $this->put("/api/contacts/{$contact->id}", $contact->toArray());

        $response->assertOk();

        $this->assertCount(1, Contact::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contact' => $contact_factory->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Delete a contact test.
     *
     * @test
     * @return void
     */
    public function aContactCanBeDeleted()
    {
        $this->withExceptionHandling();

        Contact::factory()->create();

        $contact = Contact::first();

        $response = $this->delete("/api/contacts/{$contact->id}");

        $response->assertOk();

        $this->assertCount(0, Contact::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contact' => $contact->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }
}
