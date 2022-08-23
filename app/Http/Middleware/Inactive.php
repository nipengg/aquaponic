<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Inactive
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'inactive')
        {
            return $next($request);
        }
        return redirect('/inactive');
    }
}
