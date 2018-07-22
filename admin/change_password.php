<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['admin_name'])){  
    header('location:index.php');

}else{
 include('../includes/config.php');
 $email=$_SESSION['email'];
// Code for change password 
if(isset($_POST['submit'])) {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$confirmpassword=md5($_POST['confirmpassword']);
$error="";

if ($newpassword!=$confirmpassword) {
    $error="Your password does not match";
}
if (empty($error)) {
    $check=mysqli_query($db,"SELECT * FROM `admin` WHERE `email`='$email'");
    $cols=mysqli_fetch_assoc($check);
    $db_pass=$cols['password'];
if ($password==$db_pass) {
    $update=mysqli_query($db,"UPDATE `admin` SET `password`='$newpassword' WHERE `email`='$email'");
    if ($update) {
        $msg="Password updated successfully";
    }else{
        $error="Something went wrong. Please try again";
    }
    
}else{
    $error="Current password does not match the one previously set";
   }
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

        <title>County Tax Management System- Admin Update Password</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">County Tax Management System- Admin</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Home</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['admin_name']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="change_password.php"><i class="fa fa-gear fa-fw"></i> Update Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
           

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="dashboard.php"  class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="register_user.php"><i class="fa fa-user-plus fa-fw"></i> Register User</a>
                            </li>
                            <li>
                                <a href="registered_users.php"><i class="fa fa-group fa-fw"></i> Registered Users</a>
                            </li>                            
                            <li>
                                <a href="users_payment_reports.php"><i class="fa fa-clipboard fa-fw"></i>User's Payment Reports</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </nav>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Form fields</div>
                                    <div class="panel-body">
                                        <form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
                                        
                                            
                  <?php if($error){?><div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Current Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="password" id="password" required>
                                                </div>
                                            </div>
                                            <div class="hr-dashed"></div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">New Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                                                </div>
                                            </div>
                                            <div class="hr-dashed"></div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Confirm Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required></br>
                                                    <div id="error_msg"></div>
                                                </div>
                                            </div>
                                            <div class="hr-dashed"></div>
                                        
                                
                                            
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">
                                
                                                    <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                </div>
        
            
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
