<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkLogin
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
        if (Auth::guest()==1) {
            return redirect()->route('admin.get.login');
        }
        return $next($request);
    }
}
