<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{

  protected $fillable = [
    'car_type_id','location_id','vehicle_model','vehicle_color','hospital_proof','remarks','plate_number','parking_reason','time_in','time_out','violation','penalty','detailed_location','payment_status'
  ];

  public function violations(){
    return $this->hasMany('App\ParkingViolation');
  }

  public function location(){
    return $this->hasOne('App\ParkingSlot','id','location_id');
  }

  public function getSameDayParkings($value){
    return $this->where('plate_number', $this->plate_number)
   ->where('time_out','!=',null)
   ->where(DB::raw('date_format(time_out,"%d-%m-%Y")'),Carbon::today()->format('d-m-Y'))->get();
  }

  public function color(){
    return $this->hasOne('App\Colors','id','color_id');
  }

  public function carRate(){
    return $this->hasOne('App\Rate','car_id','car_type_id');
  }

  public function carType(){
    return $this->hasOne('App\CarType','id','car_type_id');
  }

  public function inPurpose(){
    return $this->hasOne('App\Purpose','id','parking_reason');
  }

}
