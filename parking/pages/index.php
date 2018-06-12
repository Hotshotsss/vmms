<?php
include('dbconnection.php');
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>


<form method = "POST" action = "index.php">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">MCU - VMMSS Login</h3>
                    </div>
                    <div class="panel-body">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Username" name="txtuname" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Password" name="txtpword" type="password" value="">
                                </div>
                                <input type = "submit"  name = "btn-login" value = "Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
</body>

</html>

<?php
    if(isset($_POST['btn-login']))
    {
        $user_uname = $_POST['txtuname'];
        $user_pword = $_POST['txtpword'];

        $sql = "SELECT * FROM account_tbl WHERE user_uname = '$user_uname' AND user_pword = '$user_pword' ";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

            $user_fname = $row['user_fname'];
            $user_mname = $row['user_mname'];
            $user_lname = $row['user_lname'];
            $user_type = $row['user_type'];

            $fullname = $user_lname.", ".$user_fname." ".$user_mname;

        if($count == 1)
        {
            if($user_type == "Security Guard")
                {
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['user_type'] = $user_type;
                    echo "<script>alert('Welcome Administrator'); window.location.replace('menu.php');</script>";
                }

            else if($user_type == "Main Gate")
                {
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['user_type'] = $user_type;
                    echo "<script>alert('Welcome User'); window.location.replace('menu.php');</script>";
                }

            else if($user_type == "Exit Gate")
                {
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['user_type'] = $user_type;
                    echo "<script>alert('Welcome User'); window.location.replace('menu.php');</script>";
                }
        }

        else 
        {
            echo "<script>alert('Wrong username and Password'); window.location.replace('index.php');</script>";
        }

    }

?>
