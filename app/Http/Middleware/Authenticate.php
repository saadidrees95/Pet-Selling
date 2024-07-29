<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

/**
 * Class Authenticate
 *
 * This middleware class handles authentication for requests.
 *
 * @package App\Http\Middleware
 */
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * If the request expects JSON, returns null to handle the unauthorized response in JSON format.
     * Otherwise, redirects the user to the login route.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        // If the request expects JSON response, return null to handle unauthorized response in JSON format
        return $request->expectsJson() ? null : route('login');
    }
}
