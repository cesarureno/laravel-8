<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (\Exception $e, $request) {
            return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => method_exists($e, 'errors') ? $e->errors() : $e->getMessage(),
                ],
                'exception' => [
                    'msgError' => $e->getMessage(),
                ],
                "time_exec" => microtime(true) - LARAVEL_START
            ], 404);
        });
    }

    /**
     * Convert a validation exception into a JSON response.
     *
     * @param  Request  $request
     * @param ValidationException $exception
     * @return JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception): JsonResponse
    {
        return response()->json([
            'msg' => 'BAD',
            'success' => false,
            'data' => [
                'msgError' => $exception->errors()
            ],
            'exception' => [
                'msgError' => $exception->getMessage(),
            ],
            "time_exec" => microtime(true) - LARAVEL_START
        ], $exception->status);
    }
}
