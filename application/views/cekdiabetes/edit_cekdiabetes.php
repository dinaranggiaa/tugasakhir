<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 75%;
  margin-left: 250px;
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
    <h3>Edit Data Pemeriksaan Diabetes Pasien Tuberculosis</h3>
  <div class="border"></div>

<br><br>

<form action="<?php echo base_url()?>index.php/Cek_diabetes/updatediabetes" method="post">
  <div class="form-pendataan">

    <table class="demo-table">
        <tbody>
          <tr>
            <td><label for="id_tesdm">No Transaksi</label></td>
            <td>:</td>
            <td><input type="text" readonly class="form-control" name="id_tesdm" id="id_tesdm" value="<?php echo $pasientbc['id_tesdm']?>" placeholder="<?php echo $pasientbc['id_tesdm']?>"></td>
          </tr>

          <tr>
            <td><label for="nm_pasien">Nama Pasien</label></td>
            <td>:</td>
            <td><input type="text" readonly class="form-control" name="id_tesdm" id="id_tesdm" value="<?php echo $pasientbc['nm_pasien']?>" placeholder="<?php echo $pasientbc['nm_pasien']?>"></td>
          </tr>

          <tr>
            <td><label for="no_faskes">No. Faskes</label></td>
            <td>:</td>
            <td><input type="text" readonly class="form-control" name="no_faskes" id="no_faskes" value="<?php echo $pasientbc['no_faskes']?>" placeholder="<?php echo $pasientbc['no_faskes']?>"></td>
          </tr>

          <tr>
            <td><label for="hasil_tesdm">Hasil Tes DM</label></td>
            <td>:</td>
            <td>
              <input type='radio' name='hasil_tesdm' value='Positif' <?php if($pasientbc['hasil_tesdm']=="Positif"){echo "checked";}?>>Positif &nbsp; &nbsp;
              <input type='radio' name='hasil_tesdm' value='Negatif' <?php if($pasientbc['hasil_tesdm']=="Negatif"){echo "checked";}?>>Negatif<br>
            </td>
          </tr>

          <tr>
            <td><label for="terapi_dm">Terapi DM</label></td>
            <td>:</td>
            <td>
              <input type='radio' name='terapi_dm' value='OHO' <?php if($pasientbc['terapi_dm']=="OHO"){echo "checked";}?>>OHO &nbsp; &nbsp;
              <input type='radio' name='terapi_dm' value='Inj Insulin' <?php if($pasientbc['terapi_dm']=="Inj Insulin"){echo "checked";}?>>Inj Insulin<br>
            </td>
          </tr>


        </tbody>
    </table>
      <div class="but">
       <input type='submit' class="button button4" name='btnupdate' id='simpan' value='SIMPAN'> &nbsp;
     </div>
       <br><br><br>
</form>
  </div>

</div>
