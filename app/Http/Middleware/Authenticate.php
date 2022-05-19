<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if(!Auth::check())
        {
            $request->session()->invalidate();
            $request->session()->flush();
            $request->session()->regenerate();
            return route('get.login');
        }
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
    }
}
