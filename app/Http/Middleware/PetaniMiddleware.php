<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class PetaniMiddleware
{
    public function handle($request, Closure $next): Response
    {
        if (Auth::user()->role == "petani" || Auth::user()->role =="admin") {
            return $next($request);
        }

        return redirect()->back();
    }
}
