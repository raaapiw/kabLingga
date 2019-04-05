<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
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
        if(Sentinel::check())
            if(Sentinel::getUser()->roles()->first()->slug == 'superAdmin')
                return $next($request);
            else
                return abort(404);
        else
            return redirect()->route('login');
    }
}
