<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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

        if(auth('doctor')->user()->is_admin == 1){
            return $next($request);
        }
        toast("You don't have Admin access.",'error');
        return redirect()->back();

    }
}
