<?php

namespace Tests\Feature;

use App\Models\Company;
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
    public function listOfCompaniesCanBeRetrieved()
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
     * Create a new company test.
     *
     * @test
     * @return void
     */
    public function aCompanyCanBeCreated()
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
     * Show a company test.
     *
     * @test
     * @return void
     */
    public function aCompanyCanBeRetrieved()
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
     * Update a new company test.
     *
     * @test
     * @return void
     */
    public function aCompanyCanBeUpdated()
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
     * Delete a company test.
     *
     * @test
     * @return void
     */
    public function aCompanyCanBeDeleted()
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
