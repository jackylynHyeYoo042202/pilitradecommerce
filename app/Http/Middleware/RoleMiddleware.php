<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated and their role matches
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/'); // Redirect to home or an unauthorized page
        }

        return $next($request);
    }
}

