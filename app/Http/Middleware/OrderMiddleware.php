<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $order = $request->route('order');
        if ($user->isAdmin || $order->user_id === $user->id) {
            return $next($request);
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }
}
