
<?php
    include('dbconnection.php');
    session_start();
  if ( $_SESSION['type']!=="Administrator")
     {
        header('location:login.php');
     }
?>

<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
  function capitalize(textboxid, str) {
      // string with alteast one character
      if (str && str.length >= 1)
      {       
          var firstChar = str.charAt(0);
          var remainingStr = str.slice(1);
          str = firstChar.toUpperCase() + remainingStr;
      }
      document.getElementById(textboxid).value = str;
  }
  </script>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCU VMMS Admin Side</title>

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
                <a class="navbar-brand" href="Homepage.php"> MCU VMMS: Vehicle Monitoring and Management System </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> Messages <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Hello User <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                            <a href="Homepage.php"><i class="fa fa-bar-chart-o fa-fw"></i> Homepage </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Parking Monitoring Settings <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="UniversityParkingSpace.php"><i class="fa fa-list-alt fa-fw"></i> University Parking Space Settings </a>
                                </li>
                                <li>
                                    <a href="AddParkingLocation.php"><i class="fa fa-map-marker fa-fw"></i> Add Parking Location </a>
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
                                    <a href="AddCarType.php"><i class="fa fa-road fa-fw"></i> Add Car Type </a>
                                </li>
                                <li>
                                    <a href="Discount.php"><i class="fa  fa-sliders fa-fw"></i> Discount Settings </a>
                                </li>
                                <li>
                                    <a href="FlatRate.php"><i class="fa fa-pencil-square fa-fw"></i> Flat Rate Settings </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="ViewReports.php"><i class="fa fa-bar-chart-o fa-fw"></i> View Reports </a>
                        </li>
                        <li>
                            <a href="UserSettings.php"><i class="fa fa-user fa-fw"></i> User Settings </a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"> 
                    <h1 class="page-header"> Input Information </h1> 
                    

                </div>
                <!-- /.col-lg-12 -->
            </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <form method="POST" action="UserSettings.php">
                            <label> Last Name: </label>
                            <input type='txt' name="lastname" pattern="[A-Za-z-ñ]{2,}" title="letter only" id="mytextbox" onkeyup="javascript:capitalize(this.id, this.value);" 
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> First Name: </label>
                            <input type='txt' name="firstname" pattern="[A-Za-z-ñ]{2,}" title="letter only" id="mytextbox1" onkeyup="javascript:capitalize(this.id, this.value);"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Middle Initial: </label>
                            <input type='txt' name="midname"  pattern="[A-Za-z-ñ]{1}" title="one letter only" id="mytextbox2" onkeyup="javascript:capitalize(this.id, this.value);"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Username: </label>
                            <input type='txt' name="username"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Password: </label>
                            <input type='password' name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 7 or more characters"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Confirm Password:</label>
                            <input type='password' name="cpassword"
                            <input class="form-control" name="plate_number" placeholder="Enter Here...." required>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label>User Type:<label>
                        <select name = "usertype">
                        <option value ='Administrator'>Administrator</option>
                            <option value ='MainGate'>MainGate</option>
                            <option value ='Monitoring'>Monitoring</option>
                            <option value ='ExitGate'>ExitGate</option>
                        </select>
                            
                    <!-- /.col-lg-4 -->
                        </div>
                            <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-submit">Submit Button</button>



                    <!-- /.col-lg-12 -->


           
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>User Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                     $sql = "SELECT * FROM accounts_tbl";
        $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($result))
                {
                    $id = $row['user_id'];
                    $lname = $row['last_name'];
                    $mname = $row['middle_ini'];
                    $fname = $row['first_name'];
                    
                    $uname = $row['username'];
                    $pword = $row['password'];
                    $type = $row['user_type'];
            echo "<tr>";
                echo "<td>".$id."</td>";
                echo "<td>".$lname.","." ".$fname." ".$mname."</td>";
            
                echo "<td>".$uname."</td>";
                echo "<td>".md5($pword)."</td>";
                echo "<td>".$type."</td>";
                echo "<td>"."<a a href = 'update.php?id=$id' >Update</a>"."</td>";
            echo "<tr>";



                }
        ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
    if(isset($_POST['btn-submit']))
        {
                $lname = $_POST['lastname'];
                $fname = $_POST['firstname'];
                $mname = $_POST['midname'];
                $uname = $_POST['username'];
                $password = $_POST['password'];
                $cpword = $_POST['cpassword'];
                $type = $_POST['usertype'];

            if($password !== $cpword)
                {
                    echo "<script>alert('Password Not Match!'); window.location.replace('UserSettings.php');</script>";   
                    $_POST['cpasspword'] = $cpword;
                }
            else
                {
                    $query = "INSERT INTO accounts_tbl (last_name,first_name,middle_name,username,password,user_type) VALUES ('$lname','$fname','$mname','$uname','$password','$type')";
                    $result = mysqli_query($conn,$query);
                        if($result)
                            {
                                echo "<script>alert('New User has been Saved!'); window.location.replace('UserSettings.php')</script>";               
                            }
                }

        }

?>
