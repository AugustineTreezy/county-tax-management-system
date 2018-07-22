<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['admin_name'])){  
    header('location:index.php');

}else{
    include('../includes/config.php');
    date_default_timezone_set("Africa/Nairobi");
    $time=date("h:ia");
    $date=date('m/d/Y');
    if (isset($_POST['submit'])) {
        $name=mysqli_real_escape_string($db, trim($_POST['name']));
        $phone=mysqli_real_escape_string($db, trim($_POST['phone']));
        $id_number=mysqli_real_escape_string($db, trim($_POST['id_number']));
        $password=md5($id_number);

        $ins=mysqli_query($db, "INSERT INTO `users`(`id`, `username`, `email`, `password`, `location`, `id_number`, `phone`) VALUES ('','$name','','$password','','$id_number','$phone')");

        if ($ins) {
            $msg="User has been added successfully";
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

        <title>County Tax Management System- Admin</title>

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
                                <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="register_user.php" class="active"><i class="fa fa-user-plus fa-fw"></i> Register User</a>
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
                        <h1 class="page-header">Register User</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="col-lg-10">
                    

                <!-- start of error and success messages -->
                <?php if($error){?><div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
            else if($msg){?><div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <!-- end of error and success messages -->
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                User Info
                            </div>
                            <div class="panel-body">                                  
                             <div class="container">
                                  <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="name">Name:</label>
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" placeholder="Enter user name" name="name" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="phone">Phone Number:</label>
                                      <div class="col-sm-6">
                                        <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="phone">ID Number:</label>
                                      <div class="col-sm-6">
                                        <input type="Number" class="form-control" id="id_number" placeholder="Enter id number" name="id_number" required>
                                      </div>
                                    </div>
                                    <div class="form-group">        
                                      <div class="col-sm-offset-2 col-sm-6">
                                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                                   
                                
                            </div>
                            <div class="panel-footer">
                                <center>
                                <?php echo date("D M jS, Y", strtotime($date)); ?> 
                                </center>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
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
