<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingViolation extends Model
{
  protected $fillable = [
      'id', 'parking_id', 'violation_id',
  ];

public function violation_name(){
  return $this->hasOne('App\Violation','id','violation_id');
}

}
