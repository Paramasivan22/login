<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the specific email or ID (for your single user)
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return $next($request);
        }

        // Redirect if the user is not the admin
        return redirect('/login')->with('error', 'You do not have admin access.');
    }
}
