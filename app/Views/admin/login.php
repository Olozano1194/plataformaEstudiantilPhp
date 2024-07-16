<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Estudiantil | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- logo icon parte superior -->
  <link rel=icon href="<?php echo base_url()?>assets/template/dist/img/logope_ico.ico" sizes="32x32" type="image/png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
        <div class="login-logo">
            <img src="assets/template/dist/img/logope_login.png"/>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Introduzca sus datos de ingreso</p>
            <?php if(session()->getFlashdata("Error")):?>
                <div class="alert alert-danger">
                    <p><?php echo session()->getFlashdata("Error") ?></p>                
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url();?>Auth/login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
     <!-- /.login-box -->    
    <!-- jQuery 3 -->
    <script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
        
</body>
</html>
