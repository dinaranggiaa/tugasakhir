<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pengobatan Pasien TB</title>
  <style>
  td {
    width: 20px;
    text-align: center;
  }
</style>
</head>
<body>

  <?php

    header("Content-type:application/vnd-ms-excel");
    header("Content-Disposition:attachment; filename=PengobatanPasienTBC.xls");
    header("Pragma: no-chace");
    header("Expires:0");

  ?>

  <h3 style="text-align: center;">LAPORAN <br> PENGOBATAN PASIEN TUBERCULOSIS</h3>
  <p style="text-align: center; margin-top: 0px;">Periode <?= $tglawal ?> s/d <?= $tglakhir?></p>
<table border="1">
        <tr>
          <th rowspan="3">No</th>
                  <th rowspan="3">No Faskes</th>
                  <th rowspan="3">Nama Lengkap</th>
                  <th rowspan="3">NIK Pasien</th>
                  <th rowspan="3">Jenkel</th>
                  <th rowspan="3">Usia</th>
                  <th rowspan="3">Alamat</th>
                  <th rowspan="3">Tipe Diagnosis</th>
                  <th rowspan="3">Lokasi Anatomi</th>
                  <th rowspan="3">Tipe Pasien</th>
                  <th rowspan="3">Status HIV</th>
                  <th rowspan="3">Skoring Anak</th>
                  <th rowspan="3">Tanggal Mulai</th>
                  <th rowspan="3">Panduan OAT</th>
                  <th rowspan="3">Sumber Obat</th>

                  <th rowspan="3">Tanggal Akhir Pengobatan</th>
                  <th rowspan="3">Hasil Akhir Pengobatan</th>

                  <th rowspan="3">Tanggal Dianjurkan</th>
                  <th rowspan="3">Tanggal Tes HIV</th>
                  <th rowspan="3">Hasil Tes HIV</th>

                  <th rowspan="3">Riwayat DM</th>
                  <th rowspan="3">Terapi DM</th>

                  <!--DAHAK-->
                  <th colspan="18">Dahak</th>

        </tr>
        <tr>
          <td colspan="3">Bulan ke 0</td>
          <td colspan="3">Bulan ke 2</td>
          <td colspan="3">Bulan ke 3</td>
          <td colspan="3">Bulan ke 5</td>
          <td colspan="3">Bulan ke 6</td>
          <td colspan="3">Bulan ke 8</td>
        </tr>

        <tr>
          <td>BTA</td>
          <td>Tes Cepat</td>
          <td>Biakan</td>
          <td>BTA</td>
          <td>Tes Cepat</td>
          <td>Biakan</td>
          <td>BTA</td>
          <td>Tes Cepat</td>
          <td>Biakan</td>
          <td>BTA</td>
          <td>Tes Cepat</td>
          <td>Biakan</td>
          <td>BTA</td>
          <td>Tes Cepat</td>
          <td>Biakan</td>
          <td>BTA</td>
          <td>Tes Cepat</td>
          <td>Biakan</td>
        </tr>


              <?php $no=1 ?>
          <?php foreach ($pasientbc as $Pasientbc) { ?>

                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $Pasientbc -> no_faskes ?></td>
                  <td><?php echo $Pasientbc -> nm_pasien ?></td>
                  <td><?php echo $Pasientbc -> nik_pasien ?></td>
                  <td><?php echo $Pasientbc -> jenkel ?></td>
                  <td><?php echo $Pasientbc -> usia ?></td>
                  <td><?php echo $Pasientbc -> alamat?></td>
                  <td><?php echo $Pasientbc -> tipe_diagnosis ?></td>
                  <td><?php echo $Pasientbc -> lokasi_anatomi ?></td>
                  <td><?php echo $Pasientbc -> tipe_pasien ?></td>

                  <td><?php echo $Pasientbc -> status_hiv ?></td>

                  <td><?php echo $Pasientbc -> skoring_anak ?></td>
                  <td><?php echo $Pasientbc -> tgl_mulai?></td>
                  <td><?php echo $Pasientbc -> panduan_oat ?></td>
                  <td><?php echo $Pasientbc -> sumber_obat ?></td>

                  <!--Hasil Akhir Pengobatan-->
                  <td><?php echo $Pasientbc -> tgl_selesai ?></td>
                  <td><?php echo $Pasientbc -> hasilakhir ?></td>

                  <!--HIV-->
                  <td><?php echo $Pasientbc -> tgl_dianjurkan ?></td>
                  <td><?php echo $Pasientbc -> tgl_teshiv ?></td>
                  <td><?php echo $Pasientbc -> hasil_tes ?></td>

                  <!--DIABETES MELITUS-->
                  <td><?php echo $Pasientbc -> riwayat_dm ?></td>
                  <td><?php echo $Pasientbc -> terapi_dm ?></td>

                  <!--DAHAK-->
                          <?php if($Pasientbc -> bulan_ke == 0) { ?>
                            <td><?php echo $Pasientbc -> bta ?></td>
                            <td><?php echo $Pasientbc -> tes_cepat ?></td>
                            <td><?php echo $Pasientbc -> biakan ?></td>
                          <?php } else { ?>
                            <td></td>
                            <td></td>
                            <td></td>
                          <?php }  ?>

                          <?php if($Pasientbc -> bulan_ke == 2) { ?>
                            <td><?php echo $Pasientbc -> bta ?></td>
                            <td><?php echo $Pasientbc -> tes_cepat ?></td>
                            <td><?php echo $Pasientbc -> biakan ?></td>
                          <?php } else { ?>
                            <td></td>
                            <td></td>
                            <td></td>
                          <?php } ?>

                          <?php if($Pasientbc -> bulan_ke == 3) { ?>
                            <td><?php echo $Pasientbc -> bta ?></td>
                            <td><?php echo $Pasientbc -> tes_cepat ?></td>
                            <td><?php echo $Pasientbc -> biakan ?></td>
                          <?php } else { ?>
                            <td></td>
                            <td></td>
                            <td></td>
                          <?php } ?>

                          <?php if($Pasientbc -> bulan_ke == 5) { ?>
                            <td><?php echo $Pasientbc -> bta ?></td>
                            <td><?php echo $Pasientbc -> tes_cepat ?></td>
                            <td><?php echo $Pasientbc-> biakan ?></td>
                          <?php } else { ?>
                            <td></td>
                            <td></td>
                            <td></td>
                          <?php } ?>

                          <?php if($Pasientbc -> bulan_ke == 6) { ?>
                            <td><?php echo $Pasientbc -> bta ?></td>
                            <td><?php echo $Pasientbc -> tes_cepat ?></td>
                            <td><?php echo $Pasientbc -> biakan ?></td>
                          <?php } else { ?>
                            <td></td>
                            <td></td>
                            <td></td>
                          <?php } ?>

                          <?php if($Pasientbc -> bulan_ke == 8) { ?>
                            <td><?php echo $Pasientbc -> bta ?></td>
                            <td><?php echo $Pasientbc -> tes_cepat ?></td>
                            <td><?php echo $Pasientbc -> biakan ?></td>
                          <?php } else { ?>
                            <td></td>
                            <td></td>
                            <td></td>
                          <?php } ?>

                      <?php $no++?>
                    <?php } ?>
                </tr>
      </table>

      <table>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><p style="float: right; font-size: 10px;">Printed by : <?= $this->session->userdata('nama'); ?> <br>
    <?= $tgl; ?> WIB</p></td>
        </tr>
      </table>

    <br style="clear: both;"><br><br>

    <style type="text/css">
        .demo-table {
            border-collapse: collapse;
            font-size: 15px;
            width: 100%;
            margin: 50px auto;
            /*border: 1px solid black;*/
            /*padding: 5px;*/
          }

        .demo-table td:first-child{
          width: 210px;
          text-align: center;
        }

        .demo-table td:nth-child(2) {
          width: 190px;
          text-align: left;
        }
        .demo-table td:last-child {
          width: 210px;
          text-align: center;
        }

        .demo-table td {
           /*border: 1px solid #2ed573; */
          padding: 7px 17px;
        }
        /* Table Body */
        .demo-table tbody td {
          color: #353535;
        }
      </style>

    <table class="demo-table">
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <span>Pimpinan</span><br> 
          <span>Klinik Jakarta Respiratory Centre</span>
        </td>
        <td style="color: white;">
          <!-- <span>Pimpinan</span><br> 
          <span>Klinik Jakarta Respiratory Centre</span></td> -->
        <td>
          <span>Petugas Pojok DOTS</span><br> 
          <span>Klinik Jakarta Respiratory Centre</span>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: center;">(dr. Ika Herniyanti)</td>
        <td></td>
        <td>(<?= $this->session->userdata('nama')?>)</td>
      </tr>
    </table>
  </body>
</html>
