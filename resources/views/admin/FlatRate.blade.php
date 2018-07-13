@extends('layouts.admin_app')

@section('content')
<div id="page-wrapper">
  <div id="data-content">
    <div class="row">
      <div class="col-lg-12">
        <h1>Parking Location Settings</h1>
        <hr>
      </div>
      @if($type->isNotEmpty())
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            Add Rates
          </div>
          <div class="panel-body">
            {!!Form::open(['url'=>'admin/add-rate','method'=>'post']) !!}
            <div class="form-group">
              <select class="form-control" name="car_type">
                @foreach($type as $value)
                <option value="{{$value->id}}">{{$value->type}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Standard Rate</label>
              <input type="text" maxlength="100000" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Enter Standard Rate" name="rate" required>
            </div>
            <div class="form-group">
              <label>Standard Hours</label>
              <input type="text" maxlength="100000" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Enter Standard Hours" name="hours" required>
            </div>
            <div class="form-group">
              <label>Exceeding Rate per Hour</label>
              <input type="text" maxlength="100000" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Enter Hour Rate"name="hour_rate" required>
            </div>
            <div class="form-group">
              <center>
                <button type="submit" class="btn btn-default" name="button">Submit</button>
              </center>
            </div>
            {!!Form::close() !!}
          </div>
        </div>
      </div>
      @endif

      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">Parking Location Details</div>
          <div class="panel-body">
            @if($rate->isNotEmpty())
            <div style="overflow:auto;">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Car Type</th>
                    <th>Standard Rate</th>
                    <th>Standard Hour</th>
                    <th>Hour Rate</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($rate as $value)
                  <tr>
                    <th>{{$value->car->type}}</th>
                    <th>{{$value->standard_rate}}</th>
                    <th>{{$value->standard_hours}}</th>
                    <th>{{$value->hour_rate}}</th>
                    <th>
                      <center>
                        <button type="button" class="btn btn-info" id="edit-rate" data-id = "{{$value}}" name="button">Edit</button>
                      </center>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @else
            No Rate Found
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editRate" role="dialog">
   <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Edit Rates</h4>
       </div>
       <div class="modal-body">
         <div class="panel-body">
           {!!Form::open(['url'=>'admin/edit-rate','method'=>'post']) !!}
           <div class="form-group">
            <label>Car Type Rate</label>
             <input readonly class="form-control" name="car_type" value="">
           </div>
           <div class="form-group">
             <label>Standard Rate</label>
             <input type="text" maxlength="100000" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Enter Standard Rate" name="rate" required>
           </div>
           <div class="form-group">
             <label>Standard Hours</label>
             <input type="text" maxlength="100000" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Enter Standard Hours" name="hours" required>
           </div>
           <div class="form-group">
             <label>Rate per Hour</label>
             <input type="text" maxlength="100000" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Enter Hour Rate"name="hour_rate" required>
           </div>

         </div>
       </div>
       <div class="modal-footer">
         <center>
         <button type="submit" class="btn btn-default" name="id">Submit</button>
       </center>
       </div>
        {!!Form::close() !!}
     </div>

   </div>
 </div>
<!-- /#page-wrapper -->
@endsection
