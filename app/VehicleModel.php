<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VehicleModel extends Model
{

  use Notifiable;


  protected $fillable = [
    'id','model',
  ];

}
