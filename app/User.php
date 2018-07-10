<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name','type', 'email','username', 'password','temporary_password',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function getNameAttribute($value)
  {
    return ucwords($value);
  }

  public function sched(){
    $now = Carbon::today();
    $time = Carbon::now()->format('H:i');

    return $this->hasOne('App\EmployeeSchedule','user_id','id')
    ->where(function ($query) use($now){
      $query->where('date_from','<=',$now)->where('date_to','>=',$now);
    })->where(function ($query) use($time){
      $query->where('time_in','<=',$time)->where('time_out','>=',$time);
    });
  }
}
