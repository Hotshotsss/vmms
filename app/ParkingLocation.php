<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ParkingLocation extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'location_id', 'parking_name', 'description', 'number_of_slots', 'location', 'created_at', 'updated_at',
    ];


}
