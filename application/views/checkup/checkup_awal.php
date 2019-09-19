<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 70%;
  margin-left: 170px;
}

.demo-table td:first-child {
  width: 150px;
  text-align: left;
}

.demo-table td:nth-child(2) {
  width: 10px;
  text-align: center;
}

.demo-table td:last-child {
  width: 250px;
}

.demo-table td {
  /* border: 1px solid #2ed573 */
  padding: 7px 17px;
}

/* Table Body */
.demo-table tbody td {
  color: #353535;
}

.center-pencarian input.form-control{
  width: 550px;
}

.but {
    margin-right: 60px;
}
</style>

<div class="center-bar">
    <h3>Entri Jadwal Checkup Pasien Tuberculosis</h3>
<div class="border"></div>

<br><br>


<div class="center-pencarian">
    <?php echo form_open('Checkup/caripasien')?>
      <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
      <input class="button button1" type='submit' value='Cari'>
      <a class = "button button1" href="<?php echo site_url('Checkup/listcheckup') ?>">Daftar Transaksi</a>
    <?php echo form_close()?>
</div>
<br><br>

<div class="form-pendataan">
<form action="<?php echo base_url()?>index.php/Checkup/index" method="post">

            <table class="demo-table" cellspacing="0">

                <tr>
                    <td><label for="id_checkup">No Transaksi</label> </td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="id_checkup" value="<?= $kode ?>" /></td>
                </tr>

                <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="id_register" id="nm_pasien" class ="form-control"></td>
                </tr>

                <tr>
                    <td><label for="no_faskes">No Faskes</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="no_faskes" id="no_faskes" class ="form-control"></td>
                </tr>


                <tr>
                    <td><label for="bentuk_oat">Bentuk OAT</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='bentuk_oat' value='KDT'>KDT &nbsp;&nbsp;
                        <input type='radio' name='bentuk_oat' value='Kombipak'>Kombipak
                    </td>

                </tr>


                <tr>
                    <td><label for="panduan_oat">Panduan OAT</label></td>
                    <td>:</td>
                    <td>
                         <select name="panduan_oat" id="panduan_oat" class ="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Kategori 1">Kategori 1</option>
                            <option value="Kategori 2">Kategori 2</option>
                            <option value="Kategori Anak">Kategori Anak</option>
                        </select>
                    </td>
                </tr>

                <!-- <tr>
                    <td><label for="keterangan">Keterangan</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='keterangan' value='Hadir' checked>Hadir &nbsp;&nbsp;
                    </td>

                </tr> -->

                <tr>
                    <td><label for="tahap_pengobatan">Tahap Pengobatan</label></td>
                    <td>:</td>
                    <td>
                         <select name="tahap_pengobatan" id="tahap_pengobatan" class ="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Tahap Awal">Tahap Awal</option>
                            <option value="Tahap Lanjutan">Tahap Lanjutan</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="berat_bdn_2">Berat Badan</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="berat_bdn_2" id="berat_bdn_2" class ="form-control"></td>

                </tr>

                 <?php echo form_open('Checkup/HitungTransaksi')?>

                 <tr>
                     <td><label for="tanggal">Tanggal</label></td>
                     <td>:</td>
                     <td><input class ="form-control" type="text" name="tgl_sekarang" id="tgl_sekarang" value="<?php echo date('Y-m-d')?>"></td>
                 </tr>

                <tr>
                    <td><label for="tgl_selanjutnya">Tanggal Checkup</label></td>
                    <td>:</td>
                    <td><input class ="form-control input-tanggal" type="text" name="tgl_selanjutnya" id="tgl_selanjutnya" value=""></td>
                </tr>

                <tr>
                    <td><label for="dosis_tablet">Dosis Tablet</label></td>
                    <td>:</td>
                    <td><input type="text" name="dosis_tablet" id="dosis_tablet" value="" class ="form-control"></td>

                </tr>

                <tr>
                    <td><label for="jml_minum">Jumlah Minum</label></td>
                    <td>:</td>
                    <td rowspan="2"><input type='submit' value='Hitung' name="hitung" class="button button4"></td>

                </tr>

                <tr>
                    <td><label for="jml_obat">Jumlah Obat</label></td>
                    <td>:</td>
                </tr>


                <?php echo form_close()?>

            </table>
            <br><br>
          <div class="but">
            <input type='submit'class="button button4"  name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
            <input type='reset' class="button button4" name='btnbatal' value='BATAL' onclick="javascript:HapusText();">
          </div>
            <br><br>
</form>




</div>
</div>
