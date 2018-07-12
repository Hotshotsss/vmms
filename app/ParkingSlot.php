<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{

  protected $table = 'parking_locations';

  protected $fillable = [
    'parking_name','description','number_of_slots',
  ];

  public function parked(){
    return $this->hasMany('App\Parking','location_id','id')->whereNull('time_out');
  }

}
