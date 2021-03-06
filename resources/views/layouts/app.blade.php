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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- MetisMenu CSS -->
    <link href="{{ asset ('css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="{{ asset ('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset ('css/style.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset ('css/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset ('css/fontawesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                    <a class="navbar-brand" href="Homepage.php"> MCU VMMS </a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right hidden-xs">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Hello {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="home"><i class="fa fa-bar-chart-o fa-fw"></i> Homepage </a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> Parking Monitoring Settings <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="UniversityParkingSpace.php"><i class="fa fa-list-alt fa-fw"></i> University Parking Space Settings </a>
                                    </li>
                                    <li>
                                        <a href="AddParkingLocation"><i class="fa fa-map-marker fa-fw"></i> Add Parking Location </a>
                                    </li>
                                    <li>
                                        <a href="AllocateParkingSpace.php"><i class="fa fa-list-alt fa-fw"></i> Allocate Parking Space </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="CarSettings.php"><i class="fa fa-gear fa-fw"></i> Car Settings <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="AddCarType"><i class="fa fa-road fa-fw"></i> Add Car Type </a>
                                    </li>
                                    <li>
                                        <a href="Discount"><i class="fa  fa-sliders fa-fw"></i> Discount Settings </a>
                                    </li>
                                    <li>
                                        <a href="FlatRate"><i class="fa fa-pencil-square fa-fw"></i> Flat Rate Settings </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="ViewReports"><i class="fa fa-bar-chart-o fa-fw"></i> View Reports </a>
                            </li>
                            <li>
                                <a href="RateSettings"><i class="fa fa-bar-chart-o fa-fw"></i> Rate Settings </a>
                            </li>
                            <li>
                                <a href="settings"><i class="fa fa-user fa-fw"></i> User Settings </a>
                            </li>
                            <li class="hidden-lg hidden-md hidden-sm">
                                <a href="UserSettings.php"><i class="fa fa-user fa-fw"></i> User Profile </a>
                            </li>
                            <li class="hidden-lg hidden-md hidden-sm">
                                <a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout </a>
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
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset ('js/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset ('js/sb-admin-2.js')}}"></script>
