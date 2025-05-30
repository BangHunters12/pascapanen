<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    public function handle($request, Closure $next): Response
    {
        // dd(vars: Auth::user()->role);

        if (Auth::user()->role == "admin") {

            return $next($request);
        }

        return redirect()->back();
    }
}
