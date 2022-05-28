<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->success(['contracts' => Contract::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContractRequest $request
     * @return JsonResponse
     */
    public function store(ContractRequest $request): JsonResponse
    {
        $contract = Contract::create($request->all());

        return response()->success(['contract' => $contract]);
    }

    /**
     * Display the specified resource.
     *
     * @param Contract $contract
     * @return JsonResponse
     */
    public function show(Contract $contract): JsonResponse
    {
        return response()->success(['contract' => $contract]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContractRequest $request
     * @param Contract $contract
     * @return JsonResponse
     */
    public function update(ContractRequest $request, Contract $contract): JsonResponse
    {
        $contract->update($request->all());

        return response()->success(['contract' => $contract]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(Contract $contract): JsonResponse
    {
        $contract->delete();

        return response()->success(['contract' => $contract]);
    }
}
