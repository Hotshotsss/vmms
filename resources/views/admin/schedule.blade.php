@extends('layouts.admin_app')
@section('content')
<div id="page-wrapper">
  <div id="data-content">
    <div class="row">
      <div class="col-lg-12">
        <h1>Employee Schedule</h1>
        <hr>
      </div>
      <div class="col-lg-4 no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">
            Gate
          </div>
          <div class="panel-body">
            {{Form::open(['url'=>'admin/add-sched','method'=>'post'])}}
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                @if($users->where('type',1)->isNotEmpty())
                @foreach($users->where('type',1) as $user)
                <option value="" disabled selected>Select Employee</option>
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                @else
                <option disabled selected>No Employee Found</option>
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">From Date:</label>
                <input type="text" readonly class="form-control" placeholder="From Date" name="from_date">
              </div>

              <div class="form-group">
                <label for="pwd">To Date:</label>
                <input type="text" readonly class="form-control"  placeholder="To Date"  name="to_date">
              </div>

              <div class="form-group">
                <label for="pwd">Time In:</label>
                <select class="form-control" id="time_in" name="time_in" required>
                  <option value="" disabled selected>Select Time In</option>
                  <option value="0:00">12:00 AM</option>
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
              <div class="form-group">
                <label for="pwd">Time Out</label>
                <select class="form-control" id="time_out" name="time_out" required>
                  <option value="" disabled selected>Select Time Out</option>
                  <option value="0:00">12:00 AM</option>
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
              <center>
              <button type="submit" class="btn btn-default">Submit</button>
            </center>
          {{Form::close()}}
          </div>
        </div>
      </div>
      <div class="col-lg-4 no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">
            Monitoring
          </div>
          <div class="panel-body">
              {{Form::open(['url'=>'admin/add-sched','method'=>'post'])}}
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                @if($users->where('type',2)->isNotEmpty())
                @foreach($users->where('type',2) as $user)
                  <option value="" disabled selected>Select Employee</option>
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                @else
                <option disabled selected>No Employee Found</option>
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">From Date:</label>
                <input type="text" readonly class="form-control" placeholder="From Date"  name="from_date">
              </div>

              <div class="form-group">
                <label for="pwd">To Date:</label>
                <input type="text" readonly class="form-control" placeholder="To Date"  name="to_date">
              </div>

              <div class="form-group">
                <label for="pwd">Time In:</label>
                <select class="form-control" id="time_in" name="time_in" required>
                  <option value="" disabled selected>Select Time In</option>
                  <option value="0:00">12:00 AM</option>
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
              <div class="form-group">
                <label for="pwd">Time Out</label>
                <select class="form-control" id="time_out" name="time_out" required>
                  <option value="" disabled selected>Select Time Out</option>
                  <option value="0:00">12:00 AM</option>
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
              <center>
              <button type="submit" class="btn btn-default">Submit</button>
            </center>
        {{Form::close()}}
          </div>
        </div>
      </div>
      <div class="col-lg-4 no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">
            Admin
          </div>
          <div class="panel-body">
            {{Form::open(['url'=>'admin/add-sched','method'=>'post'])}}
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                @if($users->where('type',0)->isNotEmpty())
                @foreach($users->where('type',0) as $user)
                  <option value="" disabled selected>Select Employee</option>
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                @else
                <option disabled selected>No Employee Found</option>
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">From Date:</label>
                <input type="text" readonly class="form-control" placeholder="From Date"  name="from_date">
              </div>

              <div class="form-group">
                <label for="pwd">To Date:</label>
                <input type="text" readonly class="form-control" placeholder="To Date"  name="to_date">
              </div>

              <div class="form-group">
                <label for="pwd">Time In:</label>
                <select class="form-control" id="time_in" name="time_in" required>
                  <option value="" disabled selected>Select Time In</option>
                  <option value="0:00">12:00 AM</option>
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
              <div class="form-group">
                <label for="pwd">Time Out</label>
                <select class="form-control" id="time_out" name="time_out" required>
                  <option value="" disabled selected>Select Time Out</option>
                  <option value="0:00">12:00 AM</option>
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
              <center>
              <button type="submit" class="btn btn-default">Submit</button>
            </center>
            {{Form::close()}}
          </div>
        </div>
      </div>
      <div class="col-lg-12 no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">Incoming Payments</div>
          <div class="panel-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>
                    <div class="checkbox">
                      <label><input type="checkbox" value=""><b>Select All</b></label>
                    </div>
                  </th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><div class="checkbox">
                    <label><input type="checkbox" value="">Option 1</label>
                  </div></td>
                  <td>John</td>
                  <td>Doe</td>
                  <td>john@example.com</td>
                  <td><button type="button" class="btn btn-primary">Update</button></td>
                  <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
                <tr>
                  <td><div class="checkbox">
                    <label><input type="checkbox" value="">Option 1</label>
                  </div></td>
                  <td>Mary</td>
                  <td>Moe</td>
                  <td>mary@example.com</td>
                  <td><button type="button" class="btn btn-primary">Update</button></td>
                  <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
                <tr>
                  <td><div class="checkbox">
                    <label><input type="checkbox" value="">Option 1</label>
                  </div></td>
                  <td>July</td>
                  <td>Dooley</td>
                  <td>july@example.com</td>
                  <td><button type="button" class="btn btn-primary">Update</button></td>
                  <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>



    </div>
  </div>
</div>
<!-- /#page-wrapper -->
@endsection
