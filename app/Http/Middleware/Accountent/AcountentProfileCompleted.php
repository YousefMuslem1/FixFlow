<?php

namespace App\Http\Middleware\Accountent;

use App\Accountent;
use Closure;

class AcountentProfileCompleted
{

    public function handle($request, Closure $next)
    {
        $accountant = Accountent::where('user_id', '=', auth()->user()->id)->first();
        if($accountant->name != null || $accountant->address != null || $accountant->email != null ||
            $accountant->bank_name != null || $accountant->iban != null || $accountant->iban_name != null)
            return redirect(route('accountent.home'));
        return $next($request);
    }
}
