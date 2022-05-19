<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->header("api_key")!=="")
        {
            if(User::where("api_key", $request->header("api_key"))->count()===1)
            {
                return $next($request);
            }
        }
        return $next($request);
    }
}
