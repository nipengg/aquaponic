<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user() && Auth::user()->role == 'admin')
        {
            return $next($request);
        }
        return redirect('/');
    }
}