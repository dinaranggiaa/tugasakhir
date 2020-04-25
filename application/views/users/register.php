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
      margin: 0px;
    }
  </style>

<div class = "wrapper fadeInDown">
  <div id="formContent">
    <!--Tabs Title-->

    <!-- Icon -->
    <div class="fadeIn first">
      <br>
      <h4>SISTEM INFORMASI <BR> POJOK DOTS</h4>
      <br>
      <br>
      <p>KLINIK UTAMA<br>JAKARTA RESPIRATORY CENTRE</p>
      <br>
      <br>
    </div>

    <?php
    if(!empty($login_invalid))
    {
      echo $login_invalid;
    }?>

    <!--Login Form-->
    <?php echo form_open('Petugas/SimpanPetugas'); ?>
        <table class="demo-table">
            <input type="hidden" name="id_petugas" value="<?php echo $kode?>" id="id_petugas">

           <div class="input-group">
            <tr>
                <td><label>Nama Lengkap</label></td>
                <td><input id="nm_petugas" type="text-login" class="form-control" name="nm_petugas" required=""></td>
            </tr>
          </div>

          <div class="input-group">
             <tr>
                <td><label>Username</label></td>
                <td><input id="username" type="text-login" class="form-control" value="<?php set_value('username')?>" name="username" required=""></td>
             </tr>
          </div>

          <div class="input-group">
            <tr>
              <td><label>Password</label></td>
              <td><input type="password" id="password" class="form-control" name="password" required></td>
            </tr>
          </div>

          <div class="input-group">
            <tr>
              <td><label>Konfirmasi Password</label></td>
              <td><input type="password" id="password2" class="form-control" name="password2" required></td>
            </tr>
          </div>

        </table>
        <br>
        <br>
        <br>
         <input type='submit'class="button button4" class="fadeIn fourth" name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;


        <br>
        <?php echo "<a href='".base_url()."index.php/Petugas/index'>Login</a>"; ?>


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
