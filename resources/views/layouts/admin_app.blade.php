<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MCU VMMS Admin Side</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <!-- MetisMenu CSS -->
  <link href="{{ url ('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

  <!-- Custom CSS -->

  <link href="{{ url ('dist/css/sb-admin-2.css')}}" rel="stylesheet">
  <link href="{{ url ('css/sb-admin.css')}}" rel="stylesheet">
  <link href="{{asset('css/fullcalendar.min.css')}}" rel='stylesheet' />

  <link href="{{ url ('css/admin.css')}}" rel="stylesheet">
  <!-- Custom Fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
</head>
<body>
  <div id="app">
    <main class="py-4">
      <div class="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../admin"> MCU VMMS </a>
          </div>
          <!-- /.navbar-header -->

          <ul class="nav navbar-top-links navbar-right hidden-xs">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> Hello {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li>
                  <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a>

                  <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
              <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
          </ul>
          <!-- /.navbar-top-links -->

          <div class="sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu" style="padding-top:10px;">
                <li>
                  <a href="/admin/home"><i class="fas fa-chart-bar fa-fw"></i> Homepage </a>
                </li>
                <li>
                  <a href="#"><i class="fas fa-cogs fa-fw"></i> Parking Monitoring Settings <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">

                    <li>
                      <a href="/admin/parking"><i class="fas fa-map-marker-alt fa-fw"></i> Add Parking Location </a>
                    </li>
                    <li>
                      <a href="/admin/purpose"><i class="fas fa-bullseye fa-fw"></i> Add Parking Purpose </a>
                    </li>

                  </ul>
                  <!-- /.nav-second-level -->
                </li>
                <li>
                  <a href="#!"><i class="fas fa-cogs fa-fw"></i> Car Settings <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/admin/view-car"><i class="fas fa-road fa-fw"></i> Add Car Type </a>
                    </li>
                    <li>
                      <a href="/admin/flat-rate"><i class="fas fa-pencil-alt fa-fw"></i> Flat Rate Settings </a>
                    </li>
                    <li>
                      <a href="/admin/view-violation"><i class="fas fa-road fa-fw"></i> Add Violation</a>
                    </li>

                  </ul>
                  <!-- /.nav-second-level -->
                </li>
                <li>
                  <a href="/admin/reports"><i class="fas fa-chart-bar fa-fw"></i> View Reports </a>
                </li>
                <li>
                  <a href="/admin/employee-schedule"><i class="fas fa-clock fa-fw"></i> Employee Schedule </a>
                </li>
                <!-- <li>
                <a href="RateSettings"><i class="fa fa-bar-chart-o fa-fw"></i> Rate Settings </a>
              </li> -->
              <li>
                <a href="/admin/settings"><i class="fa fa-user fa-fw"></i> User Settings </a>
              </li>

              <li class="hidden-lg hidden-md hidden-sm">
                <a href="UserSettings.php"><i class="fa fa-user fa-fw"></i> User Profile </a>
              </li>
              <li class="hidden-lg hidden-md hidden-sm">
                <a href="/admin/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="admin/logout" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </div>
          <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
      </nav>
      @yield('content')
    </div>

  </main>
</div>
</body>
</html>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/admin.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/moment.min.js')}}"></script>
<script src="{{ asset('js/fullcalendar.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXhzc2fN2CY1FuFGP3oRFHBkhcgQp1x-g&callback=initMap"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ url ('vendor/metisMenu/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ url ('dist/js/sb-admin-2.js')}}"></script>
<script type="text/javascript">

@if(isset($errors) && count($errors->registration) > 0)
$('#addUser').modal('show');
@endif

@if(isset($errors) && count($errors->password) > 0)
$('#editPassword').modal('show');
@endif

$('#filterSelect').on('change', function() {
  window.location = $(this).val();
});

</script>
