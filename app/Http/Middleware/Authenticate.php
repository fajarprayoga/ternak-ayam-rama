<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if(auth()->guard('web')->check()) {
            return redirect('/');
        }

        else if(auth()->guard('anak_kandang')->check()) {
            return redirect('/subadmin');
        }

        else {
            return route('login');
        }

    }
}
