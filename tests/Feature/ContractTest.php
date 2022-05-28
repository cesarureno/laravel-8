<?php

namespace Tests\Feature;

use App\Models\Contract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContractTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Retrieve list of contracts test.
     *
     * @test
     * @return void
     */
    public function listOfContractsCanBeRetrieved()
    {
        $this->withExceptionHandling();

        $contracts = Contract::factory(10)->create();

        $response = $this->get('/api/contracts');

        $response->assertOk();

        $this->assertCount(10, Contract::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contracts'
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Create a new contract test.
     *
     * @test
     * @return void
     */
    public function aContractCanBeCreated()
    {
        $this->withExceptionHandling();

        $contract = Contract::factory()->make();

        $response = $this->post('/api/contracts', $contract->toArray());

        $response->assertOk();

        $this->assertCount(1, Contract::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contract' => $contract->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Show a contract test.
     *
     * @test
     * @return void
     */
    public function aContractCanBeRetrieved()
    {
        $this->withExceptionHandling();

        Contract::factory()->create();

        $contract = Contract::first();

        $response = $this->get("/api/contracts/{$contract->id}");

        $response->assertOk();

        $this->assertCount(1, Contract::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contract' => $contract->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Update a new contract test.
     *
     * @test
     * @return void
     */
    public function aContractCanBeUpdated()
    {
        $this->withExceptionHandling();

        Contract::factory()->create();

        $contract = Contract::first();
        $contract_factory = Contract::factory()->make();
        $contract->fill($contract_factory->toArray());

        $response = $this->put("/api/contracts/{$contract->id}", $contract->toArray());

        $response->assertOk();

        $this->assertCount(1, Contract::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contract' => $contract_factory->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }

    /**
     * Delete a contract test.
     *
     * @test
     * @return void
     */
    public function aContractCanBeDeleted()
    {
        $this->withExceptionHandling();

        Contract::factory()->create();

        $contract = Contract::first();

        $response = $this->delete("/api/contracts/{$contract->id}");

        $response->assertOk();

        $this->assertCount(0, Contract::all());

        $response->assertJsonStructure([
            'msg',
            'success',
            'data' => [
                'contract' => $contract->getFillable()
            ],
            'exceptions',
            'time_execution',
        ]);
    }
}
