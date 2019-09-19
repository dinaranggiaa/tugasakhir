<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 75%;
  margin-left: 150px;
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
    <h3>Edit Data Pemeriksaan Dahak Pasien Tuberculosis</h3>
  <div class="border"></div>

<br><br>

<form action="<?php echo base_url()?>index.php/Cek_dahak/updatedahak" method="post">
  <div class="form-pendataan">

    <table class="demo-table">
        <tbody>
          <tr>
            <td><label for="id_cekdahak">No Transaksi</label></td>
            <td>:</td>
            <td><input type="hidden" name="id_cekdahak" id="id_cekdahak" value="<?php echo $pasientbc['id_cekdahak']?>" placeholder="<?php echo $pasientbc['id_cekdahak']?>"><?php echo $pasientbc['id_cekdahak']?></td>
          </tr>

          <tr>
            <td><label for="nm_pasien">Nama Pasien</label></td>
            <td>:</td>
            <td><?php echo $pasientbc['nm_pasien']?>
          </tr>

          <tr>
            <td><label for="no_faskes">No. Faskes</label></td>
            <td>:</td>
            <td><input type="hidden" name="no_faskes" id="no_faskes" value="<?php echo $pasientbc['no_faskes']?>" placeholder="<?php echo $pasientbc['no_faskes']?>"><?php echo $pasientbc['no_faskes']?></td>
          </tr>

          <tr>
            <td><label for="no_reglab">No Reg Laboratorium</label></td>
            <td>:</td>
            <td><input type="text" name="no_reglab" id="no_reglab" value="<?php echo $pasientbc['no_reglab']?>" placeholder="<?php echo $pasientbc['no_reglab']?>" class="form-control"></td>
          </tr>


          <tr>
            <td><label for="tgl_tes">Tanggal Hasil</label></td>
            <td>:</td>
            <td><input type="text" name="tgl_tes" id="tgl_tes" value="<?php echo $pasientbc['tgl_tes']?>" placeholder="<?php echo $pasientbc['tgl_tes']?>" class="form-control"></td>
          </tr>

          <tr>
              <td><label for="bulan_ke">Bulan Ke - </label></td>
              <td>:</td>
              <td>
                  <select name="bulan_ke" id="bulan_ke" class="form-control">
                      <option value="">--PILIH BULAN--</option>
                      <option value="0"<?php if($pasientbc['bulan_ke']=="0"){echo "selected";}?>>0</option>
                      <option value="2"<?php if($pasientbc['bulan_ke']=="2"){echo "selected";}?>>2</option>
                      <option value="3"<?php if($pasientbc['bulan_ke']=="3"){echo "selected";}?>>3</option>
                      <option value="6"<?php if($pasientbc['bulan_ke']=="6"){echo "selected";}?>>6</option>
                      <option value="8"<?php if($pasientbc['bulan_ke']=="8"){echo "selected";}?>>8</option>
                  </select>
              </td>
          </tr>

          <tr>
              <td><label for="bta">Bakteri Tahan Asam (BTA)</label></td>
              <td>:</td>
              <td>
                  <input type='radio' name='bta' value='pos'<?php if($pasientbc['bta']=="pos"){echo "checked";}?>>Positif &nbsp; &nbsp;
                  <input type='radio' name='bta' value='neg'<?php if($pasientbc['bta']=="neg"){echo "checked";}?>>Negatif &nbsp; &nbsp;
                  <input type='radio' name='bta' value='TDL'<?php if($pasientbc['bta']=="TDL"){echo "checked";}?>>Tidak Dilakukan Pemeriksaan
              </td>
          </tr>

          <tr>
              <td><label for="biakan">Biakan</label></td>
              <td>:</td>
              <td>
                  <select type="text-form" name="biakan" id="biakan" class="form-control">
                      <option value="">-Pilih--</option>
                      <option value="Neg"<?php if($pasientbc['biakan']=="Neg"){echo "selected";}?>>Tidak Ada Koloni</option>
                      <option value="1+"<?php if($pasientbc['biakan']=="1+"){echo "selected";}?>>20-100 Koloni</option>
                      <option value="2+"<?php if($pasientbc['biakan']=="2+"){echo "selected";}?>>>100-200 Koloni</option>
                      <option value="3+"<?php if($pasientbc['biakan']=="3+"){echo "selected";}?>>>200-500 Koloni</option>
                      <option value="4+"<?php if($pasientbc['biakan']=="4+"){echo "selected";}?>>>500 Koloni</option>
                      <option value="NTM"<?php if($pasientbc['biakan']=="NTM"){echo "selected";}?>>Kuman Non TBC</option>
                      <option value="Kontaminasi"<?php if($pasientbc['biakan']=="Kontaminasi"){echo "selected";}?>>Kontaminasi</option>
                  </select>
              </td>
          </tr>

          <tr>
              <td><label for="tes_cepat">Tes Cepat</label></td>
              <td>:</td>
              <td>
                  <select type="text-form" name="tes_cepat" id="tes_cepat" class="form-control">
                      <option value="">-Pilih--</option>
                      <option value="Neg"<?php if($pasientbc['tes_cepat']=="Neg"){echo "selected";}?>>MTB Not Detected</option>
                      <option value="Rif Sen"<?php if($pasientbc['tes_cepat']=="Rif Sen"){echo "selected";}?>>MTB Detected, Rif Resistance, Not Detected</option>
                      <option value="Rif Res"<?php if($pasientbc['tes_cepat']=="Rif Res"){echo "selected";}?>>MTB Detected, Rif Resistance, Detected</option>
                      <option value="Rif Indet"<?php if($pasientbc['tes_cepat']=="Rif Indet"){echo "selected";}?>>MTB Detected, Rif Resistance Indeterminated</option>
                      <option value="Invalid"<?php if($pasientbc['tes_cepat']=="Invalid"){echo "selected";}?>>Invalid</option>
                      <option value="Error"<?php if($pasientbc['tes_cepat']=="Error"){echo "selected";}?>>Error</option>
                      <option value="No Result"<?php if($pasientbc['tes_cepat']=="No Result"){echo "selected";}?>>No Result</option>
                  </select>
              </td>
          </tr>

        </tbody>
    </table>
      <br></br>
      <div class="but">
       <input type='submit' class="button button4" name='btnupdate' id='simpan' value='SIMPAN'> &nbsp;
     </div>
       <br><br>
</form>
  </div>

</div>
