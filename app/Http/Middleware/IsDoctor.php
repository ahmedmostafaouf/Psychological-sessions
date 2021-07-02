<?php

namespace App\Http\Middleware;

use Closure;

class IsDoctor
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
        if(auth('doctor')->user()->is_admin == 0){
            return $next($request);
        }
        toast("You don't have Doctor access.",'error');
        return redirect()->back();
    }
}
