<!DOCTYPE html>



<html>



  <head>



    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <title>St. Yves Admin Panel | Reset Password</title>



    <!-- Tell the browser to be responsive to screen width -->

  	<link rel="shortcut icon" href="<?php echo base_url('assets/images/styves-logo.jpg')?>">



    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



    <!-- Bootstrap 3.3.5 -->



    <link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/bootstrap.min.css')?>">





    <!-- Font Awesome -->



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">



    <!-- Ionicons -->



    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



    <!-- Theme style -->



    <link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/AdminLTE.min.css')?>">



    <link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/style.css')?>">



  </head>


   <body class="hold-transition login-page">
      <div class="login-box">

			<div class="login-logo">

         		<a href="<?=base_url('auth')?>" class="logo"><img  width="180px" src="<?= base_url('assets/images/styves-logo.png')?>" alt=""></a>

         	</div>            <!-- /.login-logo -->                  
         <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open('auth/reset_password/' . $code);?>			
            <div class="form-group has-feedback">        <input type="password" class="form-control" name="new" value="" placeholder="New Password" id="new" >        <span class="glyphicon glyphicon-lock form-control-feedback"></span>      </div>
            <div class="form-group has-feedback">        <input type="password" class="form-control" name="new_confirm" value="" placeholder="Confirm New Password" id="new_confirm">        <span class="glyphicon glyphicon-lock form-control-feedback"></span>      </div>
            <div class="row">
               <div class="text-center">                                 <button type="submit" class="btn btn-primary  btn-flat">Reset</button>                              </div>
               <!-- /.col -->                        
            </div>
            <?php echo form_input($user_id);?>	<?php echo form_hidden($csrf); ?>            <?php echo form_close();?>                  
         </div>
         <!-- /.login-box-body -->            
      </div>
      <!-- /.login-box -->      <!-- jQuery 2.1.4 -->      <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>       <!-- Bootstrap 3.3.5 -->      <script src="<?php echo base_url('assets/adminPanel/scripts/bootstrap.min.js')?>"></script>      <!-- iCheck -->      
   </body>
</html>