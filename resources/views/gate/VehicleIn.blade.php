@extends('layouts.menu_app')

@section('content')

<div class="col-lg-12">
  <center><h1 class="page-header">Vehicle In</h1></center>
</div>
<div class="col-lg-8">
  {!! Form::open(['url'=>'gate/add-in','method'=>'post']) !!}
  <div class="row" style="margin-top: 0px;">
    <div class="col-lg-offset-6 col-lg-6">
      <div class="panel-body">
        <label>Plate Number</label>
        <input type = "text" class = "form-control" name = "txt-plate" placeholder="Enter Plate Number" required>
        <label>Vehicle Model</label>
        <input type = "text" class = "form-control" name = "txt-model" placeholder="Enter Model" required>
        <label>Vehicle Type</label>
        <select class = "form-control" name = "txt-vehicletype">

          @foreach ($vehicle as $value)
          <option value="{{$value->id}}">{{$value->type}}</option>
          @endforeach

        </select>
        <label>Vehicle Color</label>
        <select class = "form-control" name = "txt-vehiclecolor">

          @foreach ($color as $value)
          <option value="{{$value->id}}">{{$value->color}}</option>
          @endforeach

        </select>
        <label>Purpose</label>
        <select class = "form-control" name = "txt-purpose">

          @foreach ($purpose as $value)
          <option value="{{$value->id}}">{{$value->purpose}}</option>
          @endforeach

        </select>
        <label>Remarks</label>
        <textarea class = "form-control" name = "txt-remarks" placeholder="Enter Purpose" required></textarea>
        <br>
        <center><button type = "submit" name = "btn-in" class = "btn btn-primary">Save</button></center>
      </div>
    </div>
  </div>
  {!! form::close() !!}
</div>
@endsection
