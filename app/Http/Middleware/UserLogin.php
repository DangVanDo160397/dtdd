<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UserLogin
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
        if(!Auth::guard('customer')->check()){
            return redirect()->route('customer.get.login');
        }
            return $next($request); 
    }
}
