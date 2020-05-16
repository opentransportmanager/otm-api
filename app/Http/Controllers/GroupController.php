<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class GroupController extends Controller
{
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
     * @param  \App\Group  $group
     */
    public function show(Group $group): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     */
    public function update(Request $request, Group $group): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Group  $group
     */
    public function destroy(Group $group): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
}
