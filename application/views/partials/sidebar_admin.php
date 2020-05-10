<!DOCTYPE html>
<html lang="en">
<head>
  <title>SISTEM PENDUKUNG KEPUTUSAN - SELEKSI CALON KARYAWAN PT DEALER HONDA JAYA UTAMA</title>
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
      <div class="top-text">PT HONDA JAYA UTAMA</div>
        <hr>
        <ul>
          <li ><?php echo "<a href='".base_url()."Dashboard/dashboard_admin'><i class='fas fa-tachometer-alt'> &nbsp; </i>Dashboard</a>"; ?></li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"><i class='fas fa-pen'> &nbsp; </i>Form Entri Data &nbsp;<i class='fas fa-caret-down'></i></button>
            </div>
            <div class="dropdown-child">
              <ul><?php echo "<a href='".base_url()."C_Pelamar/index'><i class='fas fa-user-alt'> &nbsp; </i>Data Pelamar</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."C_Pelamar/index'><i class='fab fa-readme'> &nbsp; </i>Data Penilaian</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."C_Kriteria/index'><i class='fab fa-kickstarter'> &nbsp; </i>Data Kriteria</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."C_Kriteria/index'><i class='far fa-file-alt'> &nbsp; </i>Data Nilai Target</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."C_Periode/index'><i class='far fa-calendar-alt'> &nbsp; </i>Data Periode</a>"; ?></ul>

            </div>
          </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"><i class='fas fa-calculator'> &nbsp; </i>Proses Perhitungan&nbsp;<i class='fas fa-caret-down'></i></button>
            </div>
            <div class="dropdown-child">
              <ul><?php echo "<a href='".base_url()."C_ProsesAHP/NilaiPerbandingan'><i class=' 	fas fa-sync'> &nbsp; </i>Perhitungan AHP</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."C_Kriteria/index'><i class='fas fa-sync'> &nbsp; </i>Perhitungan PM</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."C_Kriteria/index'><i class='fas fa-newspaper'> &nbsp; </i>Hasil Keputusan</a>"; ?></ul>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"><i class='fas fa-archive'></i> &nbsp;Laporan &nbsp;<i class='fas fa-caret-down'></i></button>
            </div>
            <div class="dropdown-child">
              <ul><?php echo "<a href='".base_url()."Laporan/pengobatanpasien'><i class='fas fa-medal'> &nbsp; </i>Rekomendasi Pelamar</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."Laporan/kehadirancheckup'><i class='far fa-list-alt'> &nbsp; </i>Karyawan Diterima</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."Laporan/kehadirancheckup'><i class='far fa-address-book'> &nbsp; </i>Data Karyawan Baru</a>"; ?></ul>
            </div>
          </li>
        </ul>
  </div>

  <div class="center">
    <div class="header">
      <div class="menu">
				<ul>
          <li><?= $this->session->userdata('level'); ?>&nbsp;&nbsp;<i class='fas fa-angle-down'></i>
              <ul class="submenu">
                <li class="listmenu"><?= $this->session->userdata('nama'); ?></li><br>
                <li class="listmenu"><?php echo "<a href='".base_url()."Login/logout'>Logout</a>"; ?></li>
              </ul>
          </li>
				</ul>
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

