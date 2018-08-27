<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VehicleModel extends Model
{

  use Notifiable;
  protected $table = 'vehicle_model';

  protected $fillable = [
    'id','model',
  ];

}
