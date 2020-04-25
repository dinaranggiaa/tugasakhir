<link rel = "stylesheet" type="text/css" href="<?php echo base_url('assets/css/petugas.css');?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
<style>

  h4.lp{
    float: left;
  }
  .demo-table {
    border-collapse: collapse;
    font-size: 12px;
    width: 100%;
  }

  .demo-table td:first-child {
    width: 400px;
    text-align: left;
  }

  .demo-table td:nth-child(2) {
    width: 30px;
    text-align: left;
  }
  .demo-table td {
    /* border: 1px solid #2ed573; */
    padding: 7px 17px;
  }

  /* Table Body */
  .demo-table tbody td {
    color: #353535;
  }
  .but {
      margin-right: 60px;
  }
  input[type=text-login]{
    margin-left: 0px;
  }
</style>

<div class = "wrapper fadeInDown">
  <div id="formContent">
    <!--Tabs Title-->

    <!-- Icon -->
    <div class="fadeIn first">
      <br>
      <!-- <p>SISTEM PENUNJANG KEPUTUSAN SELEKSI CALON KARYAWAN<br>PT. DEALER HONDA JAYA UTAMA</p> -->
      <p>Reset Password</p>
    </div>

    <?php
    if(!empty($login_invalid))
    {
      echo $login_invalid;
    }?>

    <!--Login Form-->
    <?php echo form_open('Login/ubahpassword'); ?>

      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="username" type="text" class="form-control" name="username" value="<?php set_value('username')?>" name="username" required="" placeholder="Username">
      </div>
      
      <br>

      <div class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
       <input type="password" id="password" class="form-control" name="password" required placeholder="Password Baru">
      </div>

      <br>

      <div class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
       <input type="password" id="password2" class="form-control" name="password2" required placeholder="Konfirmasi Password Baru">
      </div>
        <br>
         <input type='submit'class="button button4" class="fadeIn fourth" name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
        <br>
        <?php echo "<a href='".base_url()."index.php/Login/index'>Login</a>"; ?>


        <script type="text/javascript">
          window.onload = function() {
            document.getElementById("password").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
          }

          function validatePassword(){
            var password2 = document.getElementById("password2").value;
            var password = document.getElementById("password").value;

            if(password!=password2)
              document.getElementById("password2").setCustomValidity("Password Tidak Sesuai");
            else
              document.getElementById("password2").setCustomValidity('');
          }
        </script>
    </form>

  </div>
</div>
