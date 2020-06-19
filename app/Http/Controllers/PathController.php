<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePath;
use App\Http\Requests\UpdatePath;
use App\Path;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PathController extends Controller
{
    /**
     * Lists all resources.
     */
    public function index(): JsonResponse
    {
        $this->authorize('view');
        $paths = Path::all();

        return response()->json($paths);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePath $request): JsonResponse
    {
        $this->authorize('manage');
        Path::create($request->validated());

        return response()->json(['message' => __('messages.path.created')], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Path $path): JsonResponse
    {
        $this->authorize('view');
        return response()->json($path);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePath $request, Path $path): JsonResponse
    {
        $this->authorize('manage');
        $path->update($request->validated());

        return response()->json(['message' => __('messages.path.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Path $path): JsonResponse
    {
        $this->authorize('manage');
        $path->delete();

        return response()->json(['message'=> __('messages.path.deleted')]);
    }
}
