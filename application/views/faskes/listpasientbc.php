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
    <h3>Data Kartu Pengobatan Pasien Tuberculosis</h3>
  <div class="border"></div>


  <br>
  <br>
  <br>

  <div class="center-pencarian">
    <?php echo form_open('Faskes/carifaskes')?>
      <input class="text pencarian" type="text" name="keyword" placeholder="Input No Faskes / Nama Pasien ">
      <input class="button button1" type='submit' value='CARI'> <a class = "button button1" href="<?php echo site_url('Faskes/index')?>">TAMBAH DATA</a>
    <?php echo form_close()?>
  </div>

  <br>
  <br>


    <table class="demo-table" cellspacing="0">
        <thead >
            <tr>
                <th width="5px">No</th>
                <th width="30px">No Faskes</th>
                <th width="190px">Nama Pasien</th>
                <th width="30px">Tanggal Mulai</th>
                <th width="90px">Tipe Pasien</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $no = $this->uri->segment(3) + 1; ?>
            <?php foreach ($pasientbc as $Pasientbc) : ?>

            <tr>
                <td>
                    <?php echo $no ?>
                </td>

                <td>
                    <?php echo $Pasientbc -> no_faskes?>
                </td>
                <td>
                    <?php echo $Pasientbc -> nm_pasien ?>
                </td>
                <td>
                    <?php echo $Pasientbc -> tgl_mulai ?>
                </td>
                <td>
                    <?php echo $Pasientbc -> tipe_pasien ?>
                </td>

                <td>

                    <a class = "button button2" href="<?php echo site_url('Faskes/pasientbc/'.$Pasientbc->no_faskes) ?>">Detail</a>
                    <a class = "button button2" href="<?php echo site_url('Faskes/editpasientbc/'.$Pasientbc->no_faskes) ?>">Update</a>
                    <a class = "button button2" target="_blank" href="<?php echo site_url('Faskes/TB02/'.$Pasientbc->no_faskes) ?>">Cetak</a>
                    <!--<a class = "button button3" href="<?php //echo site_url('Faskes/deleteid/'.$Pasientbc->no_faskes) ?>">Delete</a>-->

                </td>


                <?php $no++?>
            <?php endforeach?>
            </tr>


        </tbody>
    </table>
    <br>
    <br>
  </div>
</div>
</body>
</html>
