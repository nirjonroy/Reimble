<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Admininfo;
use Auth;
use Session;
use Hash;
class AdminMiddleware
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
        $check = DB::table('admininfos')->where('Is_admin', 1)->get();
        if (!$check){
            return redirect('forbidden');
        }
        return $next($request);
    }
}
