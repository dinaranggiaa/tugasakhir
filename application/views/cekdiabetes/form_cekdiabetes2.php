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
    <h3>Entri Pemeriksaan Diabetes Melitus Pasien Tuberculosis</h3>
  <div class="border"></div>

<br>

    <div class="center-pencarian">
        <?php echo form_open('Cek_diabetes/caridata')?>
          <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
          <input class="button button1" type='submit' value='Cari'>
          <a class = "button button1" href="<?php echo site_url('Cek_diabetes/listdiabetes')?>">Daftar Transaksi</a>
        <?php echo form_close()?>
    </div>
    <br><br>
<div class="form-pendataan">
<form action="<?php echo base_url()?>index.php/Cek_diabetes/index" method="POST">
      <fieldset>
    		<table class="demo-table" cellspacing="0">


                <tr>
                    <td><label for="id_tesdm">No Transaksi</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="id_tesdm" placeholder="<?php echo $kode?>" readonly class="form-control">
                        <input type="hidden" name="id_tesdm" value="<?php echo $kode?>" id="id_tesdm"></td>
                </tr>

                <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><?php echo $pasientbc['nm_pasien']?></td>
                </tr>

                <tr>
                    <td><label for="no_faskes">No Faskes</label></td>
                    <td>:</td>
                    <td> <?php echo $pasientbc['no_faskes']?>
                        <input type="hidden" name="no_faskes" id="no_faskes" value="<?php echo $pasientbc['no_faskes']?>"></td>
                </tr>

                <tr>
                    <td><label for="hasil_tesdm">Hasil Tes DM</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='hasil_tesdm' value='Positif'>Positif &nbsp;&nbsp;
                        <input type='radio' name='hasil_tesdm' value='Negatif+'>Negatif
                    </td>
                </tr>
                 <tr>
                    <td><label for="terapi_dm">Terapi DM</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='terapi_dm' value='OHO'>OHO &nbsp; &nbsp;
                        <input type='radio' name='terapi_dm' value='Inj Insulin'>Inj Insulin
                    </td>
                </tr>

              </table>
              <br><br>
              <div class="but">
                <input type='submit'class="button button4"  name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
                <input type='reset' class="button button4" name='btnbatal' value='BATAL' onclick="javascript:HapusText();">
              </div>
              <br><br>
      </form>
    </div>
          <script type="text/javascript">
                  function HapusText()
                  {
                    document.getElementById("hasil_tesdm").value="";
                    document.getElementById("terapi_dm").value="";
                  }
                </script>
    </div>
