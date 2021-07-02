<?php

namespace App\Http\Middleware;

use Closure;

class IsComplete
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
        if(auth('doctor')->user()->is_complete == 1){
            return $next($request);
        }else{
            toast("You don't have Complete Register.",'error');
            return redirect()->route('doctor.profile');
        }

    }
}
