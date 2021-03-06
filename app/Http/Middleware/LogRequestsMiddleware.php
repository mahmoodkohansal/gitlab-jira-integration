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
        Log::info('-------------------------------------------- NEW REQUEST --------------------------------------------');
        Log::error('Request Received', ['url' => $request->getRequestUri(), 'params' => $request->all(), 'headers' => $request->headers]);

        return $next($request);
    }
}