<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          $type = auth()->user()->type ;
          if( $type == 0)
          {
              return redirect('/admin/home');
          }else if($type == 1){
              return redirect('/gate/home');
          }else{
            return redirect('/monitor/home');
          }
        }

        return $next($request);
    }
}
