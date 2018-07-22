<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['admin_name'])){  
    header('location:index.php');

}else{
    include('../includes/config.php');
    $date=date('m/d/Y');
    $sel=mysqli_query($db, "SELECT * FROM `payments` WHERE `payment_type`='daily'");
    
   
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
        <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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

        <!-- Bootstrap Datatables -->
        <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
        <!-- Bootstrap select -->
        <link rel="stylesheet" href="../css/bootstrap-select.css">
        <!-- Bootstrap file input -->
        <link rel="stylesheet" href="../css/fileinput.min.css">



        <style type="text/css">
           body{ 
                margin-top:40px; 
            }

            .stepwizard-step p {
                margin-top: 10px;
            }

            .stepwizard-row {
                display: table-row;
            }

            .stepwizard {
                display: table;
                width: 100%;
                position: relative;
            }

            .stepwizard-step button[disabled] {
                opacity: 1 !important;
                filter: alpha(opacity=100) !important;
            }

            .stepwizard-row:before {
                top: 14px;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 100%;
                height: 1px;
                background-color: #ccc;
                z-order: 0;

            }

            .stepwizard-step {
                display: table-cell;
                text-align: center;
                position: relative;
            }

            .btn-circle {
              width: 30px;
              height: 30px;
              text-align: center;
              padding: 6px 0;
              font-size: 12px;
              line-height: 1.428571429;
              border-radius: 15px;
            }
        </style>

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
                                <a href="dashboard.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                        <h1 class="page-header">Users Paying Daily</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>   

                <div class="container">
                    <div class="panel panel-default">
                            <div class="panel-heading">Report</div>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>User Name</th>
                                            <th>Location</th>
                                            <th>Payment Mode</th>
                                            <th>Amount Paid</th>
                                            <th>Payment Date/Time</th>
                                            <th>Payment Valid Untill</th> 
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while ($cols2=mysqli_fetch_assoc($sel)) {
                                                $user_id_number=$cols2['user_id_number'];
                                                $sel2=mysqli_query($db, "SELECT * FROM `users` WHERE `id_number`='$user_id_number'");
                                                $cols=mysqli_fetch_assoc($sel2); ?>
                                        <tr>
                                            <td><?php echo $cols['id_number']; ?></td>
                                            <td><?php echo $cols['username']; ?></td>
                                            <td><?php echo $cols['location']; ?></td>
                                            <td><?php echo $cols2['payment_mode']; ?></td>
                                            <td><?php echo "Ksh ". $cols2['amount']; ?></td>
                                            <td><?php echo date("M jS, Y", strtotime($cols2['date_payed'])); ?>, <?php echo $cols2['time_payed']; ?></td>
                                            <td><?php echo date("M jS, Y", strtotime($cols2['valid_untill'])); ?></td>
                                        </tr>
                                        <?php
                                        }

                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    
                </div>            
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- scripts for data table -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap-select.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables.bootstrap.min.js"></script>
        <script src="../js/Chart.min.js"></script>
        <script src="../js/fileinput.js"></script>
        <script src="../js/chartData.js"></script>
        <script src="../js/main.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

   

    </body>
</html>
