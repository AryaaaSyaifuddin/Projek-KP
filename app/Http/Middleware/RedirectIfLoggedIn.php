<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Redirect user if logged in
            return redirect('/dashboard')->with('error', 'Log out terlebih dahulu'); // Ganti '/dashboard' dengan rute tujuan setelah login
        }

        return $next($request);
    }
}
