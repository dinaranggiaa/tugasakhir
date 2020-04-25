<link rel = "stylesheet" type="text/css" href="<?php echo base_url('assets/css/petugas.css');?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
<div class = "wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <br>
      <p>SISTEM PENUNJANG KEPUTUSAN SELEKSI CALON KARYAWAN<br>PT. DEALER HONDA JAYA UTAMA</p>
    </div>
      <br><br>
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
        <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
        <br>
        <?php echo "<a href='".base_url()."Login/lupapass'>Lupa Password?</a>"; ?>
        
    </form>
  </div>
</div>
