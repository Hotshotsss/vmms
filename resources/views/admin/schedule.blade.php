@extends('layouts.admin_app')
@section('content')
<div id="page-wrapper">
  <div id="data-content">
    <div class="row">
      <div class="col-lg-12">
        <h1>Employee Schedule
        </h1>
        <hr>
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gate" data-dismiss="modal" name="button">Gate</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monitoring" data-dismiss="modal" name="button">Monitoring</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#admin" data-dismiss="modal" name="button">Admin</button>

      <div class="col-lg-12 no-padding" style="padding-top:10px;">
        @if($errors->has('conflict'))
        <div class="alert alert-danger">
           <strong>Conflict!</strong> {{$errors->first('conflict')}}
        </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">Schedules</div>
          <div class="panel-body">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="gate" tabindex="-1" role="dialog" aria-labelledby="gate" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    {{Form::open(['url'=>'admin/add-sched','method'=>'post'])}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="gate">Add Schedule</h5>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <div class="panel-heading">
            Gate
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="form-group">
                <label for="pwd">Gate:</label>
                <label><input type="radio" value="2" required name="gate_loc"> Entrance</label>
                <label><input type="radio" value="3" name="gate_loc"> Exit</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                  @if($users->where('type',1)->isNotEmpty())
                  <option value="" disabled selected>Select Employee</option>
                  @foreach($users->where('type',1) as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                  @else
                  <option disabled selected>No Employee Found</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">From Date:</label>
                <input type="text" readonly class="form-control" placeholder="From Date" name="from_date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">To Date:</label>
                <input type="text" readonly class="form-control"  placeholder="To Date"  name="to_date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">Time In:</label>
                <select class="form-control" id="time_in" name="time_in" required>
                  <option value="" disabled selected>Select Time In</option>
                  <option value="23:59">12:00 AM</option>
                  <option value="1:00">01:00 AM</option>
                  <option value="2:00">02:00 AM</option>
                  <option value="3:00">03:00 AM</option>
                  <option value="4:00">04:00 AM</option>
                  <option value="5:00">05:00 AM</option>
                  <option value="6:00">06:00 AM</option>
                  <option value="7:00">07:00 AM</option>
                  <option value="8:00">08:00 AM</option>
                  <option value="9:00">09:00 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="13:00">01:00 PM</option>
                  <option value="14:00">02:00 PM</option>
                  <option value="15:00">03:00 PM</option>
                  <option value="16:00">04:00 PM</option>
                  <option value="17:00">05:00 PM</option>
                  <option value="18:00">06:00 PM</option>
                  <option value="19:00">07:00 PM</option>
                  <option value="20:00">08:00 PM</option>
                  <option value="21:00">09:00 PM</option>
                  <option value="22:00">10:00 PM</option>
                  <option value="23:00">11:00 PM</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">Time Out</label>
                <select class="form-control" id="time_out" name="time_out" required>
                  <option value="" disabled selected>Select Time Out</option>
                  <option value="23:59">12:00 AM</option>
                  <option value="1:00">01:00 AM</option>
                  <option value="2:00">02:00 AM</option>
                  <option value="3:00">03:00 AM</option>
                  <option value="4:00">04:00 AM</option>
                  <option value="5:00">05:00 AM</option>
                  <option value="6:00">06:00 AM</option>
                  <option value="7:00">07:00 AM</option>
                  <option value="8:00">08:00 AM</option>
                  <option value="9:00">09:00 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="13:00">01:00 PM</option>
                  <option value="14:00">02:00 PM</option>
                  <option value="15:00">03:00 PM</option>
                  <option value="16:00">04:00 PM</option>
                  <option value="17:00">05:00 PM</option>
                  <option value="18:00">06:00 PM</option>
                  <option value="19:00">07:00 PM</option>
                  <option value="20:00">08:00 PM</option>
                  <option value="21:00">09:00 PM</option>
                  <option value="22:00">10:00 PM</option>
                  <option value="23:00">11:00 PM</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="2" name="sched_btn" class="btn btn-primary">Submit</button>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>
<div class="modal fade" id="monitoring" tabindex="-1" role="dialog" aria-labelledby="monitoring" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    {{Form::open(['url'=>'admin/add-sched','method'=>'post'])}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="monitoring">Add Schedule</h5>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <div class="panel-heading">
            Monitoring
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                  @if($users->where('type',1)->isNotEmpty())
                  <option value="" disabled selected>Select Employee</option>
                  @foreach($users->where('type',1) as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                  @else
                  <option disabled selected>No Employee Found</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">From Date:</label>
                <input type="text" readonly class="form-control" placeholder="From Date" name="from_date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">To Date:</label>
                <input type="text" readonly class="form-control"  placeholder="To Date"  name="to_date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">Time In:</label>
                <select class="form-control" id="time_in" name="time_in" required>
                  <option value="" disabled selected>Select Time In</option>
                  <option value="23:59">12:00 AM</option>
                  <option value="1:00">01:00 AM</option>
                  <option value="2:00">02:00 AM</option>
                  <option value="3:00">03:00 AM</option>
                  <option value="4:00">04:00 AM</option>
                  <option value="5:00">05:00 AM</option>
                  <option value="6:00">06:00 AM</option>
                  <option value="7:00">07:00 AM</option>
                  <option value="8:00">08:00 AM</option>
                  <option value="9:00">09:00 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="13:00">01:00 PM</option>
                  <option value="14:00">02:00 PM</option>
                  <option value="15:00">03:00 PM</option>
                  <option value="16:00">04:00 PM</option>
                  <option value="17:00">05:00 PM</option>
                  <option value="18:00">06:00 PM</option>
                  <option value="19:00">07:00 PM</option>
                  <option value="20:00">08:00 PM</option>
                  <option value="21:00">09:00 PM</option>
                  <option value="22:00">10:00 PM</option>
                  <option value="23:00">11:00 PM</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">Time Out</label>
                <select class="form-control" id="time_out" name="time_out" required>
                  <option value="" disabled selected>Select Time Out</option>
                  <option value="23:59">12:00 AM</option>
                  <option value="1:00">01:00 AM</option>
                  <option value="2:00">02:00 AM</option>
                  <option value="3:00">03:00 AM</option>
                  <option value="4:00">04:00 AM</option>
                  <option value="5:00">05:00 AM</option>
                  <option value="6:00">06:00 AM</option>
                  <option value="7:00">07:00 AM</option>
                  <option value="8:00">08:00 AM</option>
                  <option value="9:00">09:00 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="13:00">01:00 PM</option>
                  <option value="14:00">02:00 PM</option>
                  <option value="15:00">03:00 PM</option>
                  <option value="16:00">04:00 PM</option>
                  <option value="17:00">05:00 PM</option>
                  <option value="18:00">06:00 PM</option>
                  <option value="19:00">07:00 PM</option>
                  <option value="20:00">08:00 PM</option>
                  <option value="21:00">09:00 PM</option>
                  <option value="22:00">10:00 PM</option>
                  <option value="23:00">11:00 PM</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="1" name="sched_btn" class="btn btn-primary">Submit</button>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>
<div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="admin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    {{Form::open(['url'=>'admin/add-sched','method'=>'post'])}}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="admin">Add Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <div class="panel-heading">
            Admin
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                  @if($users->where('type',0)->isNotEmpty())
                  <option value="" disabled selected>Select Employee</option>
                  @foreach($users->where('type',0) as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                  @else
                  <option disabled selected>No Employee Found</option>
                  @endif
                </select>
              </div>
            </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="pwd">From Date:</label>
              <input type="text" readonly class="form-control" placeholder="From Date"  name="from_date">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pwd">To Date:</label>
              <input type="text" readonly class="form-control" placeholder="To Date"  name="to_date">
            </div>

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pwd">Time In:</label>
              <select class="form-control" id="time_in" name="time_in" required>
                <option value="" disabled selected>Select Time In</option>
                <option value="23:59">12:00 AM</option>
                <option value="1:00">01:00 AM</option>
                <option value="2:00">02:00 AM</option>
                <option value="3:00">03:00 AM</option>
                <option value="4:00">04:00 AM</option>
                <option value="5:00">05:00 AM</option>
                <option value="6:00">06:00 AM</option>
                <option value="7:00">07:00 AM</option>
                <option value="8:00">08:00 AM</option>
                <option value="9:00">09:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="12:00">12:00 PM</option>
                <option value="13:00">01:00 PM</option>
                <option value="14:00">02:00 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="16:00">04:00 PM</option>
                <option value="17:00">05:00 PM</option>
                <option value="18:00">06:00 PM</option>
                <option value="19:00">07:00 PM</option>
                <option value="20:00">08:00 PM</option>
                <option value="21:00">09:00 PM</option>
                <option value="22:00">10:00 PM</option>
                <option value="23:00">11:00 PM</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pwd">Time Out</label>
              <select class="form-control" id="time_out" name="time_out" required>
                <option value="" disabled selected>Select Time Out</option>
                <option value="23:59">12:00 AM</option>
                <option value="1:00">01:00 AM</option>
                <option value="2:00">02:00 AM</option>
                <option value="3:00">03:00 AM</option>
                <option value="4:00">04:00 AM</option>
                <option value="5:00">05:00 AM</option>
                <option value="6:00">06:00 AM</option>
                <option value="7:00">07:00 AM</option>
                <option value="8:00">08:00 AM</option>
                <option value="9:00">09:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="12:00">12:00 PM</option>
                <option value="13:00">01:00 PM</option>
                <option value="14:00">02:00 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="16:00">04:00 PM</option>
                <option value="17:00">05:00 PM</option>
                <option value="18:00">06:00 PM</option>
                <option value="19:00">07:00 PM</option>
                <option value="20:00">08:00 PM</option>
                <option value="21:00">09:00 PM</option>
                <option value="22:00">10:00 PM</option>
                <option value="23:00">11:00 PM</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" value="0" name="sched_btn" class="btn btn-primary">Submit</button>
    </div>
  </div>
  {{Form::close()}}
</div>
</div>

<div class="modal fade" id="edit-guard" tabindex="-1" role="dialog" aria-labelledby="edit-gate" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    {{Form::open(['url'=>'admin/edit-sched','method'=>'post'])}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="gate">Edit Schedule</h5>

      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <div class="panel-heading" id="assignment_label">
          </div>
          <div class="panel-body" id="sched-group">
            <div class="col-md-12">
              <div class="form-group" >
                <select id="sched" class="form-control" name="sched_btn">
                  <option value="1">Monitoring</option>
                  <option value="2">Gate</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group" >
                <div id="assignment">
                  <label for="pwd">Gate:</label>
                  <label><input type="radio" value="2" required name="gate_loc"> Entrance</label>
                  <label><input type="radio" value="3" name="gate_loc"> Exit</label>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                  @if($users->where('type',1)->isNotEmpty())
                  <option value="" disabled selected>Select Employee</option>
                  @foreach($users->where('type',1) as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                  @else
                  <option disabled selected>No Employee Found</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">From Date:</label>
                <input type="text" readonly class="form-control" placeholder="From Date" name="from_date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">To Date:</label>
                <input type="text" readonly class="form-control"  placeholder="To Date"  name="to_date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">Time In:</label>
                <select class="form-control" id="time_in" name="time_in" required>
                  <option value="" disabled selected>Select Time In</option>
                  <option value="23:59">12:00 AM</option>
                  <option value="1:00">01:00 AM</option>
                  <option value="2:00">02:00 AM</option>
                  <option value="3:00">03:00 AM</option>
                  <option value="4:00">04:00 AM</option>
                  <option value="5:00">05:00 AM</option>
                  <option value="6:00">06:00 AM</option>
                  <option value="7:00">07:00 AM</option>
                  <option value="8:00">08:00 AM</option>
                  <option value="9:00">09:00 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="13:00">01:00 PM</option>
                  <option value="14:00">02:00 PM</option>
                  <option value="15:00">03:00 PM</option>
                  <option value="16:00">04:00 PM</option>
                  <option value="17:00">05:00 PM</option>
                  <option value="18:00">06:00 PM</option>
                  <option value="19:00">07:00 PM</option>
                  <option value="20:00">08:00 PM</option>
                  <option value="21:00">09:00 PM</option>
                  <option value="22:00">10:00 PM</option>
                  <option value="23:00">11:00 PM</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pwd">Time Out</label>
                <select class="form-control" id="time_out" name="time_out" required>
                  <option value="" disabled selected>Select Time Out</option>
                  <option value="23:59">12:00 AM</option>
                  <option value="1:00">01:00 AM</option>
                  <option value="2:00">02:00 AM</option>
                  <option value="3:00">03:00 AM</option>
                  <option value="4:00">04:00 AM</option>
                  <option value="5:00">05:00 AM</option>
                  <option value="6:00">06:00 AM</option>
                  <option value="7:00">07:00 AM</option>
                  <option value="8:00">08:00 AM</option>
                  <option value="9:00">09:00 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="11:00">11:00 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="13:00">01:00 PM</option>
                  <option value="14:00">02:00 PM</option>
                  <option value="15:00">03:00 PM</option>
                  <option value="16:00">04:00 PM</option>
                  <option value="17:00">05:00 PM</option>
                  <option value="18:00">06:00 PM</option>
                  <option value="19:00">07:00 PM</option>
                  <option value="20:00">08:00 PM</option>
                  <option value="21:00">09:00 PM</option>
                  <option value="22:00">10:00 PM</option>
                  <option value="23:00">11:00 PM</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    {{Form::close()}}
  </div>
</div>
<div class="modal fade" id="edit-admin" tabindex="-1" role="dialog" aria-labelledby="edit-admin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    {{Form::open(['url'=>'admin/edit-sched','method'=>'post'])}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="admin">Edit Schedule</h5>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <div class="panel-heading">
            Admin
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                  @if($users->where('type',0)->isNotEmpty())
                  <option value="" disabled selected>Select Employee</option>
                  @foreach($users->where('type',0) as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                  @else
                  <option disabled selected>No Employee Found</option>
                  @endif
                </select>
              </div>
            </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="pwd">From Date:</label>
              <input type="text" readonly class="form-control" placeholder="From Date"  name="from_date">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pwd">To Date:</label>
              <input type="text" readonly class="form-control" placeholder="To Date"  name="to_date">
            </div>

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pwd">Time In:</label>
              <select class="form-control" id="time_in" name="time_in" required>
                <option value="" disabled selected>Select Time In</option>
                <option value="23:59">12:00 AM</option>
                <option value="1:00">01:00 AM</option>
                <option value="2:00">02:00 AM</option>
                <option value="3:00">03:00 AM</option>
                <option value="4:00">04:00 AM</option>
                <option value="5:00">05:00 AM</option>
                <option value="6:00">06:00 AM</option>
                <option value="7:00">07:00 AM</option>
                <option value="8:00">08:00 AM</option>
                <option value="9:00">09:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="12:00">12:00 PM</option>
                <option value="13:00">01:00 PM</option>
                <option value="14:00">02:00 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="16:00">04:00 PM</option>
                <option value="17:00">05:00 PM</option>
                <option value="18:00">06:00 PM</option>
                <option value="19:00">07:00 PM</option>
                <option value="20:00">08:00 PM</option>
                <option value="21:00">09:00 PM</option>
                <option value="22:00">10:00 PM</option>
                <option value="23:00">11:00 PM</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="pwd">Time Out</label>
              <select class="form-control" id="time_out" name="time_out" required>
                <option value="" disabled selected>Select Time Out</option>
                <option value="23:59">12:00 AM</option>
                <option value="1:00">01:00 AM</option>
                <option value="2:00">02:00 AM</option>
                <option value="3:00">03:00 AM</option>
                <option value="4:00">04:00 AM</option>
                <option value="5:00">05:00 AM</option>
                <option value="6:00">06:00 AM</option>
                <option value="7:00">07:00 AM</option>
                <option value="8:00">08:00 AM</option>
                <option value="9:00">09:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="12:00">12:00 PM</option>
                <option value="13:00">01:00 PM</option>
                <option value="14:00">02:00 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="16:00">04:00 PM</option>
                <option value="17:00">05:00 PM</option>
                <option value="18:00">06:00 PM</option>
                <option value="19:00">07:00 PM</option>
                <option value="20:00">08:00 PM</option>
                <option value="21:00">09:00 PM</option>
                <option value="22:00">10:00 PM</option>
                <option value="23:00">11:00 PM</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" value="0" name="sched_btn" class="btn btn-primary">Submit</button>
    </div>
  </div>
  {{Form::close()}}
</div></div>


@endsection
