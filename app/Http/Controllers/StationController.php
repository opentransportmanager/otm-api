<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreStation;
use App\Http\Requests\UpdateStation;
use App\Station;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StationController extends Controller
{
    /**
     * Display all resources.
     */
    public function index(): JsonResponse
    {
        $stations = Station::filter()->get();

        return response()->json($stations, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStation $request): JsonResponse
    {
        Station::create($request->validated());

        return response()->json(['message' => __('messages.station.created')], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Station $station): JsonResponse
    {
        return response()->json($station);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStation $request, Station $station): JsonResponse
    {
        $station->update($request->validated());

        return response()->json(['message' => __('messages.station.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Station $station): JsonResponse
    {
        $station->delete();

        return response()->json(['message' => __('messages.station.deleted')]);
    }
}
