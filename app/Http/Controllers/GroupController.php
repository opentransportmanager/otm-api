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

        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroup $request): JsonResponse
    {
        $this->authorize('manage');
        Group::create($request->validated());

        return response()->json(['message' => __('messages.group.created')], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group): JsonResponse
    {
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroup $request, Group $group): JsonResponse
    {
        $this->authorize('manage');
        $group->update($request->validated());

        return response()->json(['message' => __('messages.group.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group): JsonResponse
    {
        $this->authorize('manage');
        $group->delete();

        return response()->json(['message' => __('messages.group.deleted')]);
    }
}
