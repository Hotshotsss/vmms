@extends('layouts.menu_app')

@section('content')

<div class="col-lg-12">
  <center><h1 class="page-header">Vehicle In</h1></center>
</div>
<div class="col-lg-12">
  {!! Form::open(['url'=>'gate/add-in','method'=>'post']) !!}
  <div class="row" style="margin-top: 0px;">
    <div class="col-md-4">
      <div class="panel-body" style="background: #8d2ea0;color: white;border-radius:5px;">
        <center>
          <h3 style="border-bottom:2px solid white;padding-bottom:10px;font-weight:bolder;">Vehicle Information</h3>
        </center>
        @if(session('error'))
        <center>
        <b style="color:red">  {{session('error')}} </b>
        </center>
        @endif
        <input type = "checkbox" name = "sticker" id="sticker_id" style="margin-bottom: 15px;">
        <label id ="sticker_label" for="sticker_id">With Sticker?</label><br>
        <label>Plate Number</label>
        <input type = "text" class = "form-control" name = "txt-plate" placeholder="Enter Plate Number" required style="margin-bottom: 15px;">
        <div id="div-in">
          <!-- <label>Vehicle Model</label>
          <input type = "text" class = "form-control" name = "txt-model" placeholder="Enter Model" required style="margin-bottom: 15px;"> -->

          <label>Vehicle Model</label>
          <select class = "form-control" name = "txt-model" required style="margin-bottom: 15px;">
            <option value="" disabled selected>Select Vehicle Model</option>
            @foreach ($model as $value)
            <option value="{{$value->model}}">{{$value->model}}</option>
            @endforeach
          </select>

          <label>Vehicle Type</label>
          <select class = "form-control" name = "txt-vehicletype" required style="margin-bottom: 15px;">
            <option value="" disabled selected>Select Vehicle Type</option>
            @foreach ($vehicle as $value)
            <option value="{{$value->id}}">{{$value->type}}</option>
            @endforeach
          </select>




          <label>Purpose</label>
          <select class = "form-control" name = "txt-purpose" required style="margin-bottom: 15px;">
            <option value="" disabled selected>Select Purpose</option>
            @foreach ($purpose as $value)
            <option value="{{$value->id}}">{{$value->purpose}}</option>
            @endforeach
          </select>
        </div>
        <br>
        <center><button type = "submit" name = "btn-in" class = "btn btn-primary">Save</button></center>
      </div>
    </div>

    <div class="col-md-8" style="color:white;">
      <div class="col-md-12 col-xs-6 responsiveTotal" style="padding-left:0px;padding-right:2.5px;padding-bottom:5px;">
        <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#F50057;border-radius:5px;">
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
        <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#3D5AFE;border-radius: 5px;">
          <h3 style="font-weight:bolder;padding-top:20px;">{{ucwords(strtolower($slot->parking_name))}}</h3>
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
  {!! form::close() !!}
</div>
@endsection
