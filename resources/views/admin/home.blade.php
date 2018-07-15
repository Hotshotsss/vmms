@extends('layouts.admin_app')
@section('content')
  <div id="page-wrapper" style="padding-top:20px;">
    <div id="data-content">
      <div class="row" style="color:white;">
        <div class="col-lg-12 col-md-8 col-xs-6" style="padding-left:0px;padding-right:2.5px;padding-bottom:5px;">
          <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#4db151;border-radius:5px;">
            <div class="col-md-4 hidden-sm hidden-xs">
              <i class="fas fa-parking" style="font-size:140px;padding-top:20px;"></i>
            </div>
            <div class="col-md-8" style="padding-top:10px">
              <div style="padding-left:12px;" class="leftParking">
                <h2 style="font-weight:bolder;" class="h1Parking">Total Slots</h2>
                <h1 style="font-size:60px">{{$parkings}} /
                  <b style="font-size:30px;">{{$slots->sum('number_of_slots')}}</b>
                </h1>
              </div>
            </div>
          </div>
        </div>

        @foreach($slots as $slot)
        <div class="col-md-4 col-xs-6" style="padding-left:2.5px;padding-right:2.5px;padding-bottom:5px;">
         <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#79c4bb;border-radius: 5px;">
           <h3 style="font-weight:bolder;">{{ucwords(strtolower($slot->parking_name))}}</h3>
           <center>
             <h5 style="font-size:35px;padding-top:30px;">{{$slot->parked->count()}}/
               <b style="font-size:25px;">{{$slot->number_of_slots}}</b>
             </h5>
           </center>
         </div>
       </div>
        @endforeach

      </div>
    </div>
  </div>

  <!-- /#page-wrapper -->
@endsection
