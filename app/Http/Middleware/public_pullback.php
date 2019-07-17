<?php

namespace App\Http\Middleware;

use Closure;

class public_pullback
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
        if($request->session()->get('public_name')!= null){
            return redirect('/public');
        }
        return $next($request);
    }
}
