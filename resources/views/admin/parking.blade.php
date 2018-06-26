@extends('layouts.admin_app')

@section('content')

<div id="page-wrapper">
  <div id="data-content">
    <div class="row">
      <div class="col-lg-12">
        <h1>Flat Rate</h1>
        <hr>
      </div>

      <div class="col-lg-4 no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">
            Add Parking Location
          </div>
          <div class="panel-body">
            {!!Form::open(['url'=>'admin/add-location','method'=>'post']) !!}
            @if ($errors->has('parking_name'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('parking_name') }}</strong>
            </span>
            @endif
            <div class="form-group">
              <label>Parking Name</label>
              <input type="text" class="form-control" maxlength="155" placeholder="Enter Parking Name" name="parking_name" required>
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea type="text" class="form-control" maxlength="255" placeholder="Enter Description" name="description" required></textarea>
            </div>
            <div class="form-group">
              <label>Number of Slots</label>
              <input type="text" class="form-control" maxlength="100000" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Enter Number of Slots"name="slots" required>
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


      <div class="col-lg-8 no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">Car Rates</div>
          <div class="panel-body">
            @if($slots->isNotEmpty())
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Parking Name</th>
                  <th>Description</th>
                  <th>Number of Slots</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($slots as $value)
                <tr>
                  <th>{{$value->parking_name}}</th>
                  <th>{{$value->description}}</th>
                  <th>{{$value->number_of_slots}}</th>
                  <th>
                    <center>
                      <div class="btn-group show-on-hover">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" id="edit-parking" data-id="{{$value}}">Edit</a></li>
                          <li class="divider"></li>
                          <li>
                          {{Form::open(['url'=>'admin/delete-parking','method'=>'post','onsubmit'=>'return confirm("Are you sure you want to delete this slot?")'])}}
                            <button style="display: flex;-webkit-appearance: caret;padding: 3px 20px;background:none;font-weight:normal" type="submit" name="id" value="{{$value->id}}">Delete</button>
                          {{Form::close()}}
                        </li>
                        </ul>
                      </div>

                    </center>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            No Locations Found
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editParking" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Rates</h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          {!!Form::open(['url'=>'admin/edit-parking','method'=>'post']) !!}
          <div class="form-group">
            <label>Parking Name</label>
            <input readonly class="form-control" name="parking_name"  readonly value="">
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" placeholder="Enter Standard Rate" name="description" required>
          </div>
          <div class="form-group">
            <label>Slots</label>
            <input type="text" class="form-control" placeholder="Enter Standard Hours" name="slots" required>
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

@endsection
