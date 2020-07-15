<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\StoreUser;
use App\Services\AuthenticationService;
use App\Services\RegistrationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthenticationController extends Controller
{
    /**
     * Login into api
     * @param AuthenticationRequest $request
     * @param AuthenticationService $service
     */
    public function login(AuthenticationRequest $request, AuthenticationService $service): JsonResponse
    {
        $response = $service->createToken($request->validated());

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreUser $request
     * @param RegistrationService $service
     * @param AuthenticationService $authService
     */
    public function register(StoreUser $request, RegistrationService $service, AuthenticationService $authService): JsonResponse
    {
        $service->registerUser($request->validated());
        $response = $authService->createToken($request->validated());

        return response()->json(['message' => __('messages.user.created'), 'authUser' => $response], Response::HTTP_CREATED);
    }
}
