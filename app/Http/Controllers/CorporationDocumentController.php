<?php

namespace App\Http\Controllers;

use App\Http\Requests\CorporationDocumentRequest;
use App\Models\CorporationDocument;
use Illuminate\Http\JsonResponse;

class CorporationDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->success(['corporation_document' => CorporationDocument::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CorporationDocumentRequest $request
     * @return JsonResponse
     */
    public function store(CorporationDocumentRequest $request): JsonResponse
    {
        $corporationDocument = CorporationDocument::create($request->validated());

        return response()->success(['corporation_document' => $corporationDocument]);
    }

    /**
     * Display the specified resource.
     *
     * @param CorporationDocument $corporationDocument
     * @return JsonResponse
     */
    public function show(CorporationDocument $corporationDocument): JsonResponse
    {
        return response()->success(['corporation_document' => $corporationDocument]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CorporationDocumentRequest $request
     * @param CorporationDocument $corporationDocument
     * @return JsonResponse
     */
    public function update(
        CorporationDocumentRequest $request,
        CorporationDocument $corporationDocument
    ): JsonResponse {
        $corporationDocument->update($request->validated());

        return response()->success(['corporation_document' => $corporationDocument]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CorporationDocument $corporationDocument
     * @return JsonResponse
     */
    public function destroy(CorporationDocument $corporationDocument): JsonResponse
    {
        $corporationDocument->delete();

        return response()->success(['corporation_document' => $corporationDocument]);
    }
}
