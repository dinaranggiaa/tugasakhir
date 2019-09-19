<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 100%;
  margin-left: -150px;
}

.demo-table td:first-child {
  width: 250px;
  text-align: left;
  font-weight: bold;
  padding-left: 40px;
}

.demo-table td:nth-child(2) {
  width: 5px;
  text-align: center;
}

.demo-table td:nth-child(3) {
    width: 100px;
}

.demo-table td {
  /* border: 1px solid #2ed573; */
  padding: 7px 17px;
}

/* Table Body */
.demo-table tbody td {
  color: #353535;
}

</style>


<div class="center-bar">
    <h6>PROGRAM TB NASIONAL</h6>

<div class="list-judul"><h4>DATA PASIEN</h4></div>
<div class="data-list">
  <br>
    <table class="demo-table">
        <thead >

        </thead>
        <tbody>

               <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?php echo $pasien['nm_pasien']?></td>

                </td>
                </tr>

                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?php echo $pasien['nik_pasien']?></td>
                </tr>

                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><?php echo $pasien['no_hp']?></td>
                </tr>

                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $pasien['jenkel']?></td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $pasien['alamat'] ?></td>
                </tr>

                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $pasien['tgl_lahir']?></td>
                </tr>

                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td><?php echo $pasien['umur'] ?></td>
                </tr>

                <tr>
                    <td>No BPJS</td>
                    <td>:</td>
                    <td><?php echo $pasien['no_bpjs']?></td>
                </tr>

                <tr>
                    <td>Tinggi Badan</td>
                    <td>:</td>
                    <td><?php echo $pasien['tinggi_bdn']?></td>
                </tr>

                <tr>
                    <td>Berat Badan</td>
                    <td>:</td>
                    <td><?php echo $pasien['berat_bdn']?></td>
                </tr>

                <!--<tr>
                    <td>Tanggal Daftar</td>
                    <td>:</td>
                    <td><?php //echo $pasien['tgl_daftar']?></td>
                </tr>


                <tr>
                    <td>No Rekam Medis</td>
                    <td>:</td>
                    <td><?php //echo $pasien['no_rm']?></td>
                </tr>-->


        </tbody>
    </table>
    <br>
    <a class = "button button1" href="<?php echo site_url('Pendataan/listpasien') ?>">Kembali</a>
<br><br>


</div>

</div>

</body>

</html>
