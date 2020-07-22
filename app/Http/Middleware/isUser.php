<?php

namespace App\Http\Middleware;

use Closure;

class isUser
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
        if(auth()->user()->type != 2){
            if (auth()->user()->type == 0) {
                return redirect('/superadmin/home');
            }
            return $next($request);
        } else {
            return redirect('/home');
        }
    }
}
