<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 80%;
margin: 10px auto;
}

.demo-table td:first-child {
  width: 250px;
  text-align: left;
}

.demo-table td:nth-child(2) {
  width: 30px;
  text-align: center;
}
.demo-table td {
  /* border: 1px solid #2ed573; */
  padding: 7px 17px;
}

/* Table Body */
.demo-table tbody td {
  color: #353535;
}

input.form-control{
  width: 450px;
}

.but {
    margin-right: 60px;
}
</style>

<div class="center-bar">
    <h3>Edit Jadwal Checkup Pasien Tuberculosis</h3>
<div class="border"></div>

<br><br>


<br><br>


<div class="form-pendataan">
<!--<form action="<?php echo base_url()?>index.php/Checkup/index" method="post">-->
    <?php echo form_open('Checkup/HitungTransaksi')?>
            <table class="demo-table" cellspacing="0">

                <tr>
                    <td><label for="id_checkup">No Transaksi</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="id_checkup" id="id_checkup" value="<?php echo $pasientbc['id_checkup']?>" placeholder="<?php echo $pasientbc['id_checkup']?>"><?php echo $pasientbc['id_checkup']?>
                    </td>
                </tr>

                <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="nm_pasien" id="nm_pasien" value="<?php echo $pasientbc['nm_pasien']?>" placeholder="<?php echo $pasientbc['nm_pasien']?>"><?php echo $pasientbc['nm_pasien']?>
                </tr>

                <tr>
                    <td><label for="no_faskes">No. Faskes</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="no_faskes" id="no_faskes" value="<?php echo $pasientbc['no_faskes']?>" placeholder="<?php echo $pasientbc['no_faskes']?>"><?php echo $pasientbc['no_faskes']?>
                    </td>
                </tr>



                <tr>
                    <td><label>Bentuk OAT</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='bentuk_oat' value='Kombipak'<?php if($pasientbc['bentuk_oat']=="Kombipak"){echo "checked";}?>>Kombipak &nbsp; &nbsp;
                        <input type='radio' name='bentuk_oat' value='KDT'<?php if($pasientbc['bentuk_oat']=="KDT"){echo "checked";}?>>KDT
                    </td>
                </tr>

                <tr>
                    <td><label for="panduan_oat">Panduan OAT</label></td>
                    <td>:</td>
                    <td>
                         <select name="panduan_oat" id="panduan_oat" class="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Kategori 1" <?php if($pasientbc['panduan_oat']=="Kategori 1"){echo "selected";}?>>Kategori 1</option>
                            <option value="Kategori 2" <?php if($pasientbc['panduan_oat']=="Kategori 2"){echo "selected";}?>>Kategori 2</option>
                            <option value="Kategori Anak" <?php if($pasientbc['panduan_oat']=="Kategori Anak"){echo "selected";}?>>Kategori Anak</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="tahap_pengobatan">Tahap Pengobatan</label></td>
                    <td>:</td>
                    <td>
                         <select name="tahap_pengobatan" id="tahap_pengobatan"class="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Awal">Tahap Awal</option>
                            <option value="Lanjutan">Tahap Lanjutan</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td><label for="berat_bdn_2">Berat Badan</label></td>
                    <td>:</td>
                    <td><input type="text-form" class="form-control" name="berat_bdn_2" id="berat_bdn_2" value="<?php echo $pasientbc['berat_bdn_2']?>"></td>

                </tr>


                <tr>
                    <td><label for="tanggal">Tanggal</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="tgl_sekarang" id="tgl_sekarang" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo date('Y-m-d')?>"><?php echo date('d-m-Y')?></td>
                </tr>


                <tr>
                    <td><label for="tgl_selanjutnya">Tanggal Checkup</label></td>
                    <td>:</td>
                    <td><input type="text" class="form-control input-tanggal" name="tgl_selanjutnya" id="tgl_selanjutnya" value="<?php echo $pasientbc['tgl_selanjutnya']?>"></td>
                </tr>

                <tr>
                    <td><label for="dosis_tablet">Dosis Tablet</label></td>
                    <td>:</td>
                    <td><input type="text-form" class="form-control" name="dosis_tablet" id="dosis_tablet" value="<?php echo $pasientbc['dosis_tablet']?>"></td>

                </tr>

                <tr>
                    <td><label for="jml_minum">Jumlah Minum</label></td>
                    <td>:</td>
                    <td rowspan="2"><input type='submit' value='Hitung' name="hitung" class="button button4"></td></td>

                </tr>

                <tr>
                    <td><label for="jml_obat">Jumlah Obat</label></td>
                    <td>:</td>
                </tr>

            </table>
              <br><br>
            <div class="but">
              <input type='submit'class="button button4"  name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
            </div>
            <br><br>


              <?php echo form_close()?>

                <!-- <input type='submit'class="button button4"  name='btnsimpan' id='simpan' value='Simpan'> &nbsp; -->
                <!-- <input type='reset' class="button button4" name='btnbatal' value='Batal' onclick="javascript:HapusText();"> -->

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

            <script type="text/javascript">
              $(document).ready(function(){
                $('.input-tanggal').datepicker({
                  dateFormat: 'yy-mm-dd'
                });
              });
            </script>
            <link rel = "stylesheet" type="text/css" href="<?php echo base_url('assets/jqueryui/jquery-ui.css');?>">
            <script type="text/javascript" src="<?php echo base_url().'js/jquery-3.4.1.min.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'assets/jqueryui/jquery-ui.js'?>"></script>


</div>
</div>
