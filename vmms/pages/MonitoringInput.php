<?php
    include('dbconnection.php');
    session_start();
  if ( $_SESSION['type']!=="Monitoring")
     {
        header('location:login.php');
     }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCU VMMS Monitoring Side</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="MonitoringInput.php"> MCU VMMS: Vehicle Monitoring and Management System </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Hello User <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="Mmonitoringhp.php"><i class="fa fa-home fa-fw"></i> Homepage </a>
                        </li>
                        <li>
                            <a href="MonitoringInput.php"><i class="fa fa-file-text fa-fw"></i> Input Information </a>
                        </li>
                        <li>
                            <a href="MonitoringTbl.php"><i class="fa fa-list-alt fa-fw"></i> Table List </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <form action="MonitoringInput.php" method="POST">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"> 
                    <h1 class="page-header"> Input Information </h1> 
                    <h4 align="right"> <p id="time"></p>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                            <script type="text/javascript">
                            var timestamp = '<?=time();?>';
                                function updateTime(){
                                $('#time').html(Date(timestamp));
                                timestamp++;
                                }
                                $(function(){
                                setInterval(updateTime, 1000);
                                });
                                </script>

                    </h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Color </label>
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="form-group">    
                            <label>Remarks</label>
                            <textarea class="form-control" rows="4" required></textarea>
                
                <!-- /.col-lg-4 -->
                    </div>
                        <div class="col-lg-15">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-submit">Submit Button</button>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </form>
           
            <div class="row">
                <div class="col-lg-6">
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<?php
    if (isset($_POST['btn-submit']))
       {
        $plate_number = $_POST['plate_number'];
        $vehicle_type = $_POST['vehicle_type'];
        $purpose = $_POST['purpose'];

            $sql = "INSERT INTO moni_tbl (plate_number,time_in,vehicle_type,purpose) VALUES ('$plate_number','$time','$vehicle_type','$purpose')";
            $result = mysqli_query($conn,$sql);

                        if($result)
                            {
                                echo "<script>alert('Data has been Saved!'); window.location.replace('MonitoringTbl.php')</script>";              
                            }
                        else
                            {
                                echo "<script>alert('Data has not been Saved!'); window.location.replace('MonitoringTbl.php')</script>";
                            }
        }
?>