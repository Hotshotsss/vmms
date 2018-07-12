<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers\TransHelper as Transearly;
class EmployeeSchedule extends Model
{
  protected $fillable = [
    'assigned_at','user_id','date_from','date_to','repeater'
  ];
  protected $appends = ['sched_title'];


  public function getSchedTitleAttribute($value){
    return $this->user->name.' - '.Transearly::assign($this->assigned_at);
  }

  public function user(){
    return $this->hasOne('App\User','id','user_id');
  }
}
