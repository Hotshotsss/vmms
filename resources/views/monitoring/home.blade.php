@extends('layouts.monitoring')

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
			                            <th>Location</th>
                                  <th>Violation</th>
			                        </tr>
			                    </thead>

			                    <tbody>
			                         @foreach ($car as $value)
			                    			<tr>
						                          <th>{{$value->plate_number}}</th>
						                          <th>{{$value->vehicle_model}}</th>
						                          <th>{{$value->time_in}}</th>
                                      <th>
                                        <a href="#" class='btn btn-success' type='button' name='confirm' data-target='#confirmLocation' data-toggle='modal'>Park Here?</a>
                                      </th>
                                      <th>
                                        <div class="form-group">
                                          <!-- <label for="sel1">Select list:</label> -->

                                          <select class="form-control" id="sel1" data-id="{{$value}}">
                                            <option disabled selected>Select Violation:</option>
                                            @foreach ($type as $value)
                                            <option value="{{$value->violation}}">{{$value->violation}}</option>
                                            @endforeach
                                          </select>

                                        </div>
                                      </th>
						                        </tr>
                                @endforeach
			                    </tbody>
			                </table>
			            </div>
			        </div>
			    </div>
		</div>
</div>

<div id="confirmLocation" class="modal fade">
  <div class = "modal-dialog modal-sm ">
      <div class = "modal-content">
            {!! Form::open(['url'=>'monitoring/confirm-location','method'=>'post']) !!}
		        <div class = "modal-header">
		          <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
		        </div>
		           <div class="modal-body">
		              <div class="form-group">
		              	 <div id ="d1" style="visibility: hidden;">Display</div>

                     <center>
                       <p>Park Here?</p>

                       <a href="#" class='btn btn-success' type='button'>Yes</a>
                       <a href="#" class='btn btn-success' type='button'>No</a>

                     </center>

                  </div>
		          </div>

		         {!!Form::close()!!}
      </div>
  </div>
</div>

<div id="confirmViolation" class="modal fade">
  <div class = "modal-dialog modal-sm ">
      <div class = "modal-content">
            {!! Form::open(['url'=>'monitoring/confirm-location','method'=>'post']) !!}
		        <div class = "modal-header">
		          <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
		        </div>
		           <div class="modal-body">
		              <div class="form-group">
		              	 <div id ="d1" style="visibility: hidden;">Display</div>

                     <center>

                       <p id="violation">Add Violation :
                         <b id="valueViolation"></b>
                       </p>

                       <a href="#" class='btn btn-success' type='button'>Yes</a>
                       <a href="#" class='btn btn-success' type='button'>No</a>

                     </center>

                  </div>
		          </div>

		         {!!Form::close()!!}
      </div>
  </div>
</div>



@endsection
