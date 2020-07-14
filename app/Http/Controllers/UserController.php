<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Lists all resources.
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return response()->json([$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return response()->json(['message' => __('messages.user.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(['message' => __('messages.user.deleted')]);
    }
}
