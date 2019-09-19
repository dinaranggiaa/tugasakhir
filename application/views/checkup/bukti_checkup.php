<!DOCTYPE html>
<html>
<head>
  <title>Bukti Checkup Pasien TB</title>
</head>
<body>
  <h2 style="text-align: center; font-family: sans-serif; font-size: 40px;">BUKTI CHECK-UP <br> PASIEN TUBERCULOSIS</h2>

  <hr style="height: 3px; background-color: black;">
  <img src="assets/img/logo-klinik.jpg" style="position: absolute; width: 100px; height: auto; float: left; margin-left: 40px;">

  <div style="margin-left: 155px;">
  <span style="font-size: 40px;">Tanggal Perjanjian, Mengambil </span>
  <br> 
  <span style="font-size: 40px;">Obat dan Konsultasi Dokter</span>
  </div>

  <div style="position: absolute; top: 140px; right: 180px;">
  <span style="font-size: 50px; font-weight: bold;">KLINIK UTAMA JRC - PPTI</span>
  <br>
  <span style="font-size: 30px; margin-left: 80px;">(JAKARTA RESPIRATORY CENTRE)</span>
  </div>
  <hr style="height: 3px; background-color: black; margin-top: 15px;">


  <style type="text/css">
    .demo-table {
        border-collapse: collapse;
        font-size: 35px;
        width: 100%;
        margin: 50px auto;
        /*border: 1px solid black;*/
        /*padding: 5px;*/
      }

    .demo-table td:first-child,
    .demo-table td:nth-child(4){
      width: 190px;
      text-align: left;
    }

    .demo-table td:nth-child(2),
    .demo-table td:nth-child(5) {
      width: 5px;
      text-align: left;
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

  <table class="demo-table" style="margin-bottom: 0px;">
    <tr>
      <td>No. Transaksi</td>
      <td>:</td>
      <td><?= $pasientbc['id_checkup']?></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>No. Faskes</td>
      <td>:</td>
      <td><?= $pasientbc['no_faskes']?></td>
      <td>Bentuk OAT</td>
      <td>:</td>
      <td><?= $pasientbc['bentuk_oat']?></td>
    </tr>

    <tr>
      <td>Nama Pasien</td>
      <td>:</td>
      <td><?= $pasientbc['nm_pasien']?></td>
      <td>Tahap Pengobatan</td>
      <td>:</td>
      <td><?= $pasientbc['tahap_pengobatan']?></td>
    </tr>

    <tr>
      <td>Tanggal Check-up</td>
      <td>:</td>
      <td><?= $pasientbc['tgl_checkup']?></td>
      <td>Tanggal Check-up selanjutnya</td>
      <td>:</td>
      <td><?= $pasientbc['tgl_selanjutnya']?></td>
    </tr>

  </table>

  <table class="demo-table" style="margin-top: 10px; margin-bottom: 0px;">
    <tr>
      <td colspan="3" style="font-size: 20px; text-align: center; width: 10px;">Printed by : <?= $this->session->userdata('nama'); ?> 
          <br><?= $tgl; ?> WIB</td>
      <td colspan="3" style="width: 70px;"><hr style="height: 3px; background-color: black;"></td>
    </tr>

  </table>
    
  <p style="font-size: 35px; position: absolute; right: 250px;">Jumlah OAT yang diberikan : <?= $pasientbc['total_obat']?></p>

</body>
</html>