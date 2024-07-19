<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check for authorization
        $authHeaderValue = $request->header('Authorization');
        $actualValue = str_replace('Bearer ', "", $authHeaderValue);
        if ($actualValue != 'vg@123') {
            throw new HttpResponseException(
                response()->json([
                    'status' => false,
                    'message' => 'Unauthorized.'
                ], 401));
        }

        return $next($request);
    }
}
