<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
  protected $fillable = [
    'name','address', 'lat','lng', 'type',
  ];
}
