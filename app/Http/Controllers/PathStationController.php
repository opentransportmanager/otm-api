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
        $this->authorize('manage');
        $this->pathStationService->attachStations($request->validated(), $path);

        return response()->json(['message' => __('messages.path_station.attached')], Response::HTTP_CREATED);
    }

    /**
     * Detach a list of stations from Path.
     */
    public function detachStations(DetachStationsFromPath $request, Path $path): JsonResponse
    {
        $this->authorize('manage');
        $this->pathStationService->detachStations($request->validated(), $path);

        return response()->json(['message' => __('messages.path_station.detached')]);
    }

    /**
     * Show stations attached to a selected path.
     */
    public function showAttachedStations(Path $path): JsonResponse
    {
        $this->authorize('view');
        $stations = $this->pathStationService->showAttachedStations($path);

        return response()->json($stations);
    }
}
