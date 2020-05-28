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

        return response()->json($users, Response::HTTP_OK);
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

        return response()->json(['message' => 'User created successfully'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return response()->json(['message' => 'User updated succesfully'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
}
