<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Busline;
use App\Http\Requests\StoreBusline;
use App\Http\Requests\UpdateBusline;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BuslineController extends Controller
{
    /**
     * Display all resources.
     */
    public function index(): JsonResponse
    {
        $buslines = Busline::all();

        return response()->json([$buslines]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusline $request): JsonResponse
    {
        Busline::create($request->validated());

        return response()->json(['message' => __('messages.busline.created')], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Busline $busline): JsonResponse
    {
        return response()->json($busline);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusline $request, Busline $busline): JsonResponse
    {
        $busline->update($request->validated());

        return response()->json(['message' => __('messages.busline.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Busline $busline): JsonResponse
    {
        $busline->delete();

        return response()->json(['message' => __('messages.busline.deleted')]);
    }
}
