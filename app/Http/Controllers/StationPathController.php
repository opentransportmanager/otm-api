<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Path;
use App\Services\StationPathService;
use App\Station;
use Illuminate\Http\JsonResponse;

class StationPathController extends Controller
{
    public function __construct(StationPathService $stationPathService)
    {
        $this->stationPathService = $stationPathService;
    }

    /**
     * Show stations attached to a selected path.
     */
    public function showAttachedPaths(Station $station): JsonResponse
    {
        $paths = $this->stationPathService->showAttachedPaths($station);

        return response()->json($paths);
    }

    /**
     * Show timetable of selected Station on selected Path.
     */
    public function showTimetable(Station $station, Path $path): JsonResponse
    {
        $timetable = $this->stationPathService->showTimetable($station, $path);

        return response()->json($timetable);
    }
}
