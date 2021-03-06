@extends('layouts.menu_app')

@section('content')


<div class="col-lg-12">
    <center><h1 class="page-header">Vehicle Monitoring</h1></center>
    <div class="row">
      <div class="col-lg-3">
        <a href="/gate/vehicle-monitoring-out"  class="btn btn-primary" name="button">All</a>
        <a href="/gate/vehicle-monitoring-out?param={{urlencode('With Sticker')}}" class="btn btn-primary" name="button">With Sticker</a>
        <a href="/gate/vehicle-monitoring-out?param={{urlencode('Without Sticker')}}"  class="btn btn-primary" name="button">Without Sticker</a>
      </div>
    </div>
    <div class="row">
 			    <div class="col-lg-12">
 			        <div class="panel panel-default">
 			            <div class="panel-heading">
 			               <center><b>List of Vehicles Out</b></center>

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
                                <th>Time Out</th>
                                <th>Plate Number</th>
                                <th>Vehicle Model</th>
                                <th>Vehicle Type</th>
                                <th>Vehicle Color</th>
                                <th>Vehicle Remarks</th>
                                <th>Purpose</th>
                                <th>Violations</th>
                                <th>Amount Paid</th>
                           </tr>
                       </thead>

                       <tbody>
                            @foreach ($carout as $value)
                             <tr @if($value->has_sticker) style="color: green"@endif>
                                    <th>{{$value->time_in}}</th>
                                    <th>{{$value->time_out}}</th>
                                    <th>{{$value->plate_number}}</th>
                                    <th>{{$value->vehicle_model}}</th>
                                    <th>{{$value->carType ? $value->carType->type :''}}</th>
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
                                    <th>{{$value->payment_status}}</th>
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
