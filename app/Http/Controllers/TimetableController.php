<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Timetable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TimetableController extends Controller
{
    /**
     * Makes a selected timetable public.
     */
    public function publish(Timetable $timetable): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Generates a timetable based on current data state.
     */
    public function generate(): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Fetches current timetable version data.
     */
    public function fetch(): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Displays a selected non-published timetable.
     */
    public function preview(): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
}
