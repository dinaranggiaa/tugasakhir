<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
/* Table */
.demo-table {
  border-collapse: collapse;
  font-size: 15px;
  width: 100%;
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
.demo-table tbody td:first-child,
.demo-table tbody td:nth-child(4) {
  text-align: left;
}
.demo-table tbody td:last-child{
  text-align: center;
}

</style>

<div class="center-bar">
    <h3>Data Akhir Pengobatan Pasien Tuberculosis</h3>
  <div class="border"></div>

<br>
<br>
<br>
    <div class="center-pencarian">
        <?php echo form_open('Hasil_akhir/carinama')?>
         <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
          <input class="button button1" type='submit' value='CARI'>
          <a class = "button button1" href="<?php echo site_url('Hasil_akhir/index')?>">TAMBAH DATA</a>
        <?php echo form_close()?>
    </div>


    <br>
    <br>

    <table class="demo-table" cellspacing="0">
        <thead >
           <tr>
                        <th width="40px">No</th>
                        <th width="100px">No Transaksi</th>
                        <th width="100px">No Faskes</th>
                        <th width="150px">Nama Pasien</th>
                        <th width="150px">Tanggal Selesai</th>
                        <th width="150px">Hasil Akhir</th>
                        <th width="180px">Aksi</th>
                     </tr>

        </thead>
        <tbody>
            <?php $no=1 ?>
            <?php foreach ($hasilakhir as $Hasilakhir) : ?>

            <tr>
                <td>
                    <?php echo $no ?>
                </td>

                <td>
                    <?php echo $Hasilakhir -> id_hasil ?>
                </td>

                <td>
                    <?php echo $Hasilakhir -> no_faskes ?>
                </td>

                <td>
                    <?php echo $Hasilakhir -> nm_pasien ?>
                </td>

                <td>
                    <?php echo $Hasilakhir -> tgl_selesai ?>
                </td>

                <td>
                    <?php echo $Hasilakhir -> hasilakhir ?>
                </td>

                <td>

                    <a class = "button button2" href="<?php echo site_url('Hasil_akhir/edithasilakhir/'.$Hasilakhir->no_faskes) ?>">Update</a>
                    <a class = "button button3" href="<?php echo site_url('Hasil_akhir/deleteid/'.$Hasilakhir->id_hasil) ?>">Delete</a>

                </td>
                <?php $no++?>
            <?php endforeach?>
            </tr>

        </tbody>

    </table>

    <br>
    <br>
</div>
</body>

</html>
