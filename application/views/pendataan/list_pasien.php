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
    <h3>Data Pasien</h3>
  <div class="border"></div>

<br>
<br>

  <div class="center-pencarian">
    <?php echo form_open('Pendataan/search')?>
      <input class="text pencarian" type="text" name="keyword" placeholder="Masukkan Id Register / Nama Pasien">
      <input class="button button1" type='submit' value='Cari'>
    <?php echo form_close()?>
  </div>

    <br>
    <br>

    <table class="demo-table" cellspacing="0">
        <thead >
            <tr>
                <th width="5px">No</th>
                <th width="50px">No Register</th>
                <th width="80px">NIK</th>
                <th width="180px">Nama Lengkap</th>
                <th width="50px">Tanggal Lahir</th>
                <th width="20px">Jenis Kelamin</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $no = $this->uri->segment(3) + 1; ?>
            <?php foreach ($pasien as $Pasien) : ?>

            <tr>
                <td>
                    <?php echo $no ?>
                </td>

                <td>
                    <?php echo $Pasien -> id_register ?>
                </td>
                <td>
                    <?php echo $Pasien -> nik_pasien ?>
                </td>
                <td>
                    <?php echo $Pasien -> nm_pasien ?>
                </td>
                <td>
                    <?php echo $Pasien -> tgl_lahir ?>
                </td>
                <td>
                    <?php echo $Pasien -> jenkel ?>
                </td>
                <td>
                    <a class = "button button2" href="<?php echo site_url('Pendataan/listdata/'.$Pasien->nik_pasien) ?>">Detail</a>
                    <a class = "button button2" href="<?php echo site_url('Pendataan/showdata/'.$Pasien->nik_pasien) ?>">Update</a>
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
