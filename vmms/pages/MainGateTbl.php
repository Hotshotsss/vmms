<?php
    include('dbconnection.php');
    session_start();
  if ( $_SESSION['type']!=="MainGate")
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

    <title>MCU VMMS MainGate Side</title>

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
                <a class="navbar-brand" href="MainGatehp.php"> MCU VMMS: Vehicle Monitoring and Management System </a>
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
                            <a href="MainGatehp.php"><i class="fa fa-home fa-fw"></i> Homepage </a>
                        </li>
                        <li>
                            <a href="MainGateInput.php"><i class="fa fa-file-text fa-fw"></i> Input Information </a>
                        </li>
                        <li>
                            <a href="MainGateTbl.php"><i class="fa fa-list-alt fa-fw"></i> Table List </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <form action="MainGateInput.php" method="POST">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"> 
                    <h1 class="page-header"> List of Information </h1> 
                    <text align="right">
                    <?php
                        date_default_timezone_set("Singapore");
                        $time= date('h:i:s A');
                        echo $time;
                        ?>
                    </text>
                    <br>
                    <thead>
                    <br>

                 <div class="col-lg-15">
                    <?php

            $plate_number=$_SESSION['plate_number'];
            $vehicle_type=$_SESSION['vehicle_type'];
            $purpose=$_SESSION['purpose'];
            
           
        $sql = "SELECT * FROM main_tbl ";
        $result = mysqli_query($conn,$sql);

        
        echo "<table class='form-control'>";

            echo "<tr>";
            
                echo "<th>Date</th>";
                echo "<th>Time IN</th>";
                echo "<th>Receipt Number</th>";
                echo "<th>Plate Number</th>";
                echo "<th>Vehicle_type</th>";
                echo "<th>purpose</th>";

            echo "</tr>";
            while ($row = mysqli_fetch_array($result))
                {
                    $date=$row['date'];
                    $time_in=$row['time_in'];
                    $receipt_number=$row['receipt_number'];
                    $plate_number = $row['plate_number'];
                    $vehicle_type = $row['vehicle_type'];
                    $purpose = $row['purpose'];
                    
            echo "<tr>";
                
                echo "<td>".$date."</td>"; 
                echo "<td>".$time_in."</td>";
                echo "<td>".$receipt_number."</td>";
                echo "<td>".$plate_number."</td>";
                echo "<td>".$vehicle_type."</td>";
                echo "<td>".$purpose."</td>";
                
            
            
            echo "<tr>";



                }
        echo "</table>";
        ?>

                </div>
                <!-- /.col-lg-12 -->
            </div>
                <div class="row">
                    <div class="col-lg-6">
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