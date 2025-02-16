<?php

namespace App\Http\Middleware\Manager;

use App\PublicCompany;
use App\PublicManager;
use Closure;

class CheckCompanyCapitalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->type == 2) {
            $manager = PublicManager::where('user_id', '=', auth()->user()->id)->first();
            $company =  PublicCompany::select('comp_capital')->where('id', '=', $manager->public_company_id)->first();
            if($company->comp_capital == null)
                session()->flash('message','You Must Complete All Information, Call With Your Accountant For More Details!');
        }
        return $next($request);
    }
}
