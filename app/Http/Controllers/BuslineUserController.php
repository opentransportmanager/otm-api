<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuslineUser;
use App\Services\BuslineUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BuslineUserController extends Controller
{
    public function __construct(BuslineUserService $buslineUserService)
    {
        $this->buslineUserService = $buslineUserService;
    }

    /**
     * Creating relations between the Busline and the User
     */
    public function subscribe(StoreBuslineUser $request): JsonResponse
    {
        $this->buslineUserService->subscribeBusline($request->validated());

        return response()->json(['message' => __('messages.busline_user.subscribed')], Response::HTTP_CREATED);
    }

    /**
     * Deleting relations between the Busline and the User
     */
    public function unsubscribe(StoreBuslineUser $request): JsonResponse
    {
        $this->buslineUserService->unsubscribeBusline($request->validated());

        return response()->json(['message' => __('messages.busline_user.unsubscribed')], Response::HTTP_CREATED);
    }

    /**
     * Shows Buslines subscribed by current User.
     */
    public function userSubscribedBuslines(): JsonResponse
    {
        $buslines = $this->buslineUserService->userSubscribedBuslines();

        return response()->json($buslines);
    }
}
