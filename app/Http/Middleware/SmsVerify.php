<?php

namespace App\Http\Middleware;

use Closure;

class SmsVerify
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
        if(Auth::user()->active == '1'){
            return $next($request);
        }else{
            return redirect('/sms/verify');
        }

    }
}