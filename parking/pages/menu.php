<?php
include('dbconnection.php');
session_start();
ob_start();

$date = date_create("Asia/Manila");
$actual_time = date_format($date, 'Y-m-d h:i:s A')
?>

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
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="menu.php">MCU - VMMS</a>

                 <ul class="nav navbar-top-links navbar-right" align="right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>

 
   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if($_REQUEST==NULL)
                        {
                            include('menu_list.php');
                        }
                    else if($_REQUEST['webpage']=='vehicle_in')
                        {
                            include('vehicle_in.php');   
                        }

                    else if($_REQUEST['webpage']=='vehicle_out')
                        {
                            include('vehicle_out.php');   
                        }

                    else if($_REQUEST['webpage']=='vehicle_monitoring')
                        {
                            include('vehicle_monitoring.php');   
                        }
                    else if($_REQUEST['webpage']=='vehicle_report')
                        {
                            include('vehicle_report.php');   
                        }
                    ?>
             </div>
        </div>
    </div>     
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>
