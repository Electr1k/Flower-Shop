<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $user_from_url = $request->route('user');
        if ($user->isAdmin || $user_from_url->id === $user->id) {
            return $next($request);
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }
}
