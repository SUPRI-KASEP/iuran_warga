<?php

namespace App\Http\Middleware;

use Closure;

class ChekLogin
{
    public function handle($request, Closure $next, $role)
    {
        if (session('user_level') !== $role) {
            abort(403, 'Anda tidak punya akses ke halaman ini.');
        }
        return $next($request);
    }
}
