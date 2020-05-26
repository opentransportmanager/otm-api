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
        $paths = Path::all();

        return response()->json($paths, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePath $request): JsonResponse
    {
        Path::create($request->validated());

        return response()->json(['message' => 'Path created successfully'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Path $path): JsonResponse
    {
        return response()->json($path, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePath $request, Path $path): JsonResponse
    {
        $path->update($request->validated());

        return response()->json(['message' => 'Path updated succesfully'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Path $path): JsonResponse
    {
        return response()->json($path, Response::HTTP_OK);
    }
}
