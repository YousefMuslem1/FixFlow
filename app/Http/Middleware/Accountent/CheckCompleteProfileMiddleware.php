<?php

namespace App\Http\Middleware\Accountent;

use App\Accountent;
use App\User;
use Closure;

class CheckCompleteProfileMiddleware
{

    public function handle($request, Closure $next)
    {
        $accountant = Accountent::where('user_id', '=', auth()->user()->id)->first();
        if($accountant->name === null || $accountant->address == null || $accountant->email == null ||
            $accountant->bank_name == null || $accountant->iban == null || $accountant->iban_name == null)
            return redirect(route('accountent.complete-profile'))->with('errorComplete', 'You Must Complete Your Profile Firstly!!');
        return $next($request);
    }
}
