<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuslineUser;
use App\Services\BuslineUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;

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
        $busline = $request->validated();
        $user = $request->user();
        $this->buslineUserService->subscribeBusline($busline, $user);

        return response()->json(['message' => __('messages.busline_user.subscribed')], Response::HTTP_CREATED);
    }

    /**
     * Deleting relations between the Busline and the User
     */
    public function unsubscribe(StoreBuslineUser $request): JsonResponse
    {
        $busline = $request->validated();
        $user = $request->user();
        $this->buslineUserService->unsubscribeBusline($busline, $user);

        return response()->json(['message' => __('messages.busline_user.unsubscribed')], Response::HTTP_CREATED);
    }

    /**
     * Shows Buslines subscribed by current User.
     */
    public function userSubscribedBuslines(Request $request): JsonResponse
    {
        $user = $request->user();
        $buslines = $this->buslineUserService->userSubscribedBuslines($user);

        return response()->json($buslines);
    }
}
