<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GroupController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
}
