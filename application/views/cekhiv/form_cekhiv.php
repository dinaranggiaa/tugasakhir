<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 75%;
  margin-left: 120px;
  margin-top: 20px;
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
    <h3>Hasil Pemeriksaan HIV Pasien Tuberculosis</h3>
  <div class="border"></div>
  <br><br>
    <div class="center-pencarian">
        <?php echo form_open('Cek_hiv/caridata')?>
          <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
          <input class="button button1" type='submit' value='Cari'>
          <a class = "button button1" href="<?php echo site_url('Cek_hiv/listhiv') ?>">Daftar Transaksi</a>
        <?php echo form_close()?>
    </div>
    <br><br>
    <div class="form-pendataan">
      <form action="<?php echo base_url()?>index.php/Cek_hiv/index" method="POST">
              <table class="demo-table">
                      <tr>
                          <td><label for="id_teshiv">No Transaksi</label></td>
                          <td>:</td>
                          <td><input class="form-control" type="text" name="id_teshiv" placeholder="<?php echo $kode?>" readonly>
                              <input type="hidden" name="id_teshiv" value="<?php echo $kode?>" id="id_teshiv"></td>
                      </tr>

                        <tr>
                          <td><label for="nm_pasien">Nama Pasien</label></td>
                          <td>:</td>
                          <td><input type="text" name="nm_pasien" id="nm_pasien" class="form-control"></td>

                      <tr>
                          <td><label for="no_faskes">No Faskes</label></td>
                          <td>:</td>
                          <td><input type="text" name="no_faskes" id="no_faskes" class="form-control"></td>
                      </tr>

                      <tr>
                          <td><label for="tgl_dianjurkan">Tanggal Dianjurkan</label></td>
                          <td>:</td>
                          <td><input type="text" name="tgl_dianjurkan" id="tgl_dianjurkan" class="form-control input-tanggal"></td>
                      </tr>

                      <tr>
                          <td><label for="tgl_teshiv">Tanggal Hasil</label></td>
                          <td>:</td>
                          <td>
                             <input type="text" name="tgl_teshiv" id="tgl_teshiv" class="form-control input-tanggal">
                          </td>
                      </tr>

                       <tr>
                          <td><label for="hasil_tes">Hasil Tes</label></td>
                          <td>:</td>
                          <td>
                              <input type='radio' name='hasil_tes' value='R'>Reaktif &nbsp; &nbsp;
                              <input type='radio' name='hasil_tes' value='I'>Intermediet &nbsp; &nbsp;
                              <input type='radio' name='hasil_tes' value='NR'>Non-Reaktif
                          </td>
                      </tr>

              </table>
              <br><br>
              <div class="but">
                <input type='submit'class="button button4"  name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
                <input type='reset' class="button button4" name='btnbatal' value='BATAL' onclick="javascript:HapusText();">
              </div>
              <br><br>

              <script type="text/javascript">
                 function HapusText()
                 {
                   document.getElementById("nik_pasien").value="";
                   document.getElementById("nm_pasien").value="";
                   document.getElementById("no_faskes").value="";
                   document.getElementById("tgl_dianjurkan").value="";
                   document.getElementById("tgl_teshiv").value="";
                   document.getElementById("hasil_tes").value="";
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

    </div>

  </div>

</div>
</body>
</html>
