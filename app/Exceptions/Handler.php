<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    use HandlerExceptions;

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception): Response
    {
        try {
            $error = $this->apiException($exception);

            return response($error, $error->getStatusCode());
        } catch (Throwable $e) {
            return parent::render($request, $exception);
        }
    }
}
