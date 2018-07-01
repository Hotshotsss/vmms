@extends('layouts.menu_app')

@section('content')


<div class="col-lg-12">
    <center><h1 class="page-header">Vehicle Monitoring</h1></center>

   <div class="row">
			    <div class="col-lg-12">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			               <center><b>List of Vehicles</b></center>

                     <div class="pull-right">
                         <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body" onclick="filterContent()">
                           <i class="glyphicon glyphicon-filter"></i>
                         </span>
                     </div>

			            </div>
			            <div class="panel-body">
  			                <table width="100%" class="table table-striped table-bordered table-hover" id="dev-table">
                          <div class="panel-body1">
                						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
                					</div><br>
			                    <thead>
			                        <tr>
			                        	<th>Plate Number</th>
			                            <th>Vehicle Model</th>
			                            <th>Time In</th>
			                            <th>Time Out</th>
                                  <th>Amount Paid</th>
                                  <th>Violation</th>
                                  <th>Parking Location</th>
			                        </tr>
			                    </thead>

			                    <tbody>
			                         @foreach ($car as $value)
			                    			<tr>
						                          <th>{{$value->plate_number}}</th>
						                          <th>{{$value->vehicle_model}}</th>
						                          <th>{{$value->time_in}}</th>
                                      <th>{{$value->time_out}}</th>
                                      <th>{{$value->time_in}}</th>
                                      <th>{{$value->time_in}}</th>
                                      <th>{{$value->time_in}}</th>
						                        </tr>
                                @endforeach
			                    </tbody>
			                </table>
			            </div>
			        </div>
			    </div>
		</div>
</div>

<!-- <div id="vehicleMonitoring" class="modal fade">
  <div class = "modal-dialog ">
      <div class = "modal-content">
            {!! Form::open(['url'=>'gate/add-car','method'=>'post']) !!}
		        <div class = "modal-header">
		          <h4 class="modal-title" id="myModalLabel">Details</h4>
		        </div>
		           <div class="modal-body">
		              <div class="form-group">
		              	 <div id ="d1" style="visibility: hidden;">Display</div>

                     <center><div class="modal-body">
                        <table class="table table-bordered">
                          <tr>
                              <td class="col-md-5"> <label>Plate Number: </label> </td>
                              <td class="col-md-7" id="monitoring-plate"> {{$value->plate_number}} </td>
                          </tr>
                          <tr>
                              <td class="col-md-5"> <label>Vehicle Model: </label> </td>
                              <td class="col-md-7" id="monitoring-model"> {{$value->vehicle_model}} </td>
                          </tr>
                          <tr>
                              <td class="col-md-5"> <label>Time In: </label> </td>
                              <td class="col-md-7" id="monitoring-timein"> {{$value->time_in}} </td>
                          </tr>
                          <tr>
                              <td class="col-md-5"> <label>Violation: </label> </td>
                              <td class="col-md-7" id="monitoring-penalty"> {{$value->penalty}} </td>
                          </tr>
                          <tr>
                              <td class="col-md-5"> <label>Price: </label> </td>
                              <td class="col-md-7" id="monitoring-penalty"> {{$value->penalty}} </td>
                          </tr>
                        </table>
                     </div></center>

                  </div>
		          </div>
		           <div class="modal-footer">
		            <button type="submit" name = "btn-update" class="btn btn-success" >Ok</button>
		          </div>
		         {!!Form::close()!!}
      </div>
  </div>
</div> -->

</div>


@endsection
