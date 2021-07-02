<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Request;

class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Request::is('doctor/*')||Request::is('admin/*')){
                    return route('doctor.login');
           }
                toast('Please Login To continue','error');
                return route('patient.login'); // user


        }

    }
}
