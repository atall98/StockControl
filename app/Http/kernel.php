<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{


   

    protected $routeMiddleware = [
        // autres middlewares...
        'admin' => \App\Http\Middleware\Admin::class, // Enregistrement de votre middleware admin
        
        'guest' => \App\Http\Middleware\GuestMiddleware::class,
    ];

    
    
}
