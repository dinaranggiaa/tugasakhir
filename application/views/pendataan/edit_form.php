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
    <h3>Edit Data Pasien</h3>
  <div class="border"></div>

<br><br>

    <form action="<?php echo base_url()?>index.php/Pendataan/UpdateData" method="post">
<div class="form-pendataan">

            <table class="demo-table" cellspacing="0">
               <tr>
                    <td><label>No. Register</label> </td>
                    <td>:</td>
                    <td><?php echo $pasien['id_register']?></td>
                </tr>

                <tr>
                    <td><label for="nik_pasien">NIK</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="nik_pasien" value="<?php echo $pasien['nik_pasien']?>"><?php echo $pasien['nik_pasien']?></td>
                </tr>

                <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="nm_pasien" value="<?php echo $pasien['nm_pasien']?>" class="form-control"></td>
                </tr>

                <!--<tr>
                    <td><label for="no_rm">No. RM</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="no_rm" value="<?php //echo $pasien['no_rm']?>"></td>
                </tr>

                <tr>
                    <td><label for="tgl_daftar">Tanggal Daftar</label></td>
                    <td>:</td>
                    <td><input type="date" name="tgl_daftar" value="<?php //echo $pasien['tgl_daftar']?>"></td>
                </tr>-->

                <tr>
                    <td><label for="no_bpjs">No BPJS</label></td>
                    <td>:</td>
                    <td><input class="form-control" type="text-form" name="no_bpjs" value="<?php echo $pasien['no_bpjs']?>"></td>
                </tr>

                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td>:</td>
                    <td>
                        <textarea class="form-control" name="alamat" placeholder="<?php echo $pasien['alamat']?>" ><?php echo $pasien['alamat']?></textarea>
                       </td>
                </tr>

                <tr>
                    <td><label for="tgl_lahir">Tanggal Lahir</label></td>
                    <td>:</td>
                    <td><input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $pasien['tgl_lahir']?>" class="form-control"></td>
                </tr>

                <tr>
                    <td><label for="jenkel">Jenis Kelamin</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='jenkel' value='W' <?php if($pasien['jenkel']=="W"){echo "checked";}?>>Wanita &nbsp; &nbsp;
                        <input type='radio' name='jenkel' value='P' <?php if($pasien['jenkel']=="P"){echo "checked";}?>>Pria
                </td>

                <tr>
                    <td><label for="no_hp">No. HP Pasien</label></td>
                    <td>:</td>
                    <td><input class="form-control" type="text-form" name="no_hp" value="<?php echo $pasien['no_hp']?>"></td>
                </tr>
                <tr>
                    <td><label for="berat_bdn">Berat Badan</label></td>
                    <td>:</td>
                    <td><input type="text-form" class="form-control" name="berat_bdn" id="berat_bdn" size="2" value="<?php echo $pasien['berat_bdn']?>"> <label for="berat_bdn">Kg</label></td>

                </tr>
                <tr>
                    <td><label for="tinggi_bdn">Tinggi Badan</label></td>
                    <td>:</td>
                    <td><input type="text-form" class="form-control" name="tinggi_bdn" id="tinggi_bdn" size="2" value="<?php echo $pasien['tinggi_bdn']?>"> <label for="tinggi_bdn">Cm</label></td>
                </tr>

            </table>

              <input type='submit' class="button button4" name='btnupdate' id='simpan' value='SIMPAN'> &nbsp;

              <br><br>
    </form>

  </div>
</div>
