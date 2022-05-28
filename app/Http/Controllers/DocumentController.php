<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\JsonResponse;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->success(['documents' => Document::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentRequest $request
     * @return JsonResponse
     */
    public function store(DocumentRequest $request): JsonResponse
    {
        $document = Document::create($request->all());

        return response()->success(['document' => $document]);
    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @return JsonResponse
     */
    public function show(Document $document): JsonResponse
    {
        return response()->success(['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DocumentRequest $request
     * @param Document $document
     * @return JsonResponse
     */
    public function update(DocumentRequest $request, Document $document): JsonResponse
    {
        $document->update($request->all());

        return response()->success(['document' => $document]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return JsonResponse
     */
    public function destroy(Document $document): JsonResponse
    {
        $document->delete();

        return response()->success(['document' => $document]);
    }
}
