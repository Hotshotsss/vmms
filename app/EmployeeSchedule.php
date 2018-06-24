<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSchedule extends Model
{
  protected $fillable = [
    'user_id','from','to','time_in','time_out','repeater';
  ];
}
