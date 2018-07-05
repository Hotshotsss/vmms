<?php

namespace App\Http\Controllers;

use App\Parking;
use App\ParkingViolation;
use App\Violation;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function Home(){
        $data = Parking::all(); //Parking
        $violation = Violation::all();


      return view('monitoring.home')->with(['car'=>$data,'type'=>$violation]);
    }

    public function addViolation(Request $request){

        $violation = new ParkingViolation;
        $violation->parking_id = $request->id;
        $violation->violation_id = $request->violationID;
        $violation->save();

        return redirect()->back()->with('success','success');
    }
}
