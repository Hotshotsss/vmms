<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MCU - VMMS</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{asset('css/fontawesome.min.css')}}" rel="stylesheet" type="text/css">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Search Filter -->
  <link href="{{asset('css/searchtable.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css">

</head>

<body>
  <div id="app" style="height:100%;">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../gate"> MCU VMMS </a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right hidden-xs">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i> Hello {{Auth::user()->name}}  <i class="fas fa-caret-down"></i>
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
    </nav>


    <!-- <div id="page-wrapper"> -->
    @yield('content')

    <!-- </div> -->
  </div>
  <div class="footer2">
    <p>© Student {{\Carbon\Carbon::now()->format('Y')}} All Rights Reserved</p>
</div>
</body>

</html>
<!-- <script src="{{asset('js/app.js')}}"></script> -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/sb-admin-2.js')}}"></script>
<script src="{{asset('js/monitoring.js')}}" type="text/javascript"></script>
<script src="{{asset('js/searchfilter.js')}}" type="text/javascript"></script>

<script>
$(document).ready(function() {
  $('#dataTables-example').DataTable({
    responsive: true
  });
});
</script>
