<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rekrutmen Karyawan</title>
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

  <style>
    a:hover {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="left-bar">
      <div class="top-text">PT HONDA JAYA UTAMA</div>
        <hr>
        <p class="main">Menu</p>
        
        <ul>
          <li><?php echo "<a href='".base_url()."Dashboard/dashboard_admin'><i class='fas fa-tachometer-alt'> &nbsp; </i>Dashboard</a>"; ?></li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"><i class='fas fa-id-badge'> &nbsp; </i>Form Entri Data &nbsp;<i class='fas fa-caret-down'></i></button>
            </div>
            <div class="dropdown-child">
              <ul><?php echo "<a href='".base_url()."m_kandidat/index'><i class='fas fa-id-badge'> &nbsp; </i>Data Kandidat</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."Laporan/pengobatanpasien'><i class='fas fa-id-badge'> &nbsp; </i>Data Nilai Kandidat</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."Laporan/kehadirancheckup'><i class='fas fa-id-badge'> &nbsp; </i>Data Divisi</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."Laporan/hasilakhir'><i class='fas fa-id-badge'> &nbsp; </i>Data Kriteria</a>"; ?></ul>
            </div>
          </li>
          <li><?php echo "<a href='".base_url()."Pegawai/index'><i class='fas fa-archive'> &nbsp; </i>Entri Data Pegawai</a>"; ?></li>
          <li><?php echo "<a href='".base_url()."Checkup/listcheckup'><i class='far fa-clipboard'> &nbsp; </i>Data Check-up</a>"; ?></li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"><i class='fas fa-calendar-check'></i> &nbsp;Reminder Pasien &nbsp;<i class='fas fa-caret-down'></i></button>
            </div>
            <div class="dropdown-child">
              <ul><?= anchor('sent', '<span></span> Pesan Terkirim') ?></ul>
              <ul><?= anchor('sms-scheduled', '<span></span> Pesan Terjadwal') ?></ul>
            </div>
          </li>

          <li>
            <div class="dropdown">
              <button class="dropbtn"><i class='fas fa-folder-open'></i> &nbsp;Laporan &nbsp;<i class='fas fa-caret-down'></i></button>
            </div>
            <div class="dropdown-child">
              <ul><?php echo "<a href='".base_url()."Laporan/pengobatanpasien'>Pengobatan Pasien</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."Laporan/kehadirancheckup'>Kehadiran Check-up</a>"; ?></ul>
              <ul><?php echo "<a href='".base_url()."Laporan/hasilakhir'>Akhir Pengobatan</a>"; ?></ul>
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
                <li class="listmenu"><?= $this->session->userdata('nama'); ?></li>
                <li class="listmenu"><?php echo "<a href='".base_url()."Petugas/logout'>Logout</a>"; ?></li>
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

