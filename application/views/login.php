<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Portal Presensi | Log in</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/adminlte.min.css">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="login-logo">
            <a href="#"><b>Portal</b>Presensi</a>
         </div>
         <div class="card">
            <div class="card-body login-card-body">
               <p class="login-box-msg">Masuk untuk Memulai</p>
               <?php if($this->session->flashdata('login_error')){?>
                  <h5 class='text-center text-danger font-weight-bold'><?php echo $this->session->flashdata('login_error'); ?></h5>
               <?php }?>
               <form action="<?php echo site_url('welcome/proses_login')?>" method="post">
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Username" name="username" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" placeholder="Password" name="password" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="<?= base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="<?= base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="<?= base_url('assets/')?>dist/js/adminlte.min.js"></script>
   </body>
</html>