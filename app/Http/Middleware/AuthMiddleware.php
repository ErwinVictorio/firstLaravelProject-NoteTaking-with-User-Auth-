<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // list of allowes routes without login
        $allowedRoutes = [
           'auth.register',
           'auth.login',
           'register'
        ];


        // set the condation
        if (!Auth::check() && !in_array($request->route()->getName(), $allowedRoutes)) {
            return redirect()->route('auth.login')->with('error', 'please loged in your account!');
    }

        return $next($request);
    }
}
