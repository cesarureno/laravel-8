<?php

namespace App\Http\Controllers;

use App\Http\Requests\CorporationRequest;
use App\Models\Corporation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CorporationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->success(['corporations' => Corporation::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CorporationRequest $request
     * @return JsonResponse
     */
    public function store(CorporationRequest $request): JsonResponse
    {
        $corporation = Corporation::create($request->validated());

        return response()->success(['corporation' => $corporation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(Corporation $corporation): JsonResponse
    {
        return response()->success(['corporation' => $corporation->load(
            'companies',
            'contacts',
            'contracts',
            'corporationDocument'
        )]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CorporationRequest $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CorporationRequest $request, Corporation $corporation): JsonResponse
    {
        $corporation->update($request->validated());

        return response()->success(['corporation' => $corporation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(Corporation $corporation): JsonResponse
    {
        $corporation->delete();

        return response()->success(['corporation' => $corporation]);
    }
}
