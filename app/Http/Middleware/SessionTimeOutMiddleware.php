<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeOutMiddleware
{

    public function handle($request, Closure $next)
    {
        if(!Auth::check()) return redirect(route('login'));
        else if(Auth::user()->getLevel() === 1) return redirect(route('admin.home'));
        else if(Auth::user()->getLevel() === 2) return redirect(route('accountent.home'));
        else if(Auth::user()->getLevel() === 3) return redirect(route('manager.home'));

        return $next($request);
    }
}
