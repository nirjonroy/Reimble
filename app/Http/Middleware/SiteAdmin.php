<?php

namespace App\Http\Middleware;

use Closure;
use App\Admininfo;
use Auth;
class SiteAdmin
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin-log');
        }
    }
}
