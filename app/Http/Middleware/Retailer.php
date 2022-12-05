<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Retailer
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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::check() && Auth::user()->role == 5){
            return $next($request);
        }

        if(Auth::check() && Auth::user()->role == 1){
            return redirect()->route('admin-dashboard'); 
        }
    }
}
