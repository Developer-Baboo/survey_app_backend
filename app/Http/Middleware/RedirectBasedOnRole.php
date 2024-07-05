<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && ($user->hasRole('admin') || $user->hasRole('super admin'))) {
            return redirect()->route('dashboard'); // Replace with your dashboard route
        }

        return $next($request);
    }


   /*  public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/dashboard'); // Redirect authenticated users away from the login page
        }

        return $next($request);
    } */
}
