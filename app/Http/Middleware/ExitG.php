<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Helpers\TransHelper as Transearly;
class ExitG
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
    if(session('user_type') == 3){
      return $next($request);
    }
    return redirect(Transearly::redirect(session('user_type')));
  }
}
