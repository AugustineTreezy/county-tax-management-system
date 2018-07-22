<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){  
    header('location:index.php');

}else{
    $id_number = $_SESSION['id_number'];
    include('includes/config.php');
    $sel=mysqli_query($db, "SELECT * FROM `users` WHERE `id_number`='$id_number'");
    $cols=mysqli_fetch_assoc($sel);
    if (isset($_POST['submit'])) {
        $name=mysqli_real_escape_string($db, trim($_POST['name']));
        $email=mysqli_real_escape_string($db, trim($_POST['email']));
        $location=mysqli_real_escape_string($db, trim($_POST['location'])); 
        $phone=mysqli_real_escape_string($db, trim($_POST['phone_number']));        

        $ins=mysqli_query($db, "UPDATE `users` SET `username`='$name',`email`='$email',`location`='$location', `phone`='$phone' WHERE `id_number`='$id_number'");

        if ($ins) {
            $msg="Details succesfully updated";
            $sel=mysqli_query($db, "SELECT * FROM `users` WHERE `id_number`='$id_number'");
            $cols=mysqli_fetch_assoc($sel);
        }else {
            $error="Something went wrong. Please try again";

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

        <title>County Tax Management System- Update Profile</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/morris.css" rel="stylesheet">

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

        <div id="wrapper">

             <!-- Navigation -->
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="user_dashboard.php">County Tax Management System</a>
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
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="update_profile.php"><i class="fa fa-gears fa-fw"></i> Update Profile</a>
                            </li>
                            <li class="divider"></li>
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
                                <a href="user_dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="make_payment.php" ><i class="fa fa-dollar fa-fw"></i> Make Payment</a>
                            </li>
                            <li>
                                <a href="payment_reports.php"><i class="fa fa-clipboard fa-fw"></i> Payment Reports</a>
                            </li>
                            <li>
                           
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Update Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->                                    

                    <div class="col-md-10">
                        <!-- start of error and success messages -->
                                    <?php if($error){?><div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                else if($msg){?><div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                    <!-- end of error and success messages -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">User Info</div>
                                    <div class="panel-body">
                                <form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">

                                    <div class="container">
                                  <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="name">Name:</label>
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo $cols['username'] ?>" id="name" placeholder="Enter user name" name="name" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="email">Email:</label>
                                      <div class="col-sm-6">
                                        <input type="email" class="form-control" value="<?php echo $cols['email'] ?>" id="email" placeholder="Enter email address" name="email" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="id_number">ID Number:</label>
                                      <div class="col-sm-6">
                                        <input type="Number" class="form-control" value="<?php echo $cols['id_number'] ?>" id="id_number" placeholder="Enter id number" name="id_number" required disabled>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="phone_number">Phone Number:</label>
                                      <div class="col-sm-6">
                                        <input type="Number" class="form-control" value="<?php echo $cols['phone'] ?>" id="phone_number" placeholder="Enter phone number" name="phone_number" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="location">Location:</label>
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo $cols['location'] ?>" id="location" placeholder="Enter your location" name="location">
                                      </div>
                                    </div>
                                    <div class="form-group">        
                                      <div class="col-sm-offset-2 col-sm-6">
                                        <button type="submit" class="btn btn-info" name="submit">Save Changes</button>
                                      </div>
                                    </div>
                                  </form>
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
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="js/raphael.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
