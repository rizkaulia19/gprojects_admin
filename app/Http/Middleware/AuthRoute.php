<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRoute
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('logon')) {
            return $next($request);
        }
        return redirect('/login');
    }
}
