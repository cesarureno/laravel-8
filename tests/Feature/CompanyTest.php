<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Retrieve list of companies test.
     *
     * @test
     * @return void
     */
    public function listOfUserCanBeRetrieved()
    {
        $this->withExceptionHandling();

        $companies = Company::factory(10)->create();

        $response = $this->get('/api/companies');

        $response->assertOk();

        $this->assertCount(10, Company::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'companies'
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

        $company = Company::factory()->make();

        $response = $this->post('/api/companies', $company->toArray());

        $response->assertOk();

        $this->assertCount(1, Company::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'company' => $company->getFillable()
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

        Company::factory()->create();

        $company = Company::first();

        $response = $this->get("/api/companies/{$company->id}");

        $response->assertOk();

        $this->assertCount(1, Company::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'company' => $company->getFillable()
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

        Company::factory()->create();

        $company = Company::first();
        $company_factory = Company::factory()->make();
        $company->fill($company_factory->toArray());

        $response = $this->put("/api/companies/{$company->id}", $company->toArray());

        $response->assertOk();

        $this->assertCount(1, Company::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'company' => $company_factory->getFillable()
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

        Company::factory()->create();

        $company = Company::first();

        $response = $this->delete("/api/companies/{$company->id}");

        $response->assertOk();

        $this->assertCount(0, Company::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'company' => $company->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }
}
