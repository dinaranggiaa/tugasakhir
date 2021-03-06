<!DOCTYPE html>
<html lang="en">
<head>
  <title>SISTEM PENDUKUNG KEPUTUSAN - SELEKSI CALON KARYAWAN PT DEALER HONDA JAYA UTAMA</title>
  <link rel = "icon" type="image/png" href="<?php echo base_url('assets/img/honda.png');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css');?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jqueryui/jquery-ui.css');?>">
  
  <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'js/jquery-3.4.1.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/jqueryui/jquery-ui.js'?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/js/app.js') ?>"></script>
  <script src="<?= base_url('assets/timepicker_1_6_3/jquery-ui-timepicker-addon.js') ?>"></script>
  
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <script src="<?= base_url('assets/js/jquery-1.12.4.min.js') ?>"></script>
  <script src="<?= base_url('assets/jquery_ui_1_12_0/jquery-ui.min.js') ?>"></script>
  <script src="<?= base_url('assets/timepicker_1_6_3/jquery-ui-timepicker-addon.js') ?>"></script>
  <script src="<?= base_url('assets/bootstrap_3_3_6/js/bootstrap.min.js') ?>"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</head>

<body>
  <div class="container-fluid">
    <div class="left-bar">
      <div class="top-text" style="margin-left: 15px;">PT JAYA UTAMA MOTOR</div>
      <div class="left-bar-admin"><img style="width:50%"; src="<?php echo base_url();?>assets/img/sidebar.png"/></div>
      <hr>
      <div class="menu-sidebar">
        <ul>
            <li ><?php echo "<a href='".base_url()."Dashboard/dashboard_admin'><i class='fas fa-fas fa-desktop'> &nbsp; </i>Dashboard</a>"; ?></li>
              
            <li>
              <div class="dropdown">
                <button class="dropbtn"><i class='fas fa-archive'> &nbsp; </i>Entri Data Master&nbsp;<i class='fas fa-caret-down'></i></button>
              </div>
              <div class="dropdown-child">
                <ul><?php echo "<a href='".base_url()."C_Pelamar/index'><i class='fas fa-user-alt'> &nbsp; </i>Data Pelamar</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_Karyawan/index'><i class='fas fa-user-alt'> &nbsp; </i>Data Karyawan</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_Divisi/index'><i class='fas fa-user-alt'> &nbsp; </i>Data Posisi</a>"; ?></ul>
                <!-- <ul><?php echo "<a href='".base_url()."C_PenilaianPelamar/index'><i class='fab fa-readme'> &nbsp; </i>Data Penilaian</a>"; ?></ul> -->
                <ul><?php echo "<a href='".base_url()."C_Kriteria/index'><i class='fab fa-kickstarter'> &nbsp; </i>Data Kriteria</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_Subkriteria/index'><i class='far fa-file-alt'> &nbsp; </i> Data Sub Kriteria</a>"; ?></ul>
                <!-- <ul><?php echo "<a href='".base_url()."C_NTarget/index'><i class='far fa-file-alt'> &nbsp; </i> Data Nilai Target</a>"; ?></ul> -->
                <!-- <ul><?php echo "<a href='".base_url()."C_Divisi/index'><i class='far fa-calendar-alt'> &nbsp; </i>Data Posisi</a>"; ?></ul> -->
                <ul><?php echo "<a href='".base_url()."C_Periode/index'><i class='far fa-calendar-alt'> &nbsp; </i>Data Periode</a>"; ?></ul>
              </div>
            </li>

            <li>
              <div class="dropdown">
                <button class="dropbtn"><i class='fas fa-archive'> &nbsp; </i>Entri Data Transaksi&nbsp;<i class='fas fa-caret-down'></i></button>
              </div>
              <div class="dropdown-child">
                <ul><?php echo "<a href='".base_url()."C_TargetKriteria/index'><i class='far fa-file-alt'> &nbsp; </i> Data 
                Target Kriteria</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_TargetSubkriteria/index'><i class='far fa-file-alt'> &nbsp; </i> Data Target Sub Kriteria</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_PenilaianPelamar/index'><i class='far fa-list-alt'> &nbsp; </i>Penilaian Pelamar</a>"; ?></ul>
               
              </div>
            </li>

            <li>
              <!-- <div class="dropdown">
                <button class="dropbtn"><i class='fas fa-archive'> &nbsp; </i>Entri Data Penilaian&nbsp;<i class='fas fa-caret-down'></i></button>
              </div> -->
              <!-- <div class="dropdown-child">
                <ul><?php echo "<a href='".base_url()."C_PenilaianPelamar/index'><i class='far fa-list-alt'> &nbsp; </i>Penilaian Pelamar</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_Kriteria/index'><i class='fab fa-kickstarter'> &nbsp; </i>Data Kriteria</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_NTarget/index'><i class='far fa-file-alt'> &nbsp; </i> Nilai Target Kriteria</a>"; ?></ul>

              </div> -->
            </li>
            <li>
              <div class="dropdown">
                <button class="dropbtn"><i class='fas fa-calculator'> &nbsp; </i>Proses Perhitungan&nbsp;<i class='fas fa-caret-down'></i></button>
              </div>
              <div class="dropdown-child">
                <ul><?php echo "<a href='".base_url()."C_ProsesAHP/input_divisi'><i class='fa fa-spinner'> &nbsp; </i>Perbandingan Kriteria</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_ProsesAHP/input_kriteria'><i class='fa fa-spinner'> &nbsp; </i>Perbandingan Sub Kriteria</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_ProsesPM/index'><i class='fas fa-sync'> &nbsp; </i>Analisis Pelamar</a>"; ?></ul>
                <!-- <ul><?php echo "<a href='".base_url()."C_ProsesPM/periode_keputusan'><i class='fas fa-newspaper'> &nbsp; </i>Hasil Keputusan</a>"; ?></ul> -->
              </div>
            </li>
            <li>
              <div class="dropdown">
                <button class="dropbtn"><i class='fas fa-archive'></i> &nbsp;Laporan &nbsp;<i class='fas fa-caret-down'></i></button>
              </div>
              <div class="dropdown-child">
                <ul><?php echo "<a href='".base_url()."C_Laporan/Periode_Rekomendasi'><i class='fas fa-medal'> &nbsp; </i>Rekomendasi Pelamar</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_Laporan/Periode_Keputusan''><i class='far fa-list-alt'> &nbsp; </i>Hasil Keputusan</a>"; ?></ul>
                <ul><?php echo "<a href='".base_url()."C_Laporan/Periode_Karyawan_Baru''><i class='far fa-address-book'> &nbsp; </i>Data Karyawan Baru</a>"; ?></ul>
              </div>
            </li>
            
          </ul>
      </div>
  </div>

  <div class="menu-sidebar">
    <div class="center">
      <div class="header">
        <span style="font-family: 'Raleway','Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size:15px; padding-left:10px; padding-top:7px; font-weight:bold; color:#243f4d; position:absolute">SISTEM PENUNJANG KEPUTUSAN | SELEKSI CALON KARYAWAN</span>
        <div class="menu">
          <ul>
            <li style="font-family: Roboto;"><?= $this->session->userdata('level'); ?>&nbsp;&nbsp;<i class='fas fa-angle-down'></i>
                <ul class="submenu" style="width:fit-content;  border: 1px solid black">
                  <li class="listmenu" style="font-family: Roboto; padding-bottom:10px" ><?= $this->session->userdata('nama'); ?></li>
                  <li class="listmenu" style="font-family: Roboto; font-weight:normal;"><?php echo "<a style='color:#ffff' href='".base_url()."Login/logout'>Logout</a>"; ?></li>
                </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
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

