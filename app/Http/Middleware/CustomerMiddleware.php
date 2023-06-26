<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->user_type == 1) {
            // Jika pengguna adalah admin, redirect ke halaman admin dashboard
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
