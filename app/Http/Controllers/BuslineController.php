<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Busline;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class BuslineController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Display the specified resource.
     * @param  \App\Busline  $busline
     */
    public function show(Busline $busline): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Busline  $busline
     */
    public function update(Request $request, Busline $busline): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Busline  $busline
     */
    public function destroy(Busline $busline): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
}
