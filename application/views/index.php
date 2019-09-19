<div class = "center">
  <!--<div id="formContent">-->
    <!--Tabs Title-->

    <!-- Icon -->
    <div class="fadeIn first">
      <br>
      <legend><h4>Pendataan Terduga Tuberculosis</h4></legend>
      <br>
    </div>

    <form method="POST">
    	<fieldset>
    		<table cellspacing="0">
    			<tr>
    				<td width=" 100x"><label for="tanggal">Tanggal</label></td>
    				<td width="15px">:</td>
    				<td><?echo date('m-d-Y');?></td>
    			</tr>
    			<tr>
    				<td><label for="id_register">No. Register</label> </td>
    				<td>:</td>
    				<td><input type="text" name="id_register" id="id_register"/></td>
    			</tr>

    			<tr>
    				<td><label for="nm_pasien">Nama Pasien</label></td>
    				<td>:</td>
    				<td><input type="text" name="nm_pasien" id="nm_pasien"></td>
    			</tr>
    				<td><label for="nik_pasien">NIK</label></td>
    				<td>:</td>
    				<td><input type="text" name="nik_pasien" id="nik_pasien"></td>
    			<tr>
    				<td><label for="no_rm">No. RM</label></td>
    				<td>:</td>
    				<td><input type="text" name="no_rm" id="no_rm"></td>
    			</tr>

    			<tr>
    				<td><label for="no_bpjs">No BPJS</label></td>
    				<td>:</td>
    				<td><input type="text" name="no_bpjs" id="no_bpjs"></td>
    			</tr>

    			<tr>
    				<td><label for="alamat">Alamat</label></td>
    				<td>:</td>
    				<td><textarea name='alamat' cols='30' rows='3'></textarea></td>
    			</tr>

    			<tr>
    				<td><label for="tgl_lahir">Tanggal Lahir</label></td>
    				<td>:</td>
    				<td><input type="date" name="tgl_lahir" id="tgl_lahir"></td>
    			</tr>

    			<tr>
    				<td><label for="jenkel">Jenis Kelamin</label></td>
    				<td>:</td>
    				<td><input type='radio' name='jenkel' value='P' checked>Pria &nbsp;&nbsp;
				      <input type='radio' name='jenkel' value='W' checked>Wanita</td>
    			</tr>
    			<tr>
    				<td><label for="no_hp">No. HP Pasien</label></td>
    				<td>:</td>
    				<td><input type="text" name="tinggi_bdn" id="no_hp"></td>
    			</tr>
    			<tr>
    				<td><label for="berat_bdn">Berat Badan</label></td>
    				<td>:</td>
    				<td><input type="text" name="berat_bdn" id="berat_bdn" size="2"> <label for="berat_bdn">Kg</label></td>
    				
    			</tr>
    			<tr>
    				<td><label for="tinggi_bdn">Tinggi Badan</label></td>
    				<td>:</td>
    				<td><input type="text" name="tinggi_bdn" id="tinggi_bdn" size="2"> <label for="tinggi_bdn">Cm</label></td>
    			</tr>

    		</table>

          <input type='submit' name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
          <input type='reset' name='btnbatal' value='BATAL'>
      </fieldset>
    </form>

  <!--</div>-->
</div>
