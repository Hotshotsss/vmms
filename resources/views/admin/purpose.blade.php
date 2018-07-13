@extends('layouts.admin_app')

@section('content')

<div id="page-wrapper">
  <div id="data-content">
    <div class="row">
      <div class="col-lg-12">
        <h1>Parking Purpose Settings</h1>
        <hr>
      </div>

      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            Add Parking Purpose
          </div>
          <div class="panel-body">
            {!!Form::open(['url'=>'admin/add-purpose','method'=>'post']) !!}
            @if ($errors->has('parking_name'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('purpose') }}</strong>
            </span>
            @endif
            <div class="form-group">
              <label>Purpose Name</label>
              <input type="text" class="form-control" maxlength="155" placeholder="Enter Purpose Name" name="purpose" required>
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


      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">Parking Purpose Details</div>
          <div class="panel-body">
            @if($purpose->isNotEmpty())
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Purpose Name</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($purpose as $value)
                  <tr>
                    <th>{{$value->purpose}}</th>
                    <th>
                      <center>
                        <div class="btn-group show-on-hover">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#" id="edit-purpose" data-id="{{$value}}">Edit</a></li>
                            <li class="divider"></li>
                            <li>
                            {{Form::open(['url'=>'admin/delete-purpose','method'=>'post','onsubmit'=>'return confirm("Are you sure you want to delete this slot?")'])}}
                              <button style="display: flex;-webkit-appearance: caret;padding: 3px 20px;background:none;font-weight:normal;color:black !important;" type="submit" name="id" value="{{$value->id}}">Delete</button>
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
            </div>
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
<div class="modal fade" id="editPurpose" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Rates</h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          {!!Form::open(['url'=>'admin/edit-purpose','method'=>'post']) !!}
          <div class="form-group">
            <label>Purpose Name</label>
            <input class="form-control" required name="purpose" value="">
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
