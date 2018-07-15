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
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">


    <!-- Search Filter -->
    <link href="{{asset('css/searchtable.css')}}" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/admin.css" rel="stylesheet">

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
    </nav>


    <!-- <div id="page-wrapper"> -->
@yield('content')
</body>

</html>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script> -->
<!-- <script src="../vendor/bootstrap/js/bootstrap.min.js"></script> -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="{{asset('js/gate.js')}}" type="text/javascript"></script>
<script src="{{asset('js/searchfilter.js')}}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
<script type="text/javascript">
  function bigParking(){
    $('.parking').addClass('containerBig');
    $('.parkingContent').addClass('centerContentBig');
  }
  function normalParking(){
    $('.parking').removeClass('containerBig');
    $('.parkingContent').removeClass('centerContentBig');
  }
  function bigReport(){
    $('.report').addClass('containerBig');
    $('.reportContent').addClass('centerContentBig');
  }
  function normalReport(){
    $('.report').removeClass('containerBig');
    $('.reportContent').removeClass('centerContentBig');
  }
  function bigReportOut(){
    $('.reportOut').addClass('containerBig');
    $('.reportContentOut').addClass('centerContentBig');
  }
  function normalReportOut(){
    $('.reportOut').removeClass('containerBig');
    $('.reportContentOut').removeClass('centerContentBig');
  }

	// function openWindowReload(link) {
  //       var href = link.href;
  //       window.open('vehicle-out');
  //       document.location.reload(true)
  // }


</script>
