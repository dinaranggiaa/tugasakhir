<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 80%;
  margin-left: 150px;
}

.demo-table td:first-child {
  width: 200px;
  text-align: left;
}

.demo-table td:nth-child(2) {
  width: 50px;
  text-align: center;
}

.demo-table td:last-child {
  width: 200px;
}

.demo-table td {
  /* border: 1px solid #2ed573; */
  padding: 7px 17px;
}

/* Table Body */
.demo-table tbody td {
  color: #353535;
}

.center-pencarian input.form-control{
  width: 550px;
}

.btn {
  float: right;
  margin-right: 95px;
  width: 100px;
  /* background-color: #109240; */
  font-size: 15px;
}

.but {
    margin-right: 60px;
}

</style>

<div class="center-bar">
    <h4>Entri Jadwal Checkup Pasien Tuberculosis</h4>
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
<form action="<?php echo base_url()?>index.php/Checkup/simpanCheckup" method="post">



            <table class="demo-table" cellspacing="0">

                <tr>
                    <td><label for="id_checkup">No Transaksi</label></td>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="id_checkup" id="id_checkup" value="<?php echo $id_checkup ?>" placeholder="<?php echo $id_checkup ?>"></td>
                </tr>

                <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="nm_pasien" id="nm_pasien" value="<?php $nm_pasien ?>"><?php echo $nm_pasien ?></td>
                </tr>


                <tr>
                    <td><label for="no_faskes">No. Faskes</label></td>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="no_faskes" id="no_faskes" value="<?php echo $no_faskes ?>" placeholder="<?php echo $no_faskes ?>"></td>
                </tr>

                    <td><input type="hidden" name="tanggal" id="tanggal" value="<?php echo $tanggal ?>">
                    <td><input type="hidden" name="no_hp" id="no_hp" value="<?php echo $no_hp?>" placeholder="<?php echo $no_hp?>">
                    <td><input type="hidden" name="no_hp_pmo" id="no_hp_pmo" value="<?php echo $no_hp_pmo?>" placeholder="<?php echo $no_hp_pmo?>">
                  <tr>
                    <td><label>Bentuk OAT</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='bentuk_oat' value='Kombipak'<?php if( $bentuk_oat == "Kombipak"){echo "checked";}?>>Kombipak &nbsp; &nbsp;
                        <input type='radio' name='bentuk_oat' value='KDT'<?php if( $bentuk_oat == "KDT"){echo "checked";}?>>KDT
                    </td>
                </tr>

                <tr>
                    <td><label for="panduan_oat">Panduan OAT</label></td>
                    <td>:</td>
                    <td>
                         <select name="panduan_oat" id="panduan_oat" class="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Kategori 1" <?php if( $panduan_oat == "Kategori 1" ){echo "selected";}?>>Kategori 1</option>
                            <option value="Kategori 2" <?php if( $panduan_oat == "Kategori 2" ){echo "selected";}?>>Kategori 2</option>
                            <option value="Kategori Anak" <?php if( $panduan_oat == "Kategori Anak" ){echo "selected";}?>>Kategori Anak</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="tahap_pengobatan">Tahap Pengobatan</label></td>
                    <td>:</td>
                    <td>
                        <select name="tahap_pengobatan" id="tahap_pengobatan" class="form-control">
                            <option value="">-Pilih--</option>
                            <option value="Awal" <?php if( $tahap_pengobatan == "Awal"){echo "selected";}?>>Tahap Awal</option>
                            <option value="Lanjutan" <?php if( $tahap_pengobatan == "Lanjutan"){echo "selected";}?>>Tahap Lanjutan</option>
                        </select>
                    </td>

                </tr>


                <tr>
                    <td><label for="berat_bdn_2">Berat Badan</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="berat_bdn_2" id="berat_bdn_2" value="<?= $berat_bdn_2 ?>"><?= $berat_bdn_2 ?></td>

                </tr>

                <tr>
                    <td><label for="tanggal">Tanggal</label></td>
                    <td>:</td>
                    <td><input type="hidden" class="form-control" name="tgl_sekarang" id="tgl_sekarang" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo date('Y-m-d')?>"><?php echo date('d-m-Y')?></td>
                </tr>

                <tr>
                    <td><label for="tgl_selanjutnya">Tanggal Check-up</label></td>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="tgl_selanjutnya" id="tgl_selanjutnya" value="<?= $tgl_selanjutnya?>"></td>

                </tr>

                 <tr>
                    <td><label for="dosis_tablet">Dosis Tablet</label></td>
                    <td>:</td>
                    <td> <input type="hidden" class="form-control" name="dosis_tablet" id="dosis_tablet" value="<?= $dosis_tablet?>"><?= $dosis_tablet?></td>

                </tr>


                <tr>
                    <td><label for="jml_minum">Jumlah Minum</label></td>
                    <td>:</td>
                    <td><input type="hidden" class="form-control" name="jml_minum" id="jml_minum" value="<?= $jml_minum?>"><?= $jml_minum?></td>

                </tr>

                <tr>
                    <td><label for="jml_obat">Jumlah Obat</label></td>
                    <td>:</td>
                    <td><input type="hidden" class="form-control" name="jml_obat" id="jml_obat" value="<?= $jml_obat?>"><?= $jml_obat?></td>
                </tr>

            </table>

            <br><br>
          <div class="but">
            <input type='submit'class="button button4"  name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
            <a class = "button button4" href="<?php echo site_url('Checkup/index') ?>">BATAL</a>
          </div>
            <br><br><br>
<!-- </form> -->
 <?php echo form_close()?>

<script type="text/javascript">
              function HapusText()
              {
                document.getElementById("nm_pasien").value="";
                document.getElementById("no_faskes").value="";
                document.getElementById("tgl_selanjutnya").value="";
                document.getElementById("dosis_tablet").value="";
                document.getElementById("jml_minum").value="";
                document.getElementById("jml_obat").value="";
              }
            </script>




</div>
</div>
