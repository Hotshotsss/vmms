<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSchedule extends Model
{
  protected $fillable = [
    'assigned_at','user_id','date_from','date_to','repeater'
  ];

}
