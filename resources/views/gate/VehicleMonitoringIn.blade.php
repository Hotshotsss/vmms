@extends('layouts.menu_app')

@section('content')


<div class="col-lg-12">
  <center><h1 class="page-header">Vehicle Monitoring</h1></center>
  <div class="row">
    <div class="col-lg-3">
      <a href="/gate/vehicle-monitoring-in"  class="btn btn-primary" name="button">All</a>
      <a href="/gate/vehicle-monitoring-in?param={{urlencode('With Sticker')}}" class="btn btn-primary" name="button">With Sticker</a>
      <a href="/gate/vehicle-monitoring-in?param={{urlencode('Without Sticker')}}"  class="btn btn-primary" name="button">Without Sticker</a>
    </div>
  </div>
  <!-- <center style="margin-bottom: -20px">
    <div class="form-group" style="width:30%;display:-webkit-inline-box;">
    <select class="form-control" onchange="if (this.value) window.location.href=this.value" id="filterSelect">
      <option value="/gate/vehicle-monitoring-in" style="display:none;">{{ app('request')->input('param') !== null ? app('request')->input('param')  : 'All'}}</option>
      <option value="/gate/vehicle-monitoring-in">All</option>
      <option value="/gate/vehicle-monitoring-in?param={{urlencode('With Sticker')}}">With Sticker</option>
      <option value="/gate/vehicle-monitoring-in?param={{urlencode('Without Sticker')}}">Without Sticker</option>
    </select>
  </center> -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center><b>List of Vehicles In</b></center>

          <div class="pull-right">
            <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body" onclick="filterContent()">
              <i class="glyphicon glyphicon-filter"></i>
            </span>
          </div>

        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dev-table">
              <div class="panel-body1">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter" />
              </div><br>
              <thead>
                <tr>
                  <th>Time In</th>
                  <th>Plate Number</th>
                  <th>Vehicle Model</th>
                  <th>Vehicle Type</th>
                  <th>Vehicle Color</th>
                  <th>Vehicle Remarks</th>
                  <th>Purpose</th>
                  <th>Violation</th>
                  <th>Parking Location</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($carin as $value)
                <tr @if($value->has_sticker) style="color: green"@endif>
                  <th>{{$value->time_in}}</th>
                  <th>{{$value->plate_number}}</th>
                  <th>{{$value->vehicle_model}}</th>
                  <th>{{$value->carType ? $value->carType->type : ''}}</th>
                  <th>{{$value->vehicle_color}}</th>
                  <th>{{$value->remarks}}</th>
                  <th>{{$value->inPurpose->purpose}}</th>
                  <th>
                    @foreach($value->violations as $violation)
                    @if($violation->violation_name)
                    <li>{{$violation->violation_name->violation }}</li>
                    @endif
                    @endforeach
                  </th>
                  <th>@if($value->location) {{$value->location->parking_name}} @else No Location @endif</th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection
