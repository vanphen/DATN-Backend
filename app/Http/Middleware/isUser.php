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
        switch (auth()->user()->type) {
            case 0:
                $strFind = strpos($request->route()->getName(), 'superadmin');
                if ($strFind === false) {
                    return redirect('superadmin/'); 
                } else {
                    return $next($request);
                }
                break;
            case 1:
                $strFind = strpos($request->route()->getName(), 'admin');
                if ($strFind === false) {
                    return redirect('admin/'); 
                } else {
                    return $next($request);
                }
                break;
            case 2:
                $strFind = strpos($request->route()->getName(), 'user');
                if ($strFind === false) {
                    return redirect('/home'); 
                } else {
                    return $next($request);
                }
              break;
            default:
        }
    }
}
