<?php

namespace App\Http\Middleware;

use Closure;

class Login
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('user')) {
            return redirect()->route((''));
        }

        return $next($request);
    }
}
