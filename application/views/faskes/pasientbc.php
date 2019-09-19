<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 100%;
  margin: 10px auto;
}

.demo-table td:first-child,
.demo-table td:nth-child(4) {
  width: 250px;
  text-align: left;
  font-weight: bold;
  padding-left: 40px;
}

.demo-table td:nth-child(2),
.demo-table td:nth-child(5) {
  width: 30px;
  text-align: center;
}

.demo-table td:nth-child(3) {
    width: 200px;
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
  <br>
    <div class="list-judul"><h4>KARTU PENGOBATAN PASIEN TUBERCULOSIS</h4></div>
        <br>
      <table class="demo-table">
          <tbody>

                 <tr>
                      <td>No Faskes</td>
                      <td>:</td>
                      <td><?php echo $pasientbc['no_faskes']?></td>

                      <td>Nama Pasien</td>
                      <td>:</td>
                      <td><?php echo $pasientbc['nm_pasien']?></td>
                  </td>
                  </tr>

                  <tr>
                    <td>Tipe Diagnosa</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['tipe_diagnosis']?></td>

                    <td>Lokasi Anatomi</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['lokasi_anatomi']?></td>
                  </tr>

                  <tr>
                      <td>Status Kehamilan</td>
                      <td>:</td>
                      <td><?php echo $pasientbc['status_hamil'] ?></td>

                      <td>Paru / BCG</td>
                      <td>:</td>
                      <td><?php echo $pasientbc['paru_bcg']?></td>
                  </tr>

                  <tr>
                      <td>Status HIV</td>
                      <td>:</td>
                      <td><?php echo $pasientbc['status_hiv'] ?></td>

                      <td>Riwayat Diabetes Melitus</td>
                      <td>:</td>
                      <td><?php echo $pasientbc['riwayat_dm']?></td>
                  </tr>

                <tr>
                    <td>Tipe Pasien</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['tipe_pasien']?></td>

                    <td>Bentuk OAT</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['bentuk_oat']?></td>
                </tr>

                <tr>
                    <td>Panduan OAT</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['panduan_oat']?></td>

                    <td>Sumber Obat</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['sumber_obat']?></td>
                </tr>

                <tr>
                    <td>Jumlah Skoring TB Anak</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['skoring_anak']?></td>
                </tr>

                <tr>
                    <td>Nama PMO</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['nm_pmo']?></td>

                    <td>NIK PMO</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['nik_pmo']?></td>
                </tr>

                <tr>
                    <td>No HP PMO</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['no_hp_pmo']?></td>

                    <td>Alamat PMO</td>
                    <td>:</td>
                    <td><?php echo $pasientbc['alamat_pmo']?></td>
                </tr>
        </tbody>
      </table>
      <br>
      <a class="button button1" href="<?php echo site_url('Faskes/listpasientbc') ?>">Kembali</a>
        <br><br>

</div>

</div>
</body>

</html>
