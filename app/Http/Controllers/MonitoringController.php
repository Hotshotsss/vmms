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
    public function Home(){
        $data = Parking::all(); //Parking
        $violation = Violation::all();
        $parkinglocation = ParkingSlot::orderBy('parking_name','DESC')->get();

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
}
