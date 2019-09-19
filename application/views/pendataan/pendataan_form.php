<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 75%;
  margin-left: 130px;
  margin-top: 50px;
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
    <h3>Entri Register Terduga Pasien Tuberculosis</h3>
  <div class="border"></div>

<?php echo form_open('Pendataan/index')?>
<div class="form-pendataan">
    <form method="POST">
    		<table class="demo-table">
    			<tr>
    				<td><label for="id_register">No. Register</label></td>
    				<td>:</td>
    				<td><input type="text-form" name="id_register" placeholder="<?php echo $kode?>" readonly class="form-control"></td>
            <input type="hidden" name="id_register" value="<?php echo $kode?>" id="id_register">

    			</tr>

                <tr>
                            <td><label for="tanggal">Tanggal</label></td>
                            <td>:</td>
                            <td><input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo date('Y-m-d')?>"><?php echo date('d-M-Y')?></td>
                </tr>

    			<tr>
    				<td><label for="nm_pasien">Nama Pasien</label></td>
    				<td>:</td>
    				<td><input type="text-form" name="nm_pasien" id="nm_pasien" class="form-control" autofocus></td>
    			</tr>

                <tr>
                    <td><label for="nik_pasien">NIK</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="nik_pasien" id="nik_pasien" class="form-control"></td>

                </tr>

    			<tr>
    				<td><label for="no_rm">No. RM</label></td>
    				<td>:</td>
    				<td><input type="text-form" name="no_rm" id="no_rm" class="form-control"></td>
    			</tr>

    			<tr>
    				<td><label for="no_bpjs">No BPJS</label></td>
    				<td>:</td>
    				<td><input type="text-form" name="no_bpjs" id="no_bpjs" class="form-control"></td>
    			</tr>

    			<tr>
    				<td><label for="alamat">Alamat</label></td>
    				<td>:</td>
    				<td><textarea name='alamat' cols='25' rows='3' class="form-control"></textarea></td>
    			</tr>

    			<tr>
    				<td><label for="tgl_lahir">Tanggal Lahir</label></td>
    				<td>:</td>
    				<td><input type="text" name="tgl_lahir" id="tgl_lahir" class="input-tanggal form-control"></td>
    			</tr>

    			<tr>
    				<td><label for="jenkel">Jenis Kelamin</label></td>
    				<td>:</td>
    				<td><input type='radio' name='jenkel' value='Pria'>Pria &nbsp;&nbsp;
				      <input type='radio' name='jenkel' value='Wanita'>Wanita</td>
    			</tr>

    			<tr>
    				<td><label for="no_hp">No. HP Pasien</label></td>
    				<td>:</td>
    				<td><input type="text-form" name="no_hp" id="no_hp" class="form-control"></td>
    			</tr>
    			<tr>
    				<td><label for="berat_bdn">Berat Badan</label></td>
    				<td>:</td>
    				<td><input type="text-form" name="berat_bdn" id="berat_bdn" size="2" class="form-control"><label for="berat_bdn">Kg</label></td>

    			</tr>
    			<tr>
    				<td><label for="tinggi_bdn">Tinggi Badan</label></td>
    				<td>:</td>
    				<td><input type="text-form" name="tinggi_bdn" id="tinggi_bdn" size="2" class="form-control"><label for="tinggi_bdn">Cm</label></td>
    			</tr>

    		</table>

          <br><br>
          <div class="but">
            <input type='submit' class="button button4" name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
            <input type='reset' class="button button4" name='btnbatal' value='BATAL' onclick="javascript:HapusText();">
        </div>

          <br><br><br>

          <script type="text/javascript">
              function HapusText()
              {
                document.getElementById("nm_pasien").value="";
                document.getElementById("nik_pasien").value="";
                document.getElementById("no_rm").value="";
                document.getElementById("no_bpjs").value="";
                document.getElementById("alamat").value="";
                document.getElementById("tgl_lahir").value="";
                document.getElementById("jenkel").value="";
                document.getElementById("no_hp").value="";
                document.getElementById("berat_bdn").value="";
                document.getElementById("tinggi_bdn").value="";
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
    <?php echo form_close()?>
</div>
</div>
  <!-- <script type="text/javascript" src="<?php // echo base_url().'assets/js/datepicker.js'?>"></script> -->

  </div>
</body>

</html>
