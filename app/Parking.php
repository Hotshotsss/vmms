<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{

  protected $fillable = [
    'car_type_id','location_id','vehicle_model','plate_number','parking_reason','time_in','time_out','violation','penalty','detailed_location','payment_status'
  ];

  public function violations(){
    return $this->hasMany('App\ParkingViolation');
  }

  public function location(){
    return $this->hasOne('App\ParkingSlot','id','location_id');
  }

// $parking->location->parking_name;
//

}
