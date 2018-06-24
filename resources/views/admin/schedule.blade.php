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
            <form action="/action_page.php">
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                @if($users->where('type',1)->isNotEmpty())
                @foreach($users->where('type',1) as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                @else
                <option disabled selected>No Employee Found</option>
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">From Date:</label>
                <input type="text"  class="form-control" id="from_date">
              </div>

              <div class="form-group">
                <label for="pwd">To Date:</label>
                <input type="text"  class="form-control" id="to_date">
              </div>

              <div class="form-group">
                <label for="pwd">Time In:</label>
                <input type="text" class="form-control" id="time_in">
              </div>
              <div class="form-group">
                <label for="pwd">Time Out</label>
                <input type="text" class="form-control" id="time_out">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">
            Monitoring
          </div>
          <div class="panel-body">
            <form action="/action_page.php">
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                @if($users->where('type',2)->isNotEmpty())
                @foreach($users->where('type',2) as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                @else
                <option disabled selected>No Employee Found</option>
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd">
              </div>
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 no-padding">
        <div class="panel panel-default">
          <div class="panel-heading">
            Admin
          </div>
          <div class="panel-body">
            <form action="/action_page.php">
              <div class="form-group">
                <label for="text">Employee</label>
                <select class="form-control" name="user" required>
                @if($users->where('type',0)->isNotEmpty())
                @foreach($users->where('type',0) as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                @else
                <option disabled selected>No Employee Found</option>
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd">
              </div>
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
