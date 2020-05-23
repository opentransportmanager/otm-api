<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StoreGroup;
use App\Http\Requests\UpdateGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GroupController extends Controller
{
    /**
     * Lists all resources.
     */
    public function index(): JsonResponse
    {
        $groups = Group::all();

        return response()->json($groups, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroup $request): JsonResponse
    {
        Group::create($request->validated());

        return response()->json(['message' => 'Group created successfully'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group): JsonResponse
    {
        return response()->json($group, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroup $request, Group $group): JsonResponse
    {
        $group->update($request->validated());

        return response()->json(['message' => 'Group updated succesfully'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group): JsonResponse
    {
        return response()->json([], Response::HTTP_OK);
    }
}
