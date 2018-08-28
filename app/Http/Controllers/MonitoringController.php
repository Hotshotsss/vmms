<?php

namespace App\Http\Controllers;

use App\Parking;
use App\ParkingViolation;
use App\ParkingLocation;
use App\Violation;
use App\ParkingSlot;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
  public function Home(Request $request){
    if($request->param){
      if(urldecode($request->param) == 'With Sticker'){
        $data = Parking::where('has_sticker',1)->where('time_out',null)->get();
      }else{
        $data = Parking::where(function($query){
          $query->whereNull('has_sticker')->orWhere('has_sticker',0);
        })->whereNull('time_out')->get();
      }
    }else{
      $data = Parking::all()->where('time_out',null); //Parking
    }
    $violation = Violation::all();
    $parkinglocation = ParkingSlot::orderBy('parking_name','DESC')->get();
    // dd($parkinglocation[5 ]->parking_name);
    return view('monitoring.home')->with(['car'=>$data,'type'=>$violation,'locations'=>$parkinglocation]);
  }

  public function addViolation(Request $request){

    $violation = new ParkingViolation;
    $violation->parking_id = $request->id;
    $violation->violation_id = $request->violationID;
    $violation->save();

    return redirect()->back()->with('success','success');
  }

  public function addLocation(Request $request){
    // dd($request);
    $location = Parking::find($request->id);
    $location->location_id = $request->locationID;

    $location->save();

    return redirect()->back()->with('success','success');
  }

  public function editLocation(Request $request){
    // dd($request);
    $location = Parking::find($request->id);
    $location->location_id = $request->locationID;

    $location->save();

    return redirect()->back()->with('success','success');
  }

  public function addColor(Request $request){
    // dd($request);
    $color = Parking::find($request->id);
    $color->vehicle_color = $request->colorName;

    $color->save();

    return redirect()->back()->with('success','success');
  }

  public function editColor(Request $request){
    // dd($request);
    $color = Parking::find($request->id);
    $color->vehicle_color = $request->color;

    $color->save();

    return redirect()->back()->with('success','success');
  }

  public function addRemarks(Request $request){
    // dd($request);
    $remarks = Parking::find($request->id);
    $remarks->remarks = $request->remarks;

    $remarks->save();

    return redirect()->back()->with('success','success');
  }

  public function editRemarks(Request $request){
    // dd($request);
    $remarks = Parking::find($request->id);
    $remarks->remarks = $request->remarks;

    $remarks->save();

    return redirect()->back()->with('success','success');
  }
}
