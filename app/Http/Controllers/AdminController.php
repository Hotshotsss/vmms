<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CarType;
use App\Rate;
use App\ParkingSlot;
use Validator;
class AdminController extends Controller
{
  public function home(Request $request){
    return view('admin.home');
  }

  public function settings(Request $request){
    $data = User::all();

    return view('admin.settings')->with('accounts',$data);
  }

  public function viewCar(){

    $types = CarType::all();
    return view('admin.car-type')->with('cars',$types);
  }

  public function addCar(Request $request){

    $newType = new CarType;

    $newType->type = $request->type;
    $newType->save();

    return redirect()->back()->with('success','success');
  }

  public function deleteCar(Request $request){
    $type = CarType::find($request->type_number)->delete();

    return redirect()->back()->with('success','success');
  }


  public function discount(){

    return view('admin.discount');

  }

  public function flatRate(){
    $rate = Rate::all();
    $ids = $rate->pluck('car_id')->all();
    $type = CarType::whereNotIn('id',$ids)->get();
    return view('admin.flatRate')->with(['rate'=>$rate,'type'=>$type]);
  }

  public function addRate(Request $request){

    $rate = new Rate;
    $rate->car_id = $request->car_type;
    $rate->standard_rate = $request->rate;
    $rate->standard_hours = $request->hours;
    $rate->hour_rate = $request->hour_rate;
    $rate->save();

    return redirect()->back();

  }

  public function editRate(Request $request){

    $rate = Rate::find($request->id);
    $rate->standard_rate = $request->rate;
    $rate->standard_hours = $request->hours;
    $rate->hour_rate = $request->hour_rate;
    $rate->save();

    return redirect()->back();

  }

  public function reports(){

    return view('admin.reports');

  }

  public function parking(){
    $slots = ParkingSlot::all();

    return view('admin.parking')->with(['slots'=>$slots]);
  }
  public function addParking(Request $request){

    Validator::make($request->all(), [
      'parking_name' => 'required|unique:parking_locations|max:155'
      ])->validate();

      $location = new ParkingSlot;
      $location->parking_name = $request->parking_name;
      $location->description = $request->description;
      $location->number_of_slots = $request->slots;
      $location->save();

      return redirect()->back()->with('success','Parking Location Added!');
    }

    public function viewSchedule(){
      $users = User::all();

      return view('admin.schedule')->with(['users'=>$users]);
    }
  }
