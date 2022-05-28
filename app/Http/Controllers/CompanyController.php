<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $companies = Company::all();

        return response()->success(['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyRequest $request
     * @return JsonResponse
     */
    public function store(CompanyRequest $request): JsonResponse
    {
        $company = Company::create($request->validated());

        return response()->success(['company' => $company]);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return JsonResponse
     */
    public function show(Company $company): JsonResponse
    {
        return response()->success(['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyRequest $request
     * @param Company $company
     * @return JsonResponse
     */
    public function update(CompanyRequest $request, Company $company): JsonResponse
    {
        $company->update($request->validated());

        return response()->success(['company' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return JsonResponse
     */
    public function destroy(Company $company): JsonResponse
    {
        $company->delete();

        return response()->success(['company' => $company]);
    }
}
