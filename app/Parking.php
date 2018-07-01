<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{

  protected $fillable = [
    'car_type_id','location_id','vehicle_model','plate_number','parking_reason','time_in','time_out','penalty','detailed_location','payment_status'
  ];
}
