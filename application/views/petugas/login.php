<link rel = "stylesheet" type="text/css" href="<?php echo base_url('assets/css/petugas.css');?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

<div class = "wrapper fadeInDown">
  <div id="formContent">
    <!--Tabs Title-->

    <!-- Icon -->
    <div class="fadeIn first">
      <br>
      <h4>SISTEM INFORMASI <BR> POJOK DOTS</h4>
      <br>
      <br>
      <p>Klinik Utama <br>Jakarta Respiratory Centre</p>
      <br>
      <br>
    </div>

    <?php
    if(!empty($login_invalid))
    {
      echo $login_invalid;
    }?>

    <!--Login Form-->

    <?php //echo form_open('Petugas/login'); ?>
    <form action="<?= base_url('Petugas/aksi_login'); ?>" method="post">
        <!--<input type="text" id="username" class="fadeIn second" name="username" placeholder="username">-->

        <div class="input-group">
           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="username" type="text" class="form-control" name="username" placeholder="Username">

        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" id="password" class="form-control" name="password" placeholder="password">
        </div>

        <br>
        <br>
        <br>
        <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
        <br>
        <?php echo "<a href='".base_url()."index.php/Petugas/register'>Register ||</a>"; ?>
        <?php echo "<a href='".base_url()."index.php/Petugas/lupapass'>Lupa Password</a>"; ?>
    </form>

  </div>
</div>
