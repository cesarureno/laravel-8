<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $companies = Company::all();

        return response()->success(['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyRequest $request
     * @return Response
     */
    public function store(CompanyRequest $request): Response
    {
        $company = Company::create($request->all());

        return response()->success(['company' => $company]);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function show(Company $company): Response
    {
        return response()->success(['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyRequest $request
     * @param Company $company
     * @return Response
     */
    public function update(CompanyRequest $request, Company $company): Response
    {
        $company->update($request->all());

        return response()->success(['company' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Response
     */
    public function destroy(Company $company): Response
    {
        $company->delete();

        return response()->success(['company' => $company]);
    }
}
