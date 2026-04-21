<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckOnboarding
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        
        // Skip onboarding check for onboarding routes and logout
        if ($request->routeIs('onboarding.*') || $request->routeIs('logout')) {
            return $next($request);
        }
        
        // Redirect to onboarding if user hasn't completed it
        if ($user && !$user->onboarding_completed) {
            return redirect()->route('onboarding.gender');
        }
        
        return $next($request);
    }
}