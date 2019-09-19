<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
/* Table */
.demo-table {
  border-collapse: collapse;
  font-size: 15px;
  width: 95%;
  margin: 10px auto;
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
    <h3>Data Pemeriksaan HIV Pasien Tuberculosis</h3>
  <div class="border"></div>

  <br>
  <br>
  <br>
      <div class="center-pencarian">
        <?php echo form_open('Cek_hiv/carinama')?>
            <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
            <input class="button button1" type='submit' value='Cari'>
            <a class = "button button1" href="<?php echo site_url('Cek_hiv/index')?>">Tambah Data</a>
          <?php echo form_close()?>

      </div>


    <br>
    <br>

    <table class="demo-table" cellspacing="0">
        <thead >
           <tr>
                        <th width="15px">No</th>
                        <th width="100px">No Transaksi</th>
                        <th width="100px">No Faskes</th>
                        <th width="100px">Nama</th>
                        <th width="110px">Tanggal Dianjurkan</th>
                        <th width="90px">Tanggal Hasil</th>
                        <th width="80px">Hasil Tes</th>
                        <th width="150px">Aksi</th>
                     </tr>

        </thead>
        <tbody>
            <?php  $no = $this->uri->segment(3) + 1; ?>
            <?php foreach ($hiv as $Hiv) : ?>

            <tr>
                <td>
                    <?php echo $no ?>
                </td>

                <td>
                    <?php echo $Hiv -> id_teshiv ?>
                </td>

                <td>
                    <?php echo $Hiv -> no_faskes ?>
                </td>

                <td>
                    <?php echo $Hiv -> nm_pasien ?>
                </td>

                <td>
                    <?php echo $Hiv -> tgl_dianjurkan ?>
                </td>
                <td>
                    <?php echo $Hiv -> tgl_teshiv ?>
                </td>

                <td>
                    <?php echo $Hiv -> hasil_tes ?>
                </td>

                <td>

                    <a class = "button button2" href="<?php echo site_url('Cek_hiv/edithiv/'.$Hiv->no_faskes) ?>">Update</a>
                    <a class = "button button3" href="<?php echo site_url('Cek_hiv/deleteid/'.$Hiv->id_teshiv) ?>">Delete</a>

                </td>
                <?php $no++?>
            <?php endforeach?>
            </tr>

        </tbody>
    </table>
    <?php echo $pagination; //$this->pagination->create_links();?>
    <br>
    <br>
</div>
</body>

</html>
