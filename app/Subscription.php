<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
  protected $fillable = [
    'plate_number','vehicle_model','car_type_id','vehicle_color','start','end',
  ];
}
