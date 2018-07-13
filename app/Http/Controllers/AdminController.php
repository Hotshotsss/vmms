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
use App\Purpose;
use Carbon\Carbon;
use Validator;
use DB;
use PDF;
use App;
class AdminController extends Controller
{
  public function home(Request $request){
    $slots = ParkingSlot::all();
    $parkings = Parking::whereNull('time_out')->count();

    return view('admin.home')->with(['slots'=>$slots,'parkings'=>$parkings]);
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

    return view('admin.reports')->with(['cars'=>$car])->with(['day'=>'Filter','param'=>'365']);
  }
  public function reportPDF($param){

    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays($param);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();
      $pdf = App::make('dompdf.wrapper');
      $pdf->setPaper('legal', 'landscape');
      $pdf->loadView('admin.reportPDF',compact('car'));
      return $pdf->stream();
  }
  public function daily(){
    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays(1);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();

    return view('admin.reports')->with(['cars'=>$car])->with(['day'=>'1 Day Ago','param'=>'1']);
  }
  public function weekly(){
    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays(7);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();

    return view('admin.reports')->with(['cars'=>$car])->with(['day'=>'7 Days Ago','param'=>'7']);
  }
  public function monthly(){
    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays(30);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();

    return view('admin.reports')->with(['cars'=>$car])->with(['day'=>'30 Days Ago','param'=>'30']);
  }
  public function yearly(){
    $now = Carbon::now()->subDay();
    $days28 = Carbon::now()->subDays(365);
    $car = Parking::whereNotNull('time_out')->whereBetween('time_out',[$days28,$now])->get();

    return view('admin.reports')->with(['cars'=>$car])->with(['day'=>'365 Days Ago','param'=>'365']);
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

    public function purpose(){
      $slots = Purpose::all();

      return view('admin.purpose')->with(['purpose'=>$slots]);
    }
    public function addPurpose(Request $request){

      Validator::make($request->all(), [
        'purpose' => 'required|unique:purpose|max:155'
        ])->validate();

        $location = new Purpose;
        $location->purpose = $request->purpose;

        $location->save();

        return redirect()->back()->with('success','Parking Purpose Added!');
      }
      public function editPuropose(Request $request){

        $parking = Purpose::find($request->id);

        $parking->purpose = $request->purpose;
        $parking->save();
        return redirect()->back()->with('success','Parking Purpose Edited!');
      }
      public function deletePurpose(Request $request){

        $parking = Purpose::find($request->id)->delete();
        return redirect()->back()->with('success','Parking Purpose Deleted!');
      }

    public function viewSchedule(){
      $users = User::all();

      return view('admin.schedule')->with(['users'=>$users]);
    }

    public function getSched(){
      $sched = EmployeeSchedule::selectRaw('id,user_id,assigned_at,CONCAT(date_from," ",time_in) as start,CONCAT(date_to," ",time_out) as end')->orderBy('assigned_at','asc')->get()->toJson();

      return $sched;
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

      $conflict = $this->checkSchedConflict($request);
      if($conflict->isNotEmpty()){
        return redirect()->back()->withInput()->withErrors(['conflict'=>'Oh no! There is a conflict with the schedule you entered.']);
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

    public function checkSchedConflict($request){
      $in = Carbon::parse($request->from_date.' '.$request->time_in);
      $out = Carbon::parse($request->to_date.' '.$request->time_out);

      $conflict = EmployeeSchedule::where('user_id',$request->user)
      ->where(function ($query) use($in,$out){
        $query->where('date_from','<=',$out->format('Y-m-d'))
        ->where('date_to','>=',$in->format('Y-m-d'))
        ->where('time_in','<=',$out->format('H:i:s'))
        ->where('time_out','>=',$in->format('H:i:s'));
      })->get();

      return $conflict;
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
