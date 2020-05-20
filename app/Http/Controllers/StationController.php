<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Station;
use App\Services\StationService;
use App\Http\Requests\StoreStation;
use App\Http\Requests\UpdateStation;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class StationController extends Controller
{
    public function __construct(StationService $station)
    {
        $this->station = $station;
    }
    /**
     * Display all resources
     */
    public function index(): JsonResponse
    {
        $stations = Station::all();
        return response()->json([$stations], Response::HTTP_CREATED);
    }
    /**
     * Store a newly created resource in storage.
     * @param  App\Http\Requests\StoreStation $request
     */
    public function store(StoreStation $request): JsonResponse
    {
        Station::store($request->validated());
        return response()->json(['message' => 'Station created succesfully'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     * @param  \App\Station  $station
     */
    public function show(Station $station): JsonResponse
    {
        return response()->json($station, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     * @param  App\Http\Requests\UpdateStation  $request
     * @param  \App\Station  $station
     */
    public function update(UpdateStation $request, Station $station): JsonResponse
    {
        $station->update($request->validated());
        return response()->json(['message' => 'Station updated succesfully'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Station  $station
     */
    public function destroy(Station $station): JsonResponse
    {
        $station->delete();
        return response()->json(['message' => 'Station deleted successfully'], Response::HTTP_OK);
    }

    /**
     * Example of fake (won't be implemented) method that should utilize external service
     * because the query might be more complicated and it interacts with User model
     * We need to discuss how to handle filtering yet...
     * @param Request $request
     * @return void
     */
    public function subscribed(): JsonResponse
    {
        //$this->station is an instance of StationService
        $stations = $this->station->subscribed();
        if ($stations)
            return response()->json($stations, Response::HTTP_OK);
        else
            return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
