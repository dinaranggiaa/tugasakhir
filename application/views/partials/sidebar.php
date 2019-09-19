<!-- <script>setInterval('autoRefresh()', 10000);</script> -->

<!DOCTYPE html>
<html lang="en">
</html>
<head>
  <title>Pojok Dots | Klinik JRC</title>
  <link rel = "icon" type="image/png" href="<?php echo base_url('assets/img/favicon.jpg');?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.js'?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jqueryui/jquery-ui.css');?>">
  <script type="text/javascript" src="<?php echo base_url().'js/jquery-3.4.1.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/jqueryui/jquery-ui.js'?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/js/app.js') ?>"></script>
  <script src="<?= base_url('assets/timepicker_1_6_3/jquery-ui-timepicker-addon.js') ?>"></script>

  <script src="<?= base_url('assets/js/jquery-1.12.4.min.js') ?>"></script>
  <script src="<?= base_url('assets/jquery_ui_1_12_0/jquery-ui.min.js') ?>"></script>
  <script src="<?= base_url('assets/timepicker_1_6_3/jquery-ui-timepicker-addon.js') ?>"></script>
  <script src="<?= base_url('assets/bootstrap_3_3_6/js/bootstrap.min.js') ?>"></script>
  <style>
    .user {
      color: white;
      /* border: 1px solid white; */
      width: 50px;
      height: 50px;
      position: relative;
      left: 95px;
      bottom: 33px;
    }

    a:hover {
      /* color: green; */
      text-decoration: none;
    }

    .left-bar-isi p {
      margin-top: 10px;
    }

    .main {
      font-size: 10px;
      color: white;
      text-transform: uppercase;
      position: relative;
      top: 60px;
      left: 20px;
    }
  </style>

</head>

<body>

  <div class="container-fluid">

    <div class="left-bar">
      <div class="top-text">KLINIK UTAMA JRC</div>
      <hr>
        <div class="left-bar-admin"><img src="<?php echo base_url();?>assets/img/admin.png"/></div>
        <div class="user"><?= $this->session->userdata('nama'); ?></div>
      <br class="clear">
      <p class="main">Main</p>
      <div class="left-bar-isi">
        <p>
          <?php echo "<a href='".base_url()."Dashboard/index'>Home</a>"; ?>
        </p>

        <p>
          <?php echo "<a href='".base_url()."Absensi/index'>Absensi Pasien</a>"; ?>
        </p>

        <p>
          <?php echo "<a href='".base_url()."Checkup/listcheckup'>Data Check-up</a>"; ?>
        </p>
        <div class="dropdown">
        <button class="dropbtn">Data Pasien
        <i class="fa fa-caret-down"></i>
        </button>
          </div>
          <div class="dropdown-child">
            <p><?php echo "<a href='".base_url()."Pendataan/listpasien'>Pasien</a>"; ?></p>
            <p><?php echo "<a href='".base_url()."Faskes/listpasientbc'>Pasien Tuberculosis</a>"; ?></p>
        </div>

        <div class="dropdown">
        <button class="dropbtn">Reminder Pasien
        <i class="fa fa-caret-down"></i>
        </button>
          </div>
          <div class="dropdown-child">
            <p><?= anchor('sent', '<span></span> Pesan Terkirim') ?></p>
            <p><?= anchor('sms-scheduled', '<span></span> Pesan Terjadwal') ?></p>
        </div>

        <div class="dropdown">
        <button class="dropbtn">Hasil Pemeriksaan</button>
          </div>
          <div class="dropdown-child">
            <p><?php echo "<a href='".base_url()."Cek_dahak/listdahak'>Dahak</a>"; ?></p>
            <p><?php echo "<a href='".base_url()."Cek_diabetes/listdiabetes'>Diabetes</a>"; ?></p>
            <p><?php echo "<a href='".base_url()."Cek_hiv/listhiv'>HIV</a>"; ?></p>
            <p><?php echo "<a href='".base_url()."Hasil_akhir/listpasien'>Hasil Akhir</a>"; ?></p>
        </div>

        <div class="dropdown">
        <button class="dropbtn">Laporan</button>
          </div>
          <div class="dropdown-child">
            <p><?php echo "<a href='".base_url()."Laporan/pengobatanpasien'>Pengobatan Pasien</a>"; ?></p>
            <p><?php echo "<a href='".base_url()."Laporan/kehadirancheckup'>Kehadiran Check-up</a>"; ?></p>
            <p><?php echo "<a href='".base_url()."Laporan/hasilakhir'>Akhir Pengobatan</a>"; ?></p>

        </div>

        <p>
          <?php echo "<a href='".base_url()."Petugas/logout'>Logout</a>"; ?>
        </p>
      </div>

    </div>

    <div class="center">
      <div class="header"><h1>SISTEM INFORMASI POJOK DOTS | KLINIK UTAMA JRC</h1></div>
    </div>

      <script>
      var dropdown = document.getElementsByClassName("dropdown");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
