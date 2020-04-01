<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<!--ISI DASHBOARD-->

<style>
/* Table */
.demo-table {
  border-collapse: collapse;
  font-size: 12px;
  width: 100%;
}
.demo-table th,
.demo-table td {
  border: 1px solid black;
  padding: 7px 17px;
}
/* Table Header */
.demo-table thead th {
  color: black;
  text-transform: capitalize;
  text-align: center;
}
/* Table Body */
.demo-table tbody td {
  color: black;
}
.demo-table tbody td:first-child,
.demo-table tbody td:nth-child(4) {
  text-align: left;
}
.demo-table tbody td:last-child{
  text-align: center;
}

.demo-table tbody td:empty
{
  background-color: #ffcccc;
}

.img a:hover {
  color: green;
  text-decoration: none;
}

.img2 a:hover {
  color: green;
  text-decoration: none;
}
</style>

<!--CONTAINER-->
  <!-- <div class="home">
    <div class="home-judul">Home</div>
            <div class="img">
                <a href="<?php echo base_url();?>Pendataan/index">
                <img src="<?php echo base_url();?>assets/img/contract.png"/>
                <p>Pendataan</p></a>
            </div>

            <div class="img">
              <a href="<?= base_url('Faskes/index'); ?>">
              <img src="<?php echo base_url();?>assets/img/faskes.png">
              <p>Kartu Faskes</p></a>
            </div>

            <div class="img">
              <a href="<?= base_url('Checkup/index'); ?>">
              <img src="<?php echo base_url();?>assets/img/calender.png">
              <p>Form Checkup</p></a>
            </div>

            <div class="img">
              <a href="<?= base_url('Absensi/index'); ?>">
              <img src="<?php echo base_url();?>assets/img/list.png">
              <p>Absensi</p></a>
            </div>

            <div class="img">
              <a href="<?= base_url('Cek_dahak/index'); ?>">
              <img src="<?php echo base_url();?>assets/img/document.png">
              <p>Dahak</p></a>
            </div>

            <div class="img">
              <a href="<?= base_url('Cek_diabetes/index'); ?>">
              <img src="<?php echo base_url();?>assets/img/document.png">
              <p>Diabetes</p></a>
            </div>

            <div class="img">
              <a href="<?= base_url('Cek_hiv/index'); ?>">
              <img src="<?php echo base_url();?>assets/img/document.png">
              <p>HIV</p></a>
            </div>

            <div class="img">
              <a href="<?= base_url('Hasil_akhir/index'); ?>">
              <img src="<?php echo base_url();?>assets/img/document.png">
              <p>Hasil Akhir</p></a>
            </div>

            <div class="img2">
                  <a href="<?= base_url('Faskes/listpasientbc'); ?>">
                  <img src="<?php echo base_url();?>assets/img/user.png">
                  <p>Kelola Pasien</p></a>
            </div>

            <div class="img2">
              <a href="<?= base_url('Laporan/allreport'); ?>">
              <img src="<?php echo base_url();?>assets/img/report.png">
              <p>Laporan</p></a>
            </div>
    </div> -->


  <div class="informasi">
    <div class="home-judul">Informasi Terbaru</div>
    <div class="home-isi">
        Status Pasien<br>
        <div class="border"></div>
        <?php echo $terdugatbc['total']?> Pasien Terduga Tuberculosis <br>
        <div class="border"></div>
        <?php echo $pasientbc['total']?> Pasien Positif Menderita Tuberculosis
        <div class="border"></div>
    </div>
  </div>

  <div class="home-mangkir">
    <div class="home-judul">Informasi Pasien Mangkir*</div>
     <div class="home-isi">
         <table class="demo-table" cellspacing="0">
        <thead >
            <tr>
                <th width="15px">No</th>
                <th width="90px">No Pasien</th>
                <th width="80px">No Handphone</th>
                <th width="150px">Nama PMO</th>
                <th width="100px">No Handphone</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1 ?>
            <?php foreach ($pasienmangkir as $Pasienmangkir) : ?>

            <tr>
              <td> <?php echo $no ?></td>

                <td>
                    <?php echo $Pasienmangkir -> nm_pasien ?>
                </td>
                <td>
                    <?php echo $Pasienmangkir -> no_hp ?>
                </td>
                <td>
                    <?php echo $Pasienmangkir -> nm_pmo ?>
                </td>
                <td>
                    <?php echo $Pasienmangkir -> no_hp_pmo ?>
                </td>

                <?php $no++?>
            <?php endforeach?>
            </tr>

        </tbody>
    </table>

     </div>
    *Pasien yang sudah 1 minggu tidak melakukan check-up <br>
    *PMO = Petugas Menelan Obat
  </div>


</div>
</body>

</html>
