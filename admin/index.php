  <?php 
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo"$k_k[nama]";?></title>
	    <!-- Bootstrap 3.3.5 -->
		   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../sys/bootstrap/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../sys/bootstrap/font/css/font-awesome.min.css">
  <link rel="stylesheet" href="../sys/bootstrap/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../sys/bootstrap/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../sys/bootstrap/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../sys/bootstrap/dist/css/skins/_all-skins.min.css">
	 	<script src="../sys/bootstrap/plugins/ckeditor/ckeditor.js"></script>  
     <style type="text/css">
		#progress-bar1 {
			background-color: red;
			width:0%;
			height:20px;
			-webkit-transition: width .3s;
			-moz-transition: width .3s;
			transition: width .3s;
		}
    #progress-bar {
      float: left;
      width: 0;
      height: 100%;
      font-size: 12px;
      line-height: 20px;
      color: #fff;
      text-align: center;
      background-color: #337ab7;
      -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
              box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
      -webkit-transition: width .6s ease;
          -o-transition: width .6s ease;
              transition: width .6s ease;
              background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
      background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
      background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
      -webkit-background-size: 40px 40px;
              background-size: 40px 40px;
              -webkit-animation: progress-bar-stripes 2s linear infinite;
       -o-animation: progress-bar-stripes 2s linear infinite;
          animation: progress-bar-stripes 2s linear infinite;
		}
		#progress-div {
			border:#ccc 1px solid;
			margin:30px 0px;
			border-radius:4px;
			text-align:center;
		}
		</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.aspx" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>SET</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">SI ASET</span>
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
                  <img src="../foto/logo.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">SI ASET </span>
                </a>
               
              </li>
              <!-- Control Sidebar Toggle Button -->
        
        
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
              <img src="../foto/logo.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>SELAMAT DATANG</p>
              <a href="index.aspx"><i class="fa fa-circle text-success"></i><?php echo"$k_k[nama]";?></a>
            </div>
          </div>
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include "menu.php"?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel kua</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.aspx"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		 <?php include "tengah.php"?>
		  </div>
		  </section>
<!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="#">Almsaeed Studio / Web Progremer (<?php echo"$k_k[akabest]";?> )</a>.</strong>  All rights reserved.
      </footer>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    
    <script src="../sys/bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="js/jquery.form.js"></script>	
<script src="js/script.js"></script>
    <!-- DataTables -->
    <script src="../sys/bootstrap/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../sys/bootstrap/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../sys/bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../sys/bootstrap/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../sys/bootstrap/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../sys/bootstrap/dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
