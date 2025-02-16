<?php

namespace App\Http\Middleware;

use Closure;

class AccountentMiddleware
{

    public function handle($request, Closure $next)
    {

        if(auth()->user()->getLevel() == 2)
            return $next($request);

        return redirect()->back();
    }
}
