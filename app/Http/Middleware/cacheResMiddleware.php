<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Cache;

class cacheResMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header('Cache-Control','max-age = 86400');

        return $response;
    }


}
