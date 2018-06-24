<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
  protected $fillable = [
    'car_id','standard_rate','standard_hours','hour_rate',
  ];

  public function car(){
    return $this->hasOne('App\CarType','id','car_id');
  }
}
