<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
/* Table */
.demo-table {
  border-collapse: collapse;
  font-size: 15px;
  width: 95%;
  margin: 20px auto;
}
.demo-table th,
.demo-table td {
  border: 1px solid #104e1a;
  padding: 7px 17px;
}
/* Table Header */
.demo-table thead th {
  background-color: #4CAF50;
  color: #FFFFFF;
  border-color: #104e1a !important;
  text-transform: capitalize;
  text-align: center;
}

/* Table Body */
.demo-table tbody td {
  color: #353535;
}

.demo-table tbody tr td:last-child{
  text-align: center;
}

</style>

<div class="center-bar">
    <h3>Data Transaksi Checkup Pasien Tuberculosis</h3>
  <div class="border"></div>

<br>
<br>
<br>

    <div class="center-pencarian">
        <?php echo form_open('Checkup/carifaskes')?>
          <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
          <input class="button button1" type='submit' name='btncari' value='Cari'>
          <a class = "button button1" href="<?php echo site_url('Checkup/index')?>">Tambah Data</a>
        <?php echo form_close()?>

    </div>


    <br>
    <br>
    <?php $no=0; ?>
    <?php foreach ($checkup as $Checkup) : ?>
        <?php if ($no == 0) : ?>

                No Faskes : <?php echo $Checkup -> no_faskes; ?> &emsp; &emsp;
                Nama : <?php echo $Checkup -> nm_pasien; ?> &emsp; &emsp;

        <?php endif ?>
    <?php $no++;
    endforeach ?>

    <table class="demo-table" cellspacing="0">
        <thead >
           <tr>

                        <th width="5px">No</th>
                        <th width="40px">No Transaksi</th>
                        <th width="50px">Tanggal Checkup</th>
                        <th width="60px">Tanggal Selanjutnya</th>
                        <th width="10px">Tahap Pengobatan</th>
                        <th width="40px">Jumlah Minum</th>
                        <th width="40px">Dosis Tablet</th>
                        <th width="300px">Aksi</th>
            </tr>

        </thead>
        <tbody>
            <?php $no=1 ?>
            <?php foreach ($checkup as $Checkup) : ?>

            <tr>
                <td>
                    <?php echo $no ?>
                </td>

                <td>
                    <?php echo $Checkup -> id_checkup ?>
                </td>

                <td>
                    <?php echo $Checkup -> tgl_checkup ?>
                </td>

                <td>
                    <?php echo $Checkup -> tgl_selanjutnya ?>
                </td>

                <td>
                    <?php echo $Checkup -> tahap_pengobatan ?>
                </td>

                <td>
                    <?php echo $Checkup -> jml_minum ?>
                </td>

                <td>
                    <?php echo $Checkup -> dosis_tablet ?>
                </td>


                <td>

                    <a class = "button button2" href="<?php echo site_url('Checkup/editcheckup/'.$Checkup->id_checkup)?>">Update</a>
                    <a class = "button button2" href="<?php echo site_url('Checkup/TransaksiCheckup/'.$Checkup->id_checkup)?>">Cetak</a>
                    <a class = "button button3" href="<?php echo site_url('Checkup/deleteid/'.$Checkup->id_checkup) ?>">Delete</a>

                </td>

                <?php $no++?>
            <?php endforeach?>
            </tr>

        </tbody>
    </table>
    <br>
    <br>

</body>

</html>
