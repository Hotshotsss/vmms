<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
// use App\Car;
// use App\Account;
use App\CarType;
use App\Colors;
use App\Purpose;
use App\Parking;
use Carbon\Carbon;
use PDF;
use App;
use Auth;
use App\EmployeeSchedule;
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

      return view('gate.VehicleIn')->with(['vehicle'=>$data,'purpose'=>$purposes]);
    }

    public function addIn(Request $request){
      // dd($request);
      $car = new Parking;
      $car->plate_number = Input::get("txt-plate");
      $car->vehicle_model = Input::get("txt-model");
      $car->parking_reason = Input::get("txt-purpose");
      $car->car_type_id = Input::get("txt-vehicletype");
      $car->time_in = Carbon::now();
      $car->hospital_proof = 0;
      $car->save();
      return redirect()->back();

    }

    public function vehicleOutView(){
      $data = Parking::where('time_out',null)->with(['violations.violation_name','location','carRate'])->get();
      return view('gate.VehicleOut')->with('car',$data);
    }

    public function vehicleMonitoringIn(){
      $carin = Parking::where('time_out',null)->get();

      return view('gate.VehicleMonitoringIn')->with('carin',$carin);
    }

    public function vehicleMonitoringOut(){
      $carout = Parking::whereNotNull('time_out')->get();

      return view('gate.VehicleMonitoringOut')->with('carout',$carout);
    }

    public function vehicleMonitoringID(Request $request){

      $carID = Car::where('car_id',$car_id)->first();

      return redirect()->back();
    }

    public function updateParking(Request $request){
      $data = Parking::find($request->out);
      $proof = $request->hospital_proof == null ? 0 : 1;
      $data->time_out = Carbon::now();
      $data->hospital_proof = $proof;
      $data->save();

      $total = $this->calculatePayments($data);

      $pdf = App::make('dompdf.wrapper');
      $customPaper = array(0,0,230,300);
      $pdf->setPaper($customPaper);
      $pdf->loadView('gate.PDF',compact('data'));

      return $pdf->stream();
    }



    public function calculatePayments($value){
      if(($value->parking_reason == 1 && $value->hospital_proof)){
        $days = ($value->time_out)->diffInDays($value->time_in);
        return 25 * $days;
      }else if($value->parking_reason == 2){
        $minutes = ($value->time_out)->diffInMinutes($value->time_in);
        if($minutes < 16){
          return '0';
        }else{
          return  $this->normalCalculate($value);
        }
      }else if($value->parking_reason == 3){
        return '0';
      }else{
        return $this->normalCalculate($value);
      }
    }
    public function normalCalculate($value){
      $hours = ($value->time_out)->diffInHours($value->time_in);
      $violations = $value->violations;
      $car_rate = $value->carRate;

      $standard_hours = $car_rate->standard_hours;
      $standard_rate = $car_rate->standard_rate;
      $hourly_rate = $car_rate->hour_rate;

      $penalty = $violations->sum('violation_name.penalty');
      $exceedingHours = 0;

      if($hours > $standard_hours){
        $exceedingHours = ($hours - $standard_hours) * $hourly_rate;
      }

      $total = $exceedingHours + $standard_rate + $penalty;

      return $total;
    }

    // public function showPdf($request){
    //   $pdf = App::make('dompdf.wrapper');
    //   $customPaper = array(0,0,230,300);
    //   $pdf->setPaper($customPaper);
    //   $pdf->loadView('gate.PDF');
    //   return $pdf->stream();
    // }

}
