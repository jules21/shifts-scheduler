<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // return redirect('/home');
            // Check user role
            switch (Auth::user()->role->name) {
                case 'manager':
                    return redirect('/manager/dashboard');
                    break;

                case 'employee':
                    return redirect('/user/dashboard');
                    break;

                default:
                    return '/home';
                    break;
            }

        }

        return $next($request);
    }
}
