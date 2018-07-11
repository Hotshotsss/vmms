<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\EmployeeSchedule;
use App\Http\Helpers\TransHelper as Transearly;

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
      $type = auth()->user()->type;
      if( $type == 0)
      {
        return redirect('/admin/home');
      }else{
        return $this->checkSched();
      }
    }
    return $next($request);
  }

  public function checkSched(){
    $now = Carbon::today();
    $time = Carbon::now()->format('H:i');

    $sched = EmployeeSchedule::where('user_id',auth()->user()->id)
    ->where(function ($query) use($now){
      $query->where('date_from','<=',$now)->where('date_to','>=',$now);
    })->where(function ($query) use($time){
      $query->where('time_in','<=',$time)->where('time_out','>=',$time);
    })->first();

    if($sched){
      return redirect(Transearly::redirect($sched->assigned_at));
    }else{
      Auth::logout();
      return redirect('/');
    }
  }
}
