<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
/* Table */
.demo-table {
  border-collapse: collapse;
  font-size: 15px;
  width: 95%;
  margin: 0px auto;
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

.data {
  margin-left: 28px;
  font-size: 17px;
  margin-bottom: 0px;
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
    <?php $no=0; ?>
    <?php foreach ($dahak as $Dahak) : ?>
        <?php if ($no == 0) : ?>

              <div class="data">
                No Faskes : <?php echo $Dahak -> no_faskes; ?> &emsp; &emsp;
                Nama : <?php echo $Dahak -> nm_pasien; ?>
              </div>
                <br>

        <?php endif ?>
    <?php $no++;
    endforeach ?>
    <table class="demo-table" cellspacing="0">
        <thead >
           <tr>
                        <th width="5px">No</th>
                        <th width="100px">No Transaksi</th>
                        <th width="100px">Bulan Ke</th>
                        <th width="150px">Tanggal Hasil</th>
                        <th width="100px">No Reg Lab</th>
                        <th width="100px">BTA</th>
                        <th width="50px">Biakan</th>
                        <th width="100px">Tes Cepat</th>
                        <th width="200px">Aksi</th>
                     </tr>

        </thead>
        <tbody>
            <?php $no=1 ?>
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

                    <a class = "button button2" href="<?php echo site_url('Cek_dahak/editdahak/'.$Dahak->id_cekdahak)?>">Update</a>
                    <a class = "button button3" href="<?php echo site_url('Cek_dahak/deleteid/'.$Dahak->id_cekdahak) ?>">Delete</a>

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
