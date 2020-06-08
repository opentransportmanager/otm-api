<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait HandlerExceptions
{
    public function apiException($request, $exception): JsonResponse
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json(['error' => 'Model not found'], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['error' => 'Incorrect route'], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['error' => 'Incorrect method'], Response::HTTP_METHOD_NOT_ALLOWED);
        }

        if ($exception instanceof TokenMismatchException) {
            return response()->json(['error' => 'Token mismatch'], Response::HTTP_FORBIDDEN);
        }

        return parent::render($request, $exception);
    }
}
