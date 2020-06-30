<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuslineSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BuslineSubscriptionController extends Controller
{
    /**
     * Creating relations between the User and the Busline
     */
    public function subscribe(StoreBuslineSubscription $request): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Deleting relations between the User and the Busline
     */
    public function unsubscribe(StoreBuslineSubscription $request): JsonResponse
    {
        return response()->json([], Response::HTTP_NOT_IMPLEMENTED);
    }
}
