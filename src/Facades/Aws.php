<?php

namespace Laravel\Aws\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;
use Laravel\Aws\Http\Controllers\WebhookController;

class Aws extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'aws';
    }

    /**
     * @param string $path
     */
    public static function routes($path = '/webhook/aws')
    {
        Route::post($path, WebhookController::class);
    }
}
