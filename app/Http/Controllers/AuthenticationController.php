<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthenticationController extends Controller
{
    /**
     * @param AuthenticationRequest $request
     * @param AuthenticationService $service
     */
    public function login(AuthenticationRequest $request, AuthenticationService $service): JsonResponse
    {
        $response = $service->createToken($request->validated());

        return response()->json($response, Response::HTTP_OK);
    }
}
