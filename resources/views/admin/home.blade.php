@extends('layouts.admin_app')
@section('content')
  <div id="page-wrapper" style="padding-top:20px;">
    <div id="data-content">
      <div class="row" style="color:white;">
        <div class="col-lg-12 col-md-8 col-xs-6" style="padding-left:0px;padding-right:2.5px;padding-bottom:5px;">
          <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#4db151;border-radius:5px;">
            <div class="col-md-4 hidden-sm hidden-xs">
              <i class="fas fa-parking" style="font-size:140px;padding-top:20px;"></i>
            </div>
            <div class="col-md-8" style="padding-top:10px">
              <div style="padding-left:12px;" class="leftParking">
                <h2 style="font-weight:bolder;" class="h1Parking">Total Slots</h2>
                <h1 style="font-size:60px">{{$parkings}} /
                  <b style="font-size:30px;">{{$slots->sum('number_of_slots')}}</b>
                </h1>
              </div>
            </div>
          </div>
        </div>

        @foreach($slots as $slot)
        <div class="col-md-4 col-xs-6" style="padding-left:2.5px;padding-right:2.5px;padding-bottom:5px;">
         <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#79c4bb;border-radius: 5px;">
           <h3 style="font-weight:bolder;">{{ucwords(strtolower($slot->parking_name))}}</h3>
           <center>
             <h5 style="font-size:35px;padding-top:30px;">{{$slot->parked->count()}}/
               <b style="font-size:25px;">{{$slot->number_of_slots}}</b>
             </h5>
           </center>
         </div>
       </div>
        @endforeach
        <!-- <div class="hidden-lg col-md-4 col-xs-6" style="padding-left:2.5px;padding-right:2.5px;padding-bottom:5px;">
          <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#4db151;border-radius: 5px;">
            <h3 style="font-weight:bolder;">Entrance</h3>
            <center>
              <h5 style="font-size:35px;padding-top:30px;">120 /
                <b style="font-size:25px;">200</b>
              </h5>
            </center>
          </div>
        </div>
        <div class="col-lg-5" style="padding-left:2.5px;padding-right:1.25px">
          <div class="col-md-6" style="padding-left:0px;padding-right:2.5px">
            <div class="bg-danger o-hidden h-100"  style="height: 95px;margin-bottom:5px;padding:0px 15px;background:#f0493a;border-radius: 5px;">
              <h4 style="font-weight:bolder;">Centennial Gym</h4>
              <center>
                <h5 style="font-size:40px">200 /
                  <b style="font-size:25px;">250</b>
                </h5>
              </center>
            </div>
          </div>
          <div class="col-md-6" style="padding-left:2.5px;padding-right:2.5px">
            <div class="bg-danger o-hidden h-100"  style="height: 95px; margin-bottom:5px;padding:0px 15px;background:#ff9801;border-radius: 5px;">
              <h4 style="font-weight:bolder;">Old Gym</h4>
              <center>
                <h5 style="font-size:40px">120 /
                  <b style="font-size:25px;">200</b>
                </h5>
              </center>
            </div>
          </div>
          <div class="col-md-6" style="padding-left:0px;padding-right:2.5px">
            <div class="bg-danger o-hidden h-100"  style="height: 100px;padding:0px 15px;background:#434d66;border-radius: 5px;">
              <h4 style="font-weight:bolder;">PGT</h4>
              <center>
                <h5 style="font-size:40px">20 /
                  <b style="font-size:25px;">100</b>
                </h5>
              </center>
            </div>
          </div>
          <div class="col-md-6" style="padding-left:2.5px;padding-right:2.5px">
            <div class="bg-danger o-hidden h-100"  style="height: 100px;padding:0px 15px;background:#2297f3;border-radius: 5px;">
              <h4 style="font-weight:bolder;">Patio Minerva</h4>
              <center>
                <h5 style="font-size:40px">180 /
                  <b style="font-size:25px;">200</b>
                </h5>
              </center>
            </div>
          </div>
        </div>
        <div class="col-lg-2 hidden-md hidden-sm hidden-xs" style="padding-left:2.5px;padding-right:0px">
          <div class="bg-danger o-hidden h-100"  style="height: 200px;padding:0px 15px;background:#4db151;border-radius: 5px;">
            <h3 style="font-weight:bolder;">Entrance</h3>
            <center>
              <h5 style="font-size:35px;padding-top:30px;">120 /
                <b style="font-size:25px;">200</b>
              </h5>
            </center>
          </div>
        </div> -->
      </div>
          <div class="col-lg-4 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Form
              </div>
              <div class="panel-body">
                <form action="/action_page.php">
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email">
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
                Text Area
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label for="comment">Comment:</label>
                  <textarea class="form-control" rows="5" id="comment" ></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Checkbox
              </div>
              <div class="panel-body">
                <div class="checkbox">
                  <label><input type="checkbox" value="">Option 1</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Option 2</label>
                </div>
                <div class="checkbox disabled">
                  <label><input type="checkbox" value="" disabled>Option 3</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Radio Button
              </div>
              <div class="panel-body">
                <div class="radio">
                  <label><input type="radio" name="optradio">Option 1</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Option 2</label>
                </div>
                <div class="radio disabled">
                  <label><input type="radio" name="optradio" disabled>Option 3</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Select List
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label for="sel1">Select list:</label>
                  <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Static Text
              </div>
              <div class="panel-body">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                      <p class="form-control-static">someone@example.com</p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Input Text with Icon
              </div>
              <div class="panel-body">
                <form>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Text</span>
                    <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 no-padding">
            <div class="col-lg-12 no-padding">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Input Group Button
                </div>
                <div class="panel-body">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-12 no-padding">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Badges
                  </div>
                  <div class="panel-body">
                    <button type="button" class="btn btn-primary">Primary <span class="badge">7</span></button>
                    <button type="button" class="btn btn-secondary">Secondary <span class="badge">25</span></button>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 no-padding">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Breadcrumb
                  </div>
                  <div class="panel-body">
                    <ul class="breadcrumb">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Private</a></li>
                      <li><a href="#">Pictures</a></li>
                      <li class="active">Vacation</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Form Control States
              </div>
              <div class="panel-body">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Focused</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="focusedInput" type="text" value="Click to focus">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="disabledInput" class="col-sm-2 control-label">Disabled</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="disabledInput" type="text" disabled>
                    </div>
                  </div>
                  <fieldset disabled>
                    <div class="form-group">
                      <label for="disabledTextInput" class="col-sm-2 control-label">Fieldset disabled</label>
                      <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="disabledSelect" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <select id="disabledSelect" class="form-control">
                          <option>Disabled select</option>
                        </select>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group has-success has-feedback">
                    <label class="col-sm-2 control-label" for="inputSuccess">
                    Input with success and icon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSuccess">
                      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                    </div>
                  </div>
                  <div class="form-group has-warning has-feedback">
                    <label class="col-sm-2 control-label" for="inputWarning">
                    Input with warning and icon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputWarning">
                      <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                    </div>
                  </div>
                  <div class="form-group has-error has-feedback">
                    <label class="col-sm-2 control-label" for="inputError">
                    Input with error and icon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputError">
                      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-3 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Pagination
              </div>
              <div class="panel-body">
                <ul class="pagination">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Dropdown
              </div>
              <div class="panel-body">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Buttons
              </div>
              <div class="panel-body">
                <button type="button" class="btn">Basic</button>
                <button type="button" class="btn btn-default">Default</button>
                <button type="button" class="btn btn-primary">Primary</button>
                <button type="button" class="btn btn-success">Success</button>
                <button type="button" class="btn btn-info">Info</button>
                <button type="button" class="btn btn-warning">Warning</button>
                <button type="button" class="btn btn-danger">Danger</button>
                <button type="button" class="btn btn-link">Link</button>
              </div>
            </div>
          </div>
          <div class="col-lg-12 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">
                Alerts
              </div>
              <div class="panel-body">
                <div class="alert alert-success">
                  <strong>Success!</strong> Indicates a successful or positive action.
                </div>

                <div class="alert alert-info">
                  <strong>Info!</strong> Indicates a neutral informative change or action.
                </div>

                <div class="alert alert-warning">
                  <strong>Warning!</strong> Indicates a warning that might need attention.
                </div>

                <div class="alert alert-danger">
                  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 no-padding">
            <div class="panel panel-default">
              <div class="panel-heading">Incoming Payments</div>
              <div class="panel-body">
                <div style="overflow:auto">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td>john@example.com</td>
                      </tr>
                      <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                      </tr>
                      <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- /#page-wrapper -->
@endsection
