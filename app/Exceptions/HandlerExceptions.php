<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

trait HandlerExceptions
{
    public function apiException(Request $request, Throwable $exception): Response
    {
        if ($exception instanceof ModelNotFoundException) {
            return response(['message' => 'Model not found'], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response(['message' => 'Incorrect route'], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response(['message' => 'Incorrect method'], Response::HTTP_METHOD_NOT_ALLOWED);
        }

        if ($exception instanceof TokenMismatchException) {
            return response(['message' => 'Token mismatch'], Response::HTTP_FORBIDDEN);
        }
    }
}
