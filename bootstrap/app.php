<?php

use App\Common\Tools\APIResponse;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ValidationException $e) {
            $response = [
                'status' => ResponseAlias::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $e->getMessage()
            ];
            return APIResponse::errorResponse($response, 'Error request.', $response['status']);
        });

        $exceptions->render(function (Throwable $e) {
            $response = [
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ];

            return APIResponse::errorResponse($response, 'Error request.', $response['status']);
        });
    })->create();
