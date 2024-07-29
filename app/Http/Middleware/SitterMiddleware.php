<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SitterMiddleware
 *
 * This middleware class allows requests from users with sitter privileges (role_id 5) to pass through.
 * If the user is not authenticated or does not have the required role, they will be redirected to the login page with an error message.
 *
 * @package App\Http\Middleware
 */
class SitterMiddleware
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
        // Check if the user is authenticated and has the sitter role (role_id 5)
        if (Auth::check() && Auth::user()->role_id === 5) {
            return $next($request);
        }

        // Redirect to the login page with an error message for unauthorized access
        return redirect('/login')->with('error', 'Unauthorized access.');
    }
}
