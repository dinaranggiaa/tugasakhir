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
    <h3>Edit Data Pasien Tuberculosis</h3>
  <div class="border"></div>

  <br><br>

  <form action="<?php echo base_url()?>index.php/Hasil_akhir/updatehasil" method="post">
    <div class="form-pendataan">
      <table class="demo-table">
          <tbody>
                <tr>
                      <td><label for="id_hasil">No Transaksi</label></td>
                      <td>:</td>
                      <td><?php echo $pasientbc['id_hasil']?>
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
                      <td><label for="tgl_selesai">Tanggal Selesai Pengobatan</label></td>
                      <td>:</td>
                      <td><input type="text" class="form-control input-tanggal" name="tgl_selesai" id="tgl_selesai" value="<?php echo $pasientbc['tgl_selesai']?>" placeholder="<?php echo $pasientbc['tgl_selesai']?>"></td>
                  </tr>

                   <tr>
                      <td><label for="hasilakhir">Hasil</label></td>
                      <td>:</td>
                      <td>
                          <select name="hasilakhir" id="hasilakhir" class="form-control">
                              <option value="">--PILIH HASIL--</option>
                              <option value="Sembuh" <?php if($pasientbc['hasilakhir']=="Sembuh"){echo "selected";}?>>Sembuh</option>
                              <option value="Gagal" <?php if($pasientbc['hasilakhir']=="Gagal"){echo "selected";}?>>Gagal</option>
                              <option value="Meninggal" <?php if($pasientbc['hasilakhir']=="Meninggal"){echo "selected";}?>>Meninggal</option>
                              <option value="Lost To Follow Up" <?php if($pasientbc['hasilakhir']=="Lost To Follow Up"){echo "selected";}?>>Lost To Follow Up</option>
                              <option value="Pengobatan Lengkap"<?php if($pasientbc['hasilakhir']=="Pengobatan Lengkap"){echo "selected";}?>>Pengobatan Lengkap</option>
                          </select>
                      </td>
                  </tr>

          </tbody>
      </table>
          <br><br>
          <div class="but">
         <input type='submit' class="button button4" name='btnupdate' id='simpan' value='SIMPAN'> &nbsp;
       </div>
         <br><br>
  </form>

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
