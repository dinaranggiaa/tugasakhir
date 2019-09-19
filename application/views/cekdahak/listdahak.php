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
.demo-table tbody td:first-child,
.demo-table tbody td:nth-child(4) {
  text-align: left;
}
.demo-table tbody td:last-child{
  text-align: center;
}

</style>

<div class="center-bar">
    <h3>Data Pemeriksaan Dahak Pasien Tuberculosis</h3>
  <div class="border"></div>

<br>
<br>
<br>

    <div class="center-pencarian">
        <?php echo form_open('Cek_dahak/carifaskes')?>
          <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
          <input class="button button1" type='submit' name='btncari' value='CARI'>
          <a class = "button button1" href="<?php echo site_url('Cek_dahak/index')?>">TAMBAH DATA</a>
        <?php echo form_close()?>

    </div>


    <br>
    <br>
    <table class="demo-table" cellspacing="0">
        <thead >
           <tr>
                        <th width="15px">No</th>
                        <th width="100px">No Transaksi</th>
                        <th width="80px">Bulan Ke</th>
                        <th width="100px">Tanggal Hasil</th>
                        <th width="90px">No Reg Lab</th>
                        <th width="90px">BTA</th>
                        <th width="90px">Biakan</th>
                        <th width="90px">Tes Cepat</th>
                        <th width="180px">Aksi</th>
            </tr>

        </thead>
        <tbody>
            <?php  $no = $this->uri->segment(3) + 1; ?>
            <?php foreach ($dahak as $Dahak) : ?>

            <tr>
                <td>
                    <?php echo $no ?>
                </td>

                <td>
                    <?php echo $Dahak -> id_cekdahak ?>
                </td>

                <td>
                    <?php echo $Dahak -> bulan_ke ?>
                </td>

                <td>
                    <?php echo $Dahak -> tgl_tes ?>
                </td>
                <td>
                    <?php echo $Dahak -> no_reglab ?>
                </td>
                <td>
                    <?php echo $Dahak -> bta ?>
                </td>
                <td>
                    <?php echo $Dahak -> biakan ?>
                </td>
                <td>
                    <?php echo $Dahak -> tes_cepat ?>
                </td>

                <td>

                    <a class ="button button2" href="<?php echo site_url('Cek_dahak/editdahak/'.$Dahak->id_cekdahak)?>">Update</a>
                    <a class ="button button3" href="<?php echo site_url('Cek_dahak/deleteid/'.$Dahak->id_cekdahak) ?>">Delete</a>

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
</div>

</body>

</html>
