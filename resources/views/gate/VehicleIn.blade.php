@extends('layouts.menu_app')

@section('content')

<div class="col-lg-12">
  <center><h1 class="page-header">Vehicle In</h1></center>
</div>
<div class="col-lg-8">
  {!! Form::open(['url'=>'gate/add-in','method'=>'post']) !!}
  <div class="row">
    <div class="col-lg-12">
      <div class="panel-body">
        <label>Plate Number</label>
        <input type = "text" class = "form-control" name = "txt-plate" placeholder="Enter Plate Number" required>
        <label>Vehicle Model</label>
        <input type = "text" class = "form-control" name = "txt-model" placeholder="Enter Model" required>
        <label>Purpose</label>
        <textarea class = "form-control" name = "txt-purpose" placeholder="Enter Purpose" required></textarea>
        <label>Vehicle Type</label>
        <select class = "form-control" name = "txt-vehicletype">

          @foreach ($vehicle as $value)
          <option value="{{$value->id}}">{{$value->type}}</option>
          @endforeach

        </select>	<br>
        <center><button type = "submit" name = "btn-in" class = "btn btn-primary">Save</button></center>
      </div>
    </div>
  </div>
  {!! form::close() !!}
</div>
@endsection
