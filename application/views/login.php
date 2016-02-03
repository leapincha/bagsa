<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BAGSA | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url() .'assets/css/bootstrap.min.css'?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url() .'assets/css/AdminLTE.min.css'?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url() .'assets/plugins/iCheck/square/blue.css'?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="http://www.bagsa.com.ar" target="_blank"><b>Buenos Aires Gas </b>S.A.</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Log In</p>
        <?php echo my_validation_errors(validation_errors()); ?>
        <?php echo form_open('login'); ?>
          <div class="form-group has-feedback">
            <input type="user" class="form-control" placeholder="Usuario" name="username" id="username" value="<?php echo set_value('username'); ?>"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input value="" class="form-control" placeholder="Password" type="password" name="password" id="password" value="<?php echo set_value('password'); ?>"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" class="btn btn-warning btn-block btn-flat">Ingresar</button>
            </div><!-- /.col -->
          </div>
        </form>

     

        
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() .'assets/plugins/jQuery/jQuery-2.1.4.min.js'?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url() .'assets/js/bootstrap.min.js'?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() .'assets/plugins/iCheck/icheck.min.js'?>" type="text/javascript"></script>
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