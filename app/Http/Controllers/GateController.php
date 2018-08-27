<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
// use App\Car;
use App\ParkingSlot;
use App\CarType;
use App\Colors;
use App\Purpose;
use App\Parking;
use App\EmployeeSchedule;
use App\Subscription;
use App\VehicleModel;
use Carbon\Carbon;
use PDF;
use App;
use Auth;
use DB;
class GateController extends Controller
{
  public function indexGate(){
    $data = User::find(1);
    // dd($data);
    $data->name = "Joyce sAnn";
    $data->save();

    return view('gate.test')->with('data_view',$data);
  }
  public function Home(){
    return view('admin.home');
  }

  public function AddParkLocation(){
    return view('admin.AddParkingLocation');
  }

  public function AddCar(){
    return view('admin.AddCarType');
  }

  public function UserSets(){

    $data = Account::all();

    return view('admin.UserSettings')->with('accounts',$data);
  }

  public function RateSets(){
    return view('admin.RateSettings');
  }

  public function Reports(){

    return view('admin.ViewReports');

  }

  public function Discount(){

    return view('admin.Discount');

  }

  public function FlatRate(){

    return view('admin.FlatRate');

  }

  public function insertGate(Request $request){

    // $newUser = new User();
    // $newUser->name = $request->name;
    // $newUser->email = $request->email;
    // $newUser->password = Hash::make($request->password);
    // $newUser->save();

  }

  public function generate_pdf() {

    $pdf = App::make('dompdf.wrapper');
    $customPaper = array(0,0,230,300);
    $pdf->setPaper($customPaper);
    $pdf->loadView('gate.PDF');
    return $pdf->stream();
  }

  public function menu(){
    return view('gate.home');
  }

  public function vehicleIn(){
    $data = CarType::all();
    $purposes = Purpose::all();
    $slots = ParkingSlot::all();
    $models = VehicleModel::all();
    $parkings = Parking::whereNull('time_out')->count();

    return view('gate.VehicleIn')->with(['vehicle'=>$data,'purpose'=>$purposes,'slots'=>$slots,'model'=>$models,'parkings'=>$parkings]);
  }

  public function addIn(Request $request){
    $sticker = $request->sticker == null ? 0 : 1;
    if($sticker){
      $subscribed = Subscription::where('plate_number',Input::get("txt-plate"))->first();
      if($subscribed){
        $car = new Parking;
        $car->has_sticker = 1;
        $car->car_type_id = $subscribed->car_type_id;
        $car->vehicle_model = $subscribed->vehicle_model;
        $car->plate_number = strtoupper(Input::get("txt-plate"));
        $car->parking_reason = 4;
        $car->time_in = Carbon::now();
        $car->vehicle_color = $subscribed->vehicle_color;
        $car->save();
        return redirect()->back();
      }else{
        return redirect()->back()->with('error','We cannot find the plate number on our list of vehicles with sticker. Please try again.');
      }
    }else{
      $car = new Parking;
      $car->plate_number = strtoupper(Input::get("txt-plate"));
      $car->vehicle_model = Input::get("txt-model");
      $car->parking_reason = Input::get("txt-purpose");
      $car->car_type_id = Input::get("txt-vehicletype");
      $car->time_in = Carbon::now();
      $car->hospital_proof = 0;
      $car->save();
      return redirect()->back();
    }
  }

  public function vehicleOutView(){
    $data = Parking::where('time_out',null)->get();

    return view('gate.VehicleOut')->with('car',$data);
  }

  public function vehicleMonitoringIn(Request $request){
    if($request->param){
      if(urldecode($request->param) == 'With Sticker'){
        $carin = Parking::where('has_sticker',1)->where('time_out',null)->get();
      }else{
        $carin = Parking::whereNull('has_sticker')->orWhere('has_sticker',0)->where('time_out',null)->get();
      }
    }else{
      $carin = Parking::all()->where('time_out',null); //Parking
    }

    return view('gate.VehicleMonitoringIn')->with('carin',$carin);
  }

