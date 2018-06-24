<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
  protected $fillable = [
    'type',
  ];

  public function getTypeAttribute($value){
    return ucwords($value);
  }
}
