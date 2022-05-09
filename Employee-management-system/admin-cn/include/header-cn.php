<?php 
session_start();
    // database connection 
    require_once "../connection.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <title>VN Cable | Dashboard</title>
  <!-- Calendar -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/include/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="../admin/include/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../admin/include/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="../admin/include/plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/include/dist/css/adminlte.min.css"> 
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../admin/include/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="../admin/include/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="../admin/include/plugins/summernote/summernote-bs4.min.css"> -->
  <!-- Clock -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,600,900|Open+Sans+Condensed:300,300italic,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../admin/include/dist/css/clockA.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../admin/include/dist/img/logofit-remove.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>  
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:linear-gradient(to right, #131685, #5C4BC9);">
    <!-- Brand Logo -->
    <a href="../../Controller/index.php?action=test2-cn#" class="brand-link" style="height:10vh; background: linear-gradient(to left,#0AA379,#34C79F);"> 
      <img src="../admin/include/dist/img/logofit-remove.png" alt="FIT" class="brand-image img-circle elevation-3" style="opacity: 1;">
      <span class="brand-text font-weight" style="text-align: center;">VN Cable 自動化</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link" style="background:linear-gradient( to right,#2CA382,#42B394)">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                點名
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./attendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>今天點名</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>點名名單</p>
                </a>
              </li>
            </ul>
          </li>
              <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  統計
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./dashboard.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>請假統計</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./char2.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>統計點名</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  員工
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./add-employee.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>員工信息</p>
                  </a>
                </li>
                  <!-- <li class="nav-item">
                    <a href="./manage-employee.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>管理員工</p>
                    </a>
                  </li> -->
                
              </ul>
            </li>
            <li class="nav-item">
                  <a href="../../Controller/index.php?action=test2-cn#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>主題</p>
                  </a>
            </li>
            <li class="nav-item">
                  <a href="../../Controller/index.php?action=begin-cn" class="nav-link">
                    <i class="nav-icon fa fa-sign-out"></i>
                    <p>登出</p>
                  </a>
                </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 
  

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../admin/include/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../admin/include/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../admin/include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../admin/include/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../admin/include/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../admin/include/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../admin/include/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../admin/include/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../admin/include/plugins/moment/moment.min.js"></script>
<script src="../admin/include/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../admin/include/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../admin/include/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../admin/include/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/include/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../admin/include/dist/js/pages/dashboard.js"></script>
<script  src="../admin/include/dist/js/script.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../admin/include/dist/js/clock.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>
</html>
