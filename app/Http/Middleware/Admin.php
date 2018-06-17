<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
      if(auth()->check()){
        if(auth()->user()->type == 0){
          return $next($request);
        }
      }
      return redirect('admin')->with('error','You have not admin access');
    }
}
