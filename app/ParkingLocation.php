<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingLocation extends Model
{
  protected $fillable = [
      'id', 'parking_id', 'location_id',
  ];

public function location_name(){
  return $this->hasOne('App\Location','id','location_id');
}

}
