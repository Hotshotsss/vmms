<?php

namespace App\Http\Middleware;

use Closure;

class Gate
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
      if(auth()->user()->type == 1){
        if(session('user_type') != 1){  
          return $next($request);
        }
      }
    }
    return redirect('/')->with('error','You have not gate access');
  }
}
