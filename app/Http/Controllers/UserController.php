<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Services\RegistrationService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Lists all resources.
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUser $request, RegistrationService $service): JsonResponse
    {
        $response = $service->registerUser($request->validated());

        if (!$response) {
            return response()->json(['These credentials do not match our records.'], Response::HTTP_FORBIDDEN);
        }

        return response()->json(['message' => __('messages.user.created')]);
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
    public function destroy(): JsonResponse
    {
        return response()->json(['message' => __('messages.user.deleted')]);
    }
}
