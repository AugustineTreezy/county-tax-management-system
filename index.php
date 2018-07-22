<?php
session_start();
error_reporting(0);
if (isset($_POST['login'])) {
    include('includes/config.php');
    error_reporting(0);
    if ($_POST['id_number'] &&
        $_POST['password']) {
        $id_number = $_POST['id_number']; 
        $password = $_POST['password'];
        $new_password=md5($password);

        $res=mysqli_query($db,"SELECT * FROM `users` WHERE `id_number`='$id_number' AND `password`='$new_password'");
        $cols=mysqli_fetch_assoc($res);
        $username=$cols['username'];
        $num=mysqli_num_rows($res);
        if ($num==1) {
            $_SESSION['username'] = $username;
            $_SESSION['id_number'] = $id_number;

            //if user is using default password take him to update password            
                if ($password==$id_number) {
                    header("location:change_password.php");
                }else{
                    header("location:user_dashboard.php");
                }               
               
        }else{?>
          <script type="text/javascript">
            alert("Invalid username or password");
          </script>

        <?php

        }
    }
	
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

        <title>County County Tax Management System- User Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="ID Number" name="id_number" type="id_number" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Login</button>
                                
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <center>
            Default password is your ID Number
            </center>
        </footer>
        </div>
        

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
