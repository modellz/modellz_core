<?php

namespace App\Http\Middleware;

use Closure;

class public_admin
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
        if(session()->get('public_role')!= 'SUPER_ADMIN'){
            return redirect('/public');
        }
        return $next($request);
    }
}
