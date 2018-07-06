<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{

  protected $table = 'location';
  protected $fillable = [
    'parking_name','description','number_of_slots',
  ];

}
