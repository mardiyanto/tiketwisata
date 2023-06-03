<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.5 -->
    <link rel='stylesheet' href='sys/bootstrap/bootstrap/css/bootstrap.min.css'>
    <!-- Font Awesome -->
    <link rel='stylesheet' href='sys/bootstrap/bootstrap/font/css/font-awesome.min.css'>

    <!-- Theme style -->
    <link rel='stylesheet' href='sys/bootstrap/dist/css/AdminLTE.min.css'>
    <!-- iCheck -->
    <link rel='stylesheet' href='sys/bootstrap/plugins/iCheck/square/blue.css'>
  </head>
  <body class='hold-transition login-page'>
    <div class='login-box'>
      <div class='login-logo'>
        <a href=''><b>Admin</b>Login</a>
      </div><!-- /.login-logo -->
      <?php echo " 
	 <div class='login-box-body'>
        <p class='login-box-msg'>Login M</p>
        <form action='cek_login.php' method='post'>
          <div class='form-group has-feedback'>      <select class='form-control select2' style='width: 100%; name='jenis_user'>
	<option value=pegawai selected>Admin</option>
	<option value=dosen>Dosen</option>

</select>  </div>
		  <div class='form-group has-feedback'>
            <input type='text' name='id_user' class='form-control' placeholder='User'>
            <span class='glyphicon glyphicon-envelope form-control-feedback'></span>
          </div>
		 
          <div class='form-group has-feedback'>
            <input type='password' name='password' class='form-control' placeholder='Password'>
            <span class='glyphicon glyphicon-lock form-control-feedback'></span>
          </div>
          <div class='row'>
            <div class='col-xs-8'>
        
            </div><!-- /.col -->
            <div class='col-xs-4'>
              <button type='submit' class='btn btn-primary btn-block btn-flat'>Login</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
";
?>
    <!-- jQuery 2.1.4 -->
    <script src='sys/bootstrap/plugins/jQuery/jQuery-2.1.4.min.js'></script>
    <!-- Bootstrap 3.3.5 -->
    <script src='sys/bootstrap/bootstrap/js/bootstrap.min.js'></script>
    <!-- iCheck -->
    <script src='sys/bootstrap/plugins/iCheck/icheck.min.js'></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
