<?php

namespace App\Http\Controllers;

use App\Parking;
use App\ParkingViolation;
use App\ParkingLocation;
use App\Violation;
use App\Location;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function Home(){
        $data = Parking::all(); //Parking
        $violation = Violation::all();
        $parkinglocation = Location::all();


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

        $location = new ParkingLocation;
        $location->parking_id = $request->id;
        $location->location_id = $request->locationID;
        $location->save();

        return redirect()->back()->with('success','success');
    }
}
