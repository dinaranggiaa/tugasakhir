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
    <h3>Edit Data Kartu Fasilitas Kesehatan Pasien</h3>
  <div class="border"></div>

<br><br>
        <form action="<?php echo base_url()?>index.php/Faskes/UpdateData" method="post">
<div class="form-pendataan">
<table class="demo-table">
        <tbody>
             <tr>
                    <td><label for="no_faskes">No. Faskes</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="no_faskes" id="no_faskes" value="<?php echo $pasientbc['no_faskes']?>" placeholder="<?php echo $pasientbc['no_faskes']?>"><?php echo $pasientbc['no_faskes']?></td>
                </tr>

                </tr>

                <tr>
                    <td><label>Nama Pasien</label></td>
                    <td>:</td>
                    <td><?php echo $pasientbc['nm_pasien']?></td>
                </tr>

                <tr>
                    <td><label>Tipe Diagnosa</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='tipe_diagnosis' value='Terkonfirmasi Bakteriologis' <?php if($pasientbc['tipe_diagnosis']=="Terkonfirmasi Bakteriologis"){echo "checked";}?>>Terkonfirmasi Bakteriologis &nbsp; &nbsp;
                        <input type='radio' name='tipe_diagnosis' value='Terdiagnosis Klinis' <?php if($pasientbc['tipe_diagnosis']=="Terdiagnosis Klinis"){echo "checked";}?>>Terdiagnosis Klinis <br>
                    </td>
                </tr>

                <tr>
                    <td><label>Lokasi Anatomi</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="lokasi_anatomi" id="lokasi_anatomi" value="<?php echo $pasientbc['lokasi_anatomi']?>" class="form-control"></td>
                </tr>

                <tr>
                    <td><label>Status Kehamilan</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='status_hamil' value='Hamil' <?php if($pasientbc['status_hamil']=="Hamil"){echo "checked";}?>>Hamil &nbsp; &nbsp;
                        <input type='radio' name='status_hamil' value='Tidak Hamil' <?php if($pasientbc['status_hamil']=="Tidak Hamil"){echo "checked";}?>>Tidak Hamil<br>
                    </td>
                </tr>


                <tr>
                    <td><label>Paru / BCG</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='paru_bcg' value='Ada' <?php if($pasientbc['paru_bcg']=="Ada"){echo "checked";}?>>Ada &nbsp; &nbsp;
                        <input type='radio' name='paru_bcg' value='Tidak Ada' <?php if($pasientbc['paru_bcg']=="Tidak Ada"){echo "checked";}?>>Tidak Ada<br>
                    </td>
                </tr>

                <tr>
                    <td><label>Status HIV</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='status_hiv' value='Positif' <?php if($pasientbc['status_hiv']=="Positif"){echo "checked";}?>>Positif &nbsp; &nbsp;
                        <input type='radio' name='status_hiv' value='Negatif' <?php if($pasientbc['status_hiv']=="Negatif"){echo "checked";}?>>Negatif &nbsp; &nbsp;
                        <input type='radio' name='status_hiv' value='Tidak Diketahui' <?php if($pasientbc['status_hiv']=="Tidak Diketahui"){echo "checked";}?>>Tidak Diketahui<br>
                    </td>
                </tr>


                 <tr>
                    <td><label>Riwayat Diabetes Melitus</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='riwayat_dm' value='Ya' <?php if($pasientbc['riwayat_dm']=="Ya"){echo "checked";}?>>Ya &nbsp; &nbsp;
                        <input type='radio' name='riwayat_dm' value='Tidak' <?php if($pasientbc['riwayat_dm']=="Tidak"){echo "checked";}?>>Tidak<br>
                    </td>
                </tr>

                <tr>
                    <td><label for="tgl_mulai">Tanggal Mulai</label></td>
                    <td>:</td>
                    <td><input type="text" name="tgl_mulai" id="tgl_mulai" value="<?php echo $pasientbc['tgl_mulai']?>" placeholder="<?php echo $pasientbc['tgl_mulai']?>" class="form-control input-tanggal"></td>
                </tr>

                <tr>
                    <td><label for="tipe_pasien">Tipe Pasien</label></td>
                    <td>:</td>
                    <td>
                        <select name="tipe_pasien" id="tipe_pasien" class="form-control">
                            <option value="">-Pilih--</option>
                            <option value="Baru" <?php if($pasientbc['tipe_pasien']=="Baru"){echo "selected";}?>>Baru</option>
                            <option value="Diobati Setelah Gagal" <?php if($pasientbc['tipe_pasien']=="Diobati Setelah Gagal"){echo "selected";}?>>Diobati Setelah Gagal</option>
                            <option value="Kambuh" <?php if($pasientbc['tipe_pasien']=="Kambuh"){echo "selected";}?>>Kambuh</option>
                            <option value="Setelah Putus Berobat" <?php if($pasientbc['tipe_pasien']=="Setelah Putus Berobat"){echo "selected";}?>>Setelah Putus Berobat</option>
                            <option value="Tidak Diketahui" <?php if($pasientbc['tipe_pasien']=="Tidak Diketahui"){echo "selected";}?>>Tidak Diketahui</option>
                            <option value="Lain-Lain" <?php if($pasientbc['tipe_pasien']=="Lain-Lain"){echo "selected";}?>>Lain-Lain</option>
                        </select>
                    </td>

                </tr>

                <tr>
                    <td><label>Bentuk OAT</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='bentuk_oat' value='Kombipak'<?php if($pasientbc['bentuk_oat']=="Kombipak"){echo "checked";}?>>Kombipak &nbsp; &nbsp;
                        <input type='radio' name='bentuk_oat' value='KDT'<?php if($pasientbc['bentuk_oat']=="KDT"){echo "checked";}?>>KDT
                    </td>
                </tr>

                <tr>
                    <td><label for="panduan_oat">Panduan OAT</label></td>
                    <td>:</td>
                    <td>
                         <select name="panduan_oat" id="panduan_oat" class="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Kategori 1" <?php if($pasientbc['panduan_oat']=="Kategori 1"){echo "selected";}?>>Kategori 1</option>
                            <option value="Kategori 2" <?php if($pasientbc['panduan_oat']=="Kategori 2"){echo "selected";}?>>Kategori 2</option>
                            <option value="Kategori Anak" <?php if($pasientbc['panduan_oat']=="Kategori Anak"){echo "selected";}?>>Kategori Anak</option>
                        </select>
                    </td>
                </tr>


                   <tr>
                    <td><label for="sumber_obat">Sumber Obat</label></td>
                    <td>:</td>
                    <td>
                         <select name="sumber_obat" id="sumber_obat" class="form-control">
                            <option value="">--Pilih-</option>
                            <option value="Program TB" <?php if($pasientbc['sumber_obat']=="Program TB"){echo "selected";}?>>Program TB</option>
                            <option value="Asuransi" <?php if($pasientbc['sumber_obat']=="Asuransi"){echo "selected";}?>>Asuransi</option>
                            <option value="Bayar Sendiri" <?php if($pasientbc['sumber_obat']=="Bayar Sendiri"){echo "selected";}?>>Bayar Sendiri</option>
                            <option value="Lain-Lain" <?php if($pasientbc['sumber_obat']=="Lain-Lain"){echo "selected";}?>>Lain-Lain</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Jumlah Skoring TB Anak</label></td>
                    <td>:</td>
                    <td><input type="text" name="skoring_anak" id="skoring_anak" value="<?php echo $pasientbc['skoring_anak']?>" class="form-control"></td>
                </tr>

                <tr>
                    <td><label>NIK PMO</label></td>
                    <td>:</td>
                    <td><input type="text" name="nik_pmo" id="nik_pmo" value="<?php echo $pasientbc['nik_pmo']?>" class="form-control"></td>
                </tr>

                <tr>
                    <td><label>Nama PMO</label></td>
                    <td>:</td>
                    <td><input type="text" name="nm_pmo" id="nm_pmo" value="<?php echo $pasientbc['nm_pmo']?>" class="form-control"></td>
                </tr>

                <tr>
                    <td><label>NIK PMO</label></td>
                    <td>:</td>
                    <td><input type="text" name="nik_pmo" id="nik_pmo" value="<?php echo $pasientbc['nik_pmo']?>" class="form-control"></td>
                </tr>

                <tr>
                    <td><label>No HP PMO</label></td>
                    <td>:</td>
                    <td><input type="text" name="no_hp_pmo" id="no_hp_pmo" value="<?php echo $pasientbc['no_hp_pmo']?>" class="form-control">
                        </td>
                </tr>

                <tr>
                    <td><label for="alamat_pmo">Alamat</label></td>
                    <td>:</td>
                    <td>
                        <textarea name="alamat_pmo" placeholder="<?php echo $pasientbc['alamat_pmo']?>" class="form-control"><?php echo $pasientbc['alamat_pmo']?></textarea>
                       </td>
                </tr>



        </tbody>
    </table>
        <br><br>
        <div class="but">
       <input type='submit' class="button button4" name='btnupdate' id='simpan' value='SIMPAN'> &nbsp;
       <a class="button button4" href="<?php echo site_url('Faskes/listpasientbc') ?>">BACK</a> <br><br>
     </div>

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
