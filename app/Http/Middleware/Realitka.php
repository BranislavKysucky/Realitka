<?php

namespace App\Http\Middleware;

use Closure;

class Realitka
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
        if(Auth::check()&& Auth::user()->rola==2){
            return $next($request);
        }
        return redirect('/');

    }
}
