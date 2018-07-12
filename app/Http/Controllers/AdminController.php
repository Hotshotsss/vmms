<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CarType;
use App\Violation;
use App\Rate;
use App\Parking;
use App\ParkingSlot;
use App\EmployeeSchedule;
use Carbon\Carbon;
use Validator;
class AdminController extends Controller
{
  public function home(Request $request){
    $slots = ParkingSlot::all();
    // $parkings = Parking::where('time_out',null)->get();

    return view('admin.home')->with(['slots'=>$slots]);
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

  public function viewViolations(){

    $violation = Violation::all();
    return view('admin.add-Violation')->with('violations',$violation);
  }

  public function adminAddViolation(Request $request){

    $newViolation = new Violation;

    $newViolation->violation = $request->violation;
    $newViolation->penalty = $request->penalty;
    $newViolation->save();

    return redirect()->back()->with('success','success');
  }

  public function adminDeleteViolation(Request $request){
    $type = Violation::find($request->type_number)->delete();

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
    $car = Parking::whereNotNull('time_out')->get();

    return view('admin.reports')->with(['cars'=>$car])->with('day','Filter');
  }
  public function daily(){
    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays(1);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();

    return view('admin.reports')->with(['cars'=>$car])->with('day','1 Day Ago');
  }
  public function weekly(){
    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays(7);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();

    return view('admin.reports')->with(['cars'=>$car])->with('day','7 Days Ago');
  }
  public function monthly(){
    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays(30);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();

    return view('admin.reports')->with(['cars'=>$car])->with('day','30 Days Ago');
  }
  public function yearly(){
    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays(365);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();

    return view('admin.reports')->with(['cars'=>$car])->with('day','365 Days Ago');
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
    public function editParking(Request $request){

      $parking = ParkingSlot::find($request->id);

      $parking->description = $request->description;
      $parking->number_of_slots = $request->slots;
      $parking->save();
      return redirect()->back()->with('success','Parking Location Edited!');
    }
    public function deleteParking(Request $request){

      $parking = ParkingSlot::find($request->id)->delete();
      return redirect()->back()->with('success','Parking Location Deleted!');
    }

    public function viewSchedule(){
      $users = User::all();

      return view('admin.schedule')->with(['users'=>$users]);
    }

    public function addSchedule(Request $request){
      $at = $request->sched_btn;

      if($at == "2"){
        if($request->has('gate_loc')){
          $at = $request->gate_loc;
        }
        else{
          return redirect()->back()->with(['error','Somethings wrong with your input!']);
        }
      }

      $sched = new EmployeeSchedule;
      $sched->user_id = $request->user;
      $sched->assigned_at = $at;
      $sched->date_from = Carbon::parse($request->from_date)->format('Y-m-d');
      $sched->date_to = Carbon::parse($request->to_date)->format('Y-m-d');
      $sched->time_in = $request->time_in;
      $sched->time_out = $request->time_out;
      $sched->save();

      return redirect()->back()->with('success','Schedule Added!');
    }

    public function deleteUser(Request $request){
      $user = User::find($request->delete)->delete();

      return redirect()->back()->with('success','User Deleted!');
    }

    public function editUser(Request $request){
      $user = User::find($request->edit);

      $user->type = $request->type;
      $user->name = $request->name;
      $user->username = $request->username;
      $user->save();

      return redirect()->back()->with('success','User Updated!');
    }

    public function editPassword(Request $request){

      $validator = Validator::make($request->all(), [
          'password' => 'required|string|min:6|confirmed',
      ]);

        if ($validator->fails()) {
          return redirect()->back()->withInput()->withErrors($validator,'password');
        }

      $user = User::find($request->change);

      $user->password = Hash::make($request->password);
      $user->save();

      return redirect()->back()->with('success','Password Updated!');
    }

    public function viewTotalSlots(){
      $slots = ParkingSlot::all();

      return view('admin.home')->with(['slots'=>$slots]);
    }
  }
