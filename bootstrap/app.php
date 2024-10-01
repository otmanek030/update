<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
           'admin' => \App\Http\Middleware\Admin::class,
            'user' => \App\Http\Middleware\User::class,
            'product' => \App\Http\Middleware\Product::class,
            'shop' => \App\Http\Middleware\Shop::class,
            'contact' => \App\Http\Middleware\contact::class,
            'contacts' => \App\Http\Middleware\Admincontact::class,
            'show' => \App\Http\Middleware\Show::class,
            'services' => \App\Http\Middleware\services::class,
            'servicesClient' => \App\Http\Middleware\servicesClient::class,
            'aboutus' => \App\Http\Middleware\aboutus::class,
            'selectedProducts' => \App\Http\Middleware\selectedProducts::class,

        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
