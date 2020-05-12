<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;

/**
 * Class LogRequestsMiddleware
 * @package App\Http\Middleware
 */
class LogRequestsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::info('Request Received', $request->all());

        return $next($request);
    }
}