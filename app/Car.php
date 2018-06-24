<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Car extends Authenticatable
{
    use Notifiable;
    protected $table = 'car_tbl';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'car_plate', 'vehicle_model', 'vehicle_type', 'vehicle_flatrate', 'vehicle_flathour', 'vehicle_reason', 'vehicle_timein',  'vehicle_timeout', 'vehicle_hours', 'vehicle_penalty', 'vehicle_total', 'vehicle_location', 'payment_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
