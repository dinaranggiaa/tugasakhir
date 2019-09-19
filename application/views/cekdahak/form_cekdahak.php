<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 75%;
  margin-left: 130px;
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
    <h3>Entri Hasil Pemeriksaan Dahak Pasien Tuberculosis</h3>
  <div class="border"></div>

<br><br>

    <div class="center-pencarian">
        <?php echo form_open('Cek_dahak/caridata')?>
          <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
          <input class="button button1" type='submit' value='CARI'>
          <a class = "button button1" href="<?php echo site_url('Cek_dahak/listdahak')?>">DAFTAR TRANSAKSI</a>
        <?php echo form_close()?>
    </div>
    <br><br>

<div class="form-pendataan">
<form action="<?php echo base_url()?>index.php/Cek_dahak/index" method="POST">
      <fieldset>
    		<table class="demo-table" cellspacing="0">

                <tr>
                    <td><label for="id_cekdahak">No Transaksi</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="id_cekdahak" placeholder="<?php echo $kode?>" readonly class="form-control">
                    <input type="hidden" name="id_cekdahak" value="<?php echo $kode?>" id="id_cekdahak"></td>
                </tr>

                <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="nm_pasien" id="nm_pasien" class="form-control"></td>
                </tr>

    			<tr>
    				<td><label for="no_faskes">No. Faskes</label> </td>
    				<td>:</td>
    				<td><input type="text-form" name="no_faskes" value="" class="form-control"></td>
    			</tr>

                <tr>
                    <td><label for="no_reglab">No Reg Laboratorium</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="no_reglab" id="no_reglab" class="form-control"></td>
                </tr>


                </tr>

                <tr>
                    <td><label for="tgl_tes">Tanggal Hasil</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="tgl_tes" id="tgl_tes" class="form-control input-tanggal"></td>
                </tr>

                <tr>
                    <td><label for="bulan_ke">Bulan Ke - </label></td>
                    <td>:</td>
                    <td>
                        <select name="bulan_ke" id="bulan_ke" class="form-control">
                            <option value="">--Pilih Bulan--</option>
                            <option value="0">0</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="bta">Bakteri Tahan Asam (BTA)</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='bta' value='pos'>Positif &nbsp; &nbsp;
                        <input type='radio' name='bta' value='neg'>Negatif &nbsp; &nbsp;
                        <input type='radio' name='bta' value='TDL'>Tidak Dilakukan Pemeriksaan
                    </td>
                </tr>

                <tr>
                    <td><label for="biakan">Biakan</label></td>
                    <td>:</td>
                    <td>
                        <select type="text-form" name="biakan" id="biakan" class="form-control">
                            <option value="">-Pilih--</option>
                            <option value="Neg">Tidak Ada Koloni</option>
                            <option value="1+">20-100 Koloni</option>
                            <option value="2+">>100-200 Koloni</option>
                            <option value="3+">>200-500 Koloni</option>
                            <option value="4+">>500 Koloni</option>
                            <option value="NTM">Kuman Non TBC</option>
                            <option value="Kontaminasi">Kontaminasi</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td><label for="tes_cepat">Tes Cepat</label></td>
                    <td>:</td>
                    <td>
                        <select type="text-form" name="tes_cepat" id="tes_cepat" class="form-control">
                            <option value="">-Pilih--</option>
                            <option value="Neg">MTB Not Detected</option>
                            <option value="Rif Sen">MTB Detected, Rif Resistance, Not Detected</option>
                            <option value="Rif Res">MTB Detected, Rif Resistance, Detected</option>
                            <option value="Rif Indet">MTB Detected, Rif Resistance Indeterminated</option>
                            <option value="Invalid">Invalid</option>
                            <option value="Error">Error</option>
                            <option value="No Result">No Result</option>
                        </select>
                    </td>
                </tr>

    		</table>

            <br><br>
            <div class="but">
            <input type='submit'class="button button4"  name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
            <input type='reset' class="button button4" name='btnbatal' value='BATAL' onclick="javascript:HapusText();">
          </div>

          <script type="text/javascript">
            function HapusText()
            {
              document.getElementById("nm_pasien").value="";
              document.getElementById("no_faskes").value="";
              document.getElementById("no_reglab").value="";
              document.getElementById("tgl_tes").value="";
              document.getElementById("bulan_ke").value="";
              document.getElementById("bta").value="";
              document.getElementById("biakan").value="";
              document.getElementById("tes_cepat").value="";
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

</form>
<br><br>


</div>

</div>

</div>
</body>
</html>
