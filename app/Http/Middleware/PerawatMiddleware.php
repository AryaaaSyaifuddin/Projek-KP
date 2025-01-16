<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PerawatMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && in_array(Auth::user()->role, ['perawat', 'admin'])) {
            return $next($request); // Lanjutkan request jika role sesuai
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
