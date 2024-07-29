<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AdminMiddleware
 *
 * @package App\Http\Middleware
 */
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Check if the authenticated user has admin privileges based on their role_id.
     * If the user is an admin, proceed with the request. Otherwise, redirect to the login page with an error message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has a role_id of 1, 2, or 3 (admin privileges)
        if (Auth::check() && in_array(Auth::user()->role_id, [1, 2, 3])) {
            // User has admin privileges, proceed with the request
            return $next($request);
        }

        // User does not have admin privileges, redirect to login page with an error message
        return redirect('/login')->with('error', 'Unauthorized access.');
    }
}
