<?php
  session_start();  
  if(!$_SESSION['admin_name'] && !$_SESSION['admin_password'])  
  {    
      header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
  }
  else {  
?>
<?php
  require_once("config.php");
  $users_query = mysql_query("select user_id from tbl_users");
  $users_count = mysql_num_rows ( $users_query );

  $booking_query = mysql_query("select booking_id from tbl_booking");
  $booking_count = mysql_num_rows ( $booking_query );

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminBooking | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!--<link rel="stylesheet" href="bootstrap/css/custom_css.css">-->
   
    <!--this file contains all ajax methods like get requests methods-->
    <script type="text/javascript" src="ajax/ajaxMethods.js"></script>
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
      <?php
         require_once("config.php");
      ?>  
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>B</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>Booking</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user8-128x128.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['admin_name'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user8-128x128.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['admin_name'];?> - Admin
                      <small>Last Login <?php echo $_SESSION["admin_last_login_time"];?> </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
             
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user8-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['admin_name'];?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Manage Match</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#AddNewMatch" onClick="getMatchPage();"><i class="fa fa-circle-o"></i> Add New Match</a></li>
                <li><a href="#" onClick="getAllTicketsDetails();"><i class="fa fa-circle-o"></i> Manage Tickets</a></li>
                <li><a href="#" onClick="getAllVideos();"><i class="fa fa-circle-o"></i> Manage Videos</a></li>
                <li><a href="#" onClick="getAllBooking();"><i class="fa fa-circle-o"></i> Manage Bookings</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#" onClick="getAllTeams();">
                <i class="fa fa-futbol-o"></i>
                <span>Manage Teams</span>                
              </a>              
            </li>
            <!-- <li class="treeview">
              <a href="#" onClick="getAllLevels();">
                <i class="fa fa-bars"></i>
                <span>Manage Levels</span>                
              </a>              
            </li> -->
            <li class="treeview">
              <a href="#" onClick="getAllChampions();">
                <i class="fa fa-trophy"></i>
                <span>Manage Champion</span>                
              </a>              
            </li>
            <li class="treeview">
              <a href="#" onClick="getAllPlaces();">
                <i class="fa fa-map-marker"></i>
                <span>Manage Places</span>                
              </a>              
            </li>
            <li class="treeview">
              <a href="#" onClick="getAllNews();">
                <i class="fa fa-newspaper-o"></i>
                <span>Manage News</span>                
              </a>              
            </li>
            <li class="treeview">
              <a href="#" onClick="getAllUsers();">
                <i class="fa fa-users"></i>
                <span>Manage Accounts</span>                
              </a>              
            </li>
            <li>
              <a href="#" onClick="getAllMessages();">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
              </a>
            </li>
            <li>
              <a href="#" onClick="getAllAdmins();">
                <i class="fa fa-user"></i> <span>Add Admin</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>  
      <!-- Content Wrapper. Contains page content -->
      
      <div class="content-wrapper" id="content-section">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Staticitics</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <!--the content section which will contains  any page -->
        <section class="content" >
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $booking_count;?><sup style="font-size: 20px"></sup></h3>
                  <p>Booking Numbers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">BookingEgypt.com <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-md-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $users_count;?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">BookingEgypt.com <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!-- <div class="col-md-4 col-xs-6"> -->
              <!-- small box -->
             <!--  <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> --><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
          </div> 
          <!--End of Main Row-->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">        
        <strong>Copyright &copy; 2015-2016 <a href="#">Tickets Booking</a>.</strong> All rights reserved.
      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
<?php } ?>