<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UsersMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && in_array(Auth::user()->role, ['perawat', 'admin', 'dokter'])) {
            return $next($request); // Lanjutkan request jika role sesuai
        }

        return redirect('/')->with('error', 'Anda harus login terlebih dahulu.');
    }
}
