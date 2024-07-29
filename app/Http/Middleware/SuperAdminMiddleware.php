<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SuperAdminMiddleware
 *
 * This middleware class allows requests from super administrators to pass through.
 * Requests from super administrators are not restricted and can access protected routes.
 *
 * @package App\Http\Middleware
 */
class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow the request to proceed without any restrictions
        return $next($request);
    }
}
