<?php
    include('dbconnection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCU VMMS </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Log in</h3>
                    </div>
                    <div class="panel-body">
                        <form action = "login.php" method = "POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required />
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type = "submit"  class="btn btn-lg btn-success btn-block" name = "btn-login" value = "Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<?php

if(isset($_POST['btn-login']))
{
    $uname=$_POST['username'];
    $pword=$_POST['password'];

    $query="SELECT * FROM accounts_tbl WHERE username='$uname' AND password='$pword'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);

        if($count >= 1)
            {       
                if ($row['user_type'] == "Administrator" )
                    {
                        session_start();
                        ob_start();
                           $_SESSION['id'] = $row['user_id'];             
                            $_SESSION['type'] = $row['user_type'];
                             $_SESSION['lname'] = $row['last_name'];   
                              $_SESSION['fname'] = $row['first_name'];  
                               $_SESSION['mi'] = $row['middle_name'];       
                            echo "<script>alert('login success'); window.location.replace('Homepage.php');</script>";
                    }

                else if ($row['user_type'] == "MainGate")
                    {
                        session_start();
                        ob_start();                  
                            $_SESSION['id'] = $row['user_id'];
                             $_SESSION['type'] = $row['user_type'];
                              $_SESSION['lname'] = $row['last_name'];  
                               $_SESSION['fname'] = $row['first_name']; 
                                $_SESSION['mi'] = $row['middle_name'];
                                 $_SESSION['time'] = $row['time'];     
                                  $_SESSION['plate_number']=$row['plate_number'];
                                   $_SESSION['vehicle_type']=$row['vehicle_type'];
                                    $_SESSION['purpose']=$row['purpose'];

                                echo "<script>alert('login success'); window.location.replace('MainGatehp.php');</script>";
                    }
                 else if ($row['user_type'] == "Monitoring")
                    {
                        session_start();
                        ob_start();                  
                            $_SESSION['id'] = $row['user_id'];
                             $_SESSION['type'] = $row['user_type'];
                              $_SESSION['lname'] = $row['last_name'];  
                               $_SESSION['fname'] = $row['first_name']; 
                                $_SESSION['mi'] = $row['middle_name'];      
                                echo "<script>alert('login success'); window.location.replace('Monitoringhp.php');</script>";
                    }
                 else if ($row['user_type'] == "ExitGate")
                    {
                        session_start();
                        ob_start();                  
                            $_SESSION['id'] = $row['user_id'];
                             $_SESSION['type'] = $row['user_type'];
                              $_SESSION['lname'] = $row['last_name'];  
                               $_SESSION['fname'] = $row['first_name']; 
                                $_SESSION['mi'] = $row['middle_name'];      
                                echo "<script>alert('login success'); window.location.replace('ExitGatehp.php');</script>";
                    }
            }
                else
                    {
                        echo "<script>alert('invalid username or password'); window.location.replace('login.php');</script>";                
                    }
}
            
            

?>
