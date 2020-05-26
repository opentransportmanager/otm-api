<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AttachStationsToPath;
use App\Http\Requests\DetachStationsFromPath;
use App\Path;
use App\Services\PathStationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PathStationController extends Controller
{
    public function __construct(PathStationService $pathStationService)
    {
        $this->pathStationService = $pathStationService;
    }

    /**
     * Attach a list of stations to a Path.
     */
    public function attachStations(AttachStationsToPath $request, Path $path): JsonResponse
    {
        $this->pathStationService->attachStations($request->validated(), $path);

        return response()->json(['message' => 'Stations attached successfully'], Response::HTTP_CREATED);
    }

    /**
     * Detach a list of stations from Path.
     */
    public function detachStations(DetachStationsFromPath $request, Path $path): JsonResponse
    {
        $this->pathStationService->detachStations($request->validated(), $path);

        return response()->json(['message' => 'Stations detached successfully'], Response::HTTP_OK);
    }

    /**
     * Show stations attached to a selected path.
     */
    public function showAttachedStations(Path $path): JsonResponse
    {
        $stations = $this->pathStationService->showAttachedStations($path);

        return response()->json($stations, Response::HTTP_OK);
    }
}
