<link rel = "stylesheet" type="text/css" href="<?php echo base_url('assets/css/petugas.css');?>">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
<div class = "wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <br>
      <div class="left-bar-admin" style="padding-bottom: 10px;"><img src="<?php echo base_url();?>assets/img/login.png"/></div>
      <p style="font-family: Roboto; color:#ffff; font-weight:bold; font-size:20px; padding-bottom:20px;">SISTEM PENUNJANG KEPUTUSAN<br>SELEKSI CALON KARYAWAN</p>
    </div>
      
    <?php
    if(!empty($login_invalid)){
      echo $login_invalid;
    }?>

    <form action="<?= base_url('Login/aksi_login'); ?>" method="post">

        <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="username" type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" id="password" class="form-control" name="password" placeholder="password">
        </div>

        <br>
        
          <input type="submit" name="submit" class="fadeIn fourth fas fa-door-open" value="Log In">
        <br>
        
        <?php echo "<a href='".base_url()."Login/lupapass'>Lupa Password?</a>"; ?>
        
    </form>
  </div>
</div>