  public function vehicleMonitoringOut(Request $request){
    // $today = Carbon::now()->startOfDay();
    if($request->param){
      if(urldecode($request->param) == 'With Sticker'){
        $carout = Parking::where('has_sticker',1)->whereNotNull('time_out')->get();
      }else{
        $carout = Parking::whereNull('has_sticker')->orWhere('has_sticker',0)->whereNotNull('time_out')->get();
      }
    }else{
      $carout = Parking::whereNotNull('time_out')->get(); //Parking
    }
    return view('gate.VehicleMonitoringOut')->with('carout',$carout);
  }

  public function vehicleMonitoringID(Request $request){

    $carID = Car::where('car_id',$car_id)->first();

    return redirect()->back();
  }

  public function checkOutData($id){
    $data = Parking::where('id',$id)->with('violations.violation_name','location')->first();

    $total = $this->calculatePayments($data);

    return json_encode(array_merge($data->toArray(),$total));
  }

  public function updateParking(Request $request){
    $data = Parking::find($request->out);
    $proof = $request->hospital_proof == null ? 0 : 1;
    $data->time_out = Carbon::now();
    $data->hospital_proof = $proof;

    $total = $this->calculatePayments($data);
    $data->payment_status = $total['amount'];
    $data->save();

    $pdf = App::make('dompdf.wrapper');
    $customPaper = array(0,0,230,300);
    $pdf->setPaper($customPaper);
    $pdf->loadView('gate.PDF',compact('data','total'));

    return $pdf->stream();
  }



  public function calculatePayments($value){
    $time_out = Carbon::parse($value->time_out);

    if($value->parking_reason == 1 && $value->hospital_proof){
      $days = $time_out->diffInDays($value->time_in);
      $penalty = $value->violations->sum('violation_name.penalty');
      $amount = (25 * $days) + $penalty ;

      return ["standard_hours"=>24,"standard_rate"=>25,"per_hour"=>0,'amount'=>$amount,'duration'=>$days.' day(s)',"penalty"=>$penalty,'discount'=>'Hospital','hours'=>'hours'];
    }else if($value->parking_reason == 2 || $value->parking_reason == 3){//add delivery
      $minutes = $time_out->diffInMinutes($value->time_in);
      if($minutes < 16){
        $penalty = $value->violations->sum('violation_name.penalty');
        $total = 0 + $penalty;
        return ["standard_hours"=>15,"standard_rate"=>0,"per_hour"=>0,'amount'=>0,'duration'=>$minutes.' minute(s)',"penalty"=>$penalty,'discount'=>'Drop by/Delivery','hours'=>'minutes'];
      }else{
        return $this->normalCalculate($value);
      }
    }else{
      return $this->normalCalculate($value);
    }
  }

  public function normalCalculate($value){
    //check if its there that day
    $time_out = Carbon::parse($value->time_out);

    $check = Parking::where('plate_number',$value->plate_number)
    ->where('time_out','!=',null)
    ->where(DB::raw('date_format(time_out,"%d-%m-%Y")'),Carbon::today()->format('d-m-Y'))->get();

    $hours = ceil($time_out->diffInMinutes($value->time_in) / 60);
    $violations = $value->violations;
    $car_rate = $value->carRate;
    $standard_hours = 0;
    $standard_rate = 0;
    $hourly_rate = 0;

    if($car_rate){
      $standard_hours = $car_rate->standard_hours;
      $standard_rate = $car_rate->standard_rate;
      $hourly_rate = $car_rate->hour_rate;
    }

    if($check->isNotEmpty()){
      $hours2 = 0;
      foreach ($check as $val) {
        $hours2 += ceil($time_out->diffInMinutes($value->time_in) / 60); //total hours before e.g 2
      }
      if($hours2 < $car_rate->standard_hours){
        $hours = $hours - $hours2;
      }
    }

    $penalty = $violations->sum('violation_name.penalty');
    $exceedingHours = 0;

    if($hours > $standard_hours){
      $exceedingHours = ($hours - $standard_hours) * $hourly_rate;
    }
    if($value->has_sticker){
      $total = $penalty;
      $discount = '1 year subscription';
    }else{
      $discount = 'N/A';
      $total = $exceedingHours + $standard_rate + $penalty;
    }


    return ["standard_hours"=>$standard_hours,"standard_rate"=>$standard_rate,"per_hour"=>$hourly_rate,"amount"=>$total,"duration"=>$hours,"penalty"=>$penalty,"discount"=>$discount,'hours'=>'hours'];
  }
}
