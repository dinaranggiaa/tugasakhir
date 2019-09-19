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
    <h3>Entri Data Pasien Tuberculosis</h3>
<div class="border"></div>

<br><br>

<div class="center-pencarian">
    <?php echo form_open('Faskes/search')?>
      <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input Id Register / Nama Pasien">
      <input class="button button1" type='submit' value='Cari'>
    <?php echo form_close()?>
</div>
<br><br>

<div class="form-pendataan">
<form action="<?php echo base_url()?>Faskes/index" method="post">

    <table class="demo-table" cellspacing="0">

                <tr>
                	<td><label for="no_faskes">No. Faskes</label> </td>
                	<td>:</td>
       				<td><input type="text-form" class ="form-control" name="no_faskes" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
    			</tr>


               <tr>
                            <td><label for="tanggal">Tanggal</label></td>
                            <td>:</td>
                            <td><input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo date('Y-m-d')?>"><?php echo date('d-m-Y')?></td>
                </tr>

                <tr>
                    <td><label for="id_register">Id Register</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="id_register" id="id_register" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="nik_pasien">NIK</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="nik_pasien" id="nik_pasien" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="keyword" id="nm_pasien" class="form-control"></td>
                </tr>
                  <tr>
                    <td>
                        <label for="status_hamil">Status Kehamilan</label>
                    </td>
                    <td>:</td>
                    <td><input type='radio' name='status_hamil' value='Hamil'>Hamil &nbsp;&nbsp;
                        <input type='radio' name='status_hamil' value='Tidak Hamil'>Tidak Hamil
                    </td>
                </tr>

                <tr>
                    <td><label for="paru_bcg">Paru / BCG</label></td>
                    <td>:</td>
                    <td><input type='radio' name='paru_bcg' value='Ada'>Ada &nbsp;&nbsp;
                        <input type='radio' name='paru_bcg' value='Tidak Ada'>Tidak Ada
                    </td>
                </tr>


                <tr>
                    <td><label for="skoring_anak">Skoring Anak</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="skoring_anak" id="skoring_anak" class="form-control"></td>
                </tr>
    			      <tr>
    				        <td>
                        <label for="tipe_diagnosis">Tipe Diagnosis</label>
                    </td>
    				            <td>:</td>
    				<td>
                        <input type='radio' name='tipe_diagnosis' value='Terkonfirmasi Bakteriologis'>Terkonfirmasi Bakteriologis &nbsp; &nbsp;
                        <input type='radio' name='tipe_diagnosis' value='Terdiagnosis Klinis'>Terdiagnosis Klinis
                    </td>
                </tr>

                <tr>
                    <td><label for="lokasi_anatomi">Lokasi Anatomi</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="lokasi_anatomi" id="lokasi_anatomi" class="form-control"></td>
                </tr>


    			<tr>
                    <td><label for="status_hiv">Status HIV</label></td>
                    <td>:</td>
                    <td><input type='radio' name='status_hiv' value='Positif'>Positif &nbsp;&nbsp;
                        <input type='radio' name='status_hiv' value='Negatif'>Negatif &nbsp; &nbsp;
                        <input type='radio' name='status_hiv' value='Tidak Diketahui'>Tidak Diketahui
                    </td>
                </tr>


                <tr>
                    <td>
                        <label for="riwayat_dm">Riwayat DM</label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='riwayat_dm' value='Ya'>Ya &nbsp;&nbsp;
                        <input type='radio' name='riwayat_dm' value='Tidak'>Tidak
                    </td>
                </tr>

                <tr>
                    <td><label for="tipe_pasien">Tipe Pasien</label></td>
                    <td>:</td>
                    <td>
                        <select name="tipe_pasien" id="tipe_pasien" class="form-control">
                            <option value="">-Pilih--</option>
                            <option value="Baru">Baru</option>
                            <option value="Diobati Setelah Gagal">Diobati Setelah Gagal</option>
                            <option value="Kambuh">Kambuh</option>
                            <option value="Setelah Putus Berobat">Setelah Putus Berobat</option>
                            <option value="Tidak Diketahui">Tidak Diketahui</option>
                            <option value="Lain-Lain">Lain-Lain</option>
                        </select>
                    </td>

                </tr>

    			<tr>
    				<td><label for="panduan_oat">Panduan OAT</label></td>
    				<td>:</td>
    				<td>
                         <select name="panduan_oat" id="panduan_oat" class="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Kategori 1">Kategori 1</option>
                            <option value="Kategori 2">Kategori 2</option>
                            <option value="Kategori Anak">Kategori Anak</option>
                        </select>
                    </td>
    			</tr>

    			<tr>
    				<td><label for="bentuk_oat">Bentuk OAT</label></td>
    				<td>:</td>
                    <td>
                        <input type='radio' name='bentuk_oat' value='KDT'>KDT &nbsp;&nbsp;
                        <input type='radio' name='bentuk_oat' value='Kombipak'>Kombipak
                    </td>

    			</tr>

                <tr>
                    <td><label for="sumber_obat">Sumber Obat</label></td>
                    <td>:</td>
                    <td>
                         <select name="sumber_obat" id="sumber_obat" class="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Program TB">Program TB</option>
                            <option value="Asuransi">Asuransi</option>
                            <option value="Bayar Sendiri">Bayar Sendiri</option>
                            <option value="Lain-Lain">Lain-Lain</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="nm_pmo">Nama PMO</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="nm_pmo" id="nm_pmo" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="nik_pmo">NIK PMO</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="nik_pmo" id="nik_pmo" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="no_hp">No Hp PMO</label></td>
                    <td>:</td>
                    <td><input type="text" name="no_hp_pmo" id="no_hp" class="form-control"></td>
                </tr>

             <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td>:</td>
                    <td><textarea name='alamat_pmo' cols='30' rows='3' class="form-control"></textarea></td>
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
                document.getElementById("nik_pasien").value="";
                document.getElementById("nm_pasien").value="";
                document.getElementById("status_kehamilan").value="";
                document.getElementById("paru_bcg").value="";
                document.getElementById("skoring_anak").value="";
                document.getElementById("tipe_diagnosis").value="";
                document.getElementById("lokasi_anatomi").value="";
                document.getElementById("status_hiv").value="";
                document.getElementById("riwayat_dm").value="";
                document.getElementById("tipe_pasien").value="";
                document.getElementById("panduan_oat").value="";
                document.getElementById("bentuk_oat").value="";
                document.getElementById("name").value="";
                document.getElementById("nik_pmo").value="";
                document.getElementById("no_hp_pmo").value="";
                document.getElementById("alamat_pmo").value="";
              }
            </script>
</form>
<br><br>
</div>
</div>

</div>
</body>
</html>
