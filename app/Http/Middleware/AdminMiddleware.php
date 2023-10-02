<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->usertype === '1') {
             // Debugging: Log or dd() to check user attributes
             //dd($user->usertype, $user->name);
            return $next($request);
        }

        return redirect()->route('home'); // Redirect unauthorized users to a different route.
    }
}