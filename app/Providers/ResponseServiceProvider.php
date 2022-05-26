<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        if (!defined('LARAVEL_START')) {
            define('LARAVEL_START', microtime(true));
        }

        Response::macro('success', function ($data = [], $code = 200, $message = 'OK') use ($factory) {
            return $factory->json([
                'msg' => $message,
                'success' => true,
                'data' => $data,
                'exceptions' => null,
                'time_execution' => microtime(true) - LARAVEL_START,
            ], $code);
        });
    }
}
