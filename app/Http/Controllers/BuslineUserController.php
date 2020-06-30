<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuslineUser;
use App\Services\BuslineUserService;
use App\User;
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
    public function subscribe(StoreBuslineUser $request, User $user): JsonResponse
    {
        $this->buslineUserService->subscribeBusline($request->validated(), $user);

        return response()->json(['message' => __('messages.busline_user.subscribed')], Response::HTTP_CREATED);
    }

    /**
     * Deleting relations between the Busline and the User
     */
    public function unsubscribe(StoreBuslineUser $request, User $user): JsonResponse
    {
        $this->buslineUserService->unsubscribeBusline($request->validated(), $user);

        return response()->json(['message' => __('messages.busline_user.unsubscribed')], Response::HTTP_CREATED);
    }

    /**
     * Show stations attached to a selected path.
     */
    public function showSubscribedBuslines(User $user): JsonResponse
    {
        $buslines = $this->buslineUserService->showSubscribedBuslines($user);

        return response()->json($buslines);
    }
}
