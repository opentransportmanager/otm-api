<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait HandlerExceptions
{
    public function apiException($exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                    'error' => 'Model not found',
                ], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                    'error' => 'Incorect route',
                ], Response::HTTP_NOT_FOUND);
        }
    }
}
