<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CacheController {

    public function clearCache(Request $request) {
        
        $password = $request->query('password');
        $envPassword = env('CLEAR_CACHE_PASSWORD');

        if ($password !== $envPassword) {
            return response('Unauthorized.', 401);
        }

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');

        return response('Cache cleared!', 200);
    }
}