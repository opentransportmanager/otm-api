<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthenticationController extends Controller
{
    public function login(AuthenticationRequest $request, AuthenticationService $service): JsonResponse
    {
        $response = $service->createToken($request->validated());

        if (!$response) {
            return response()->json(['These credentials do not match our records.'], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json($response, Response::HTTP_OK);
    }
}
