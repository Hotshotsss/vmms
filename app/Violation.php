<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use Notifiable;
    protected $table = 'violation';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'violation', 'penalty',
    ];


}
