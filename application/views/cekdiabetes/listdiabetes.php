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
  text-transform: uppercase;
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
    <h3>Data Pemeriksaan Diabetes Melitus Pasien Tuberculosis</h3>
  <div class="border"></div>

<br>
<br>
<br>

    <div class="center-pencarian">
        <?php echo form_open('Cek_diabetes/carinama')?>
          <input class="text pencarian" type="text" name="keyword" id="" placeholder="No. Faskes / Nama Pasien">
          <input class="button button1" type='submit' value='Cari'>
          <a class = "button button1" href="<?php echo site_url('Cek_diabetes/index')?>">Tambah Data</a>
        <?php echo form_close()?>

    </div>

    <br>
    <br>

    <table class="demo-table" cellspacing="0">
        <thead >
           <tr>
                        <th width="15px">No</th>
                        <th width="15px">No Transaksi</th>
                        <th width="100px">No Faskes</th>
                        <th width="100px">Nama Pasien</th>
                        <th width="100px">Hasil</th>
                        <th width="100px">Terapi DM</th>
                        <th width="150px">Aksi</th>
                     </tr>

        </thead>
        <tbody>
              <?php  $no = $this->uri->segment(3) + 1; ?>
            <?php foreach ($diabetes as $Diabetes) : ?>

            <tr>
                <td>
                    <?php echo $no ?>
                </td>

                <td>
                    <?php echo $Diabetes -> id_tesdm ?>
                </td>
                
                <td>
                    <?php echo $Diabetes -> no_faskes ?>
                </td>

                <td>
                    <?php echo $Diabetes -> nm_pasien ?>
                </td>

                <td>
                    <?php echo $Diabetes -> hasil_tesdm ?>
                </td>
                <td>
                    <?php echo $Diabetes -> terapi_dm ?>
                </td>

                <td>

                    <a class = "button button2" href="<?php echo site_url('Cek_diabetes/editdiabetes/'.$Diabetes->no_faskes)?>">Update</a>
                    <a class = "button button3" href="<?php echo site_url('Cek_diabetes/deleteid/'.$Diabetes->id_tesdm)?>">Delete</a>

                </td>
                <?php $no++?>
            <?php endforeach?>
            </tr>

        </tbody>
    </table>
    <?php echo $pagination; //$this->pagination->create_links();?>
    <br>
</div>
</body>

</html>
