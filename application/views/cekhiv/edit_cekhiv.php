<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 70%;
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
    <h3>Edit Data Pemeriksaan HIV Pasien Tuberculosis</h3>
  <div class="border"></div>

<br><br>
<form action="<?php echo base_url()?>index.php/Cek_hiv/UpdateHiv" method="post">
  <div class="form-pendataan">

    <table class="demo-table">
        <tbody>
            <tr>
              <td><label for="id_teshiv">No Transaksi</label></td>
              <td>:</td>
              <td><input type="hidden" name="id_teshiv" id="id_teshiv" value="<?php echo $pasientbc['id_teshiv']?>" placeholder="<?php echo $pasientbc['id_teshiv']?>"><?php echo $pasientbc['id_teshiv']?></td>
            </tr>

            <tr>
              <td><label for="nm_pasien">Nama Pasien</label></td>
              <td>:</td>
              <td><?php echo $pasientbc['nm_pasien']?>
            </tr>


            <tr>
              <td><label for="no_faskes">No. Faskes</label></td>
                <td>:</td>
                <td><input type="hidden" name="no_faskes" id="no_faskes" value="<?php echo $pasientbc['no_faskes']?>" placeholder="<?php echo $pasientbc['no_faskes']?>"><?php echo $pasientbc['no_faskes']?>
                </td>
            </tr>

            <tr>
              <td><label for="tgl_dianjurkan">Tanggal Dianjurkan</label></td>
              <td>:</td>
              <td><input type="text" class="form-control input-tanggal" name="tgl_dianjurkan" id="tgl_dianjurkan" value="<?php echo $pasientbc['tgl_dianjurkan']?>"></td>
            </tr>

            <tr>
              <td><label for="tgl_teshiv">Tanggal Hasil</label></td>
              <td>:</td>
              <td><input type="text" class="form-control input-tanggal" name="tgl_teshiv" id="tgl_teshiv" value="<?php echo $pasientbc['tgl_teshiv']?>"></td>
            </tr>

           <tr>
              <td><label for="hasil_tes">Hasil Tes</label></td>
              <td>:</td>
              <td>
                <input type='radio' name='hasil_tes' value='R' <?php if($pasientbc['hasil_tes']=="R"){echo "checked";}?>/>Reaktif <br>
                <input type='radio' name='hasil_tes' value='I' <?php if($pasientbc['hasil_tes']=="I"){echo "checked";}?>>Intermediet <br>
                <input type='radio' name='hasil_tes' value='NR' <?php if($pasientbc['hasil_tes']=="NR"){echo "checked";}?>/>Non-Reaktif
              </td>
        </tbody>
    </table>
        <div class="but">
       <input type='submit' class="button button4" name='btnupdate' id='simpan' value='SIMPAN'> &nbsp;
     </div>
       <br><br><br>
</form>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.input-tanggal').datepicker({
        dateFormat: 'yy-mm-dd'
      });
    });
  </script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jqueryui/jquery-ui.css');?>">
  <script type="text/javascript" src="<?php echo base_url().'js/jquery-3.4.1.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/jqueryui/jquery-ui.js'?>"></script>
  </div>
</div>
