<!--SIDE BAR-->
<?php $this->view('partials/sidebar_admin')?>

<style>
  .inputsearch {
    float: right;
    margin-right: 15px;
  }

  .inputsearch input.form-control{
    width: 250px;
  }

  .demo-table tbody td {
    color: #353535;
  }

  input.form-control{
    width: 350px;
  }

  .modal-body td{
    padding: 5px;
  }
  label {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color: #555;
    font-size: 15px;
  }

  input{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color: #555;
    font-size: 15px;
  }

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

.form-pendataan{
  padding-left: 250px;
  padding-top: 25px;
}

</style>

  <div class="center-bar">
    <h3><i class='far fa-folder-open'></i>&nbsp;Penilaian Pelamar</h3> 
    <div class="border"></div>

    <div class="center-pencarian" style="padding-top:30px;">
        <?php echo form_open('C_PenilaianPelamar/cari_data')?>
          <input class="form-control" type="text-form" name="keyword" id="" placeholder="Masukkan Kode Pelamar / Nama Pelamar">
          <button class="button button1" type='submit'><i class='fas fa-search'></i></button>
        <?php echo form_close()?>
    </div>
    
    <div class="form-pendataan" style="padding-bottom: 25px;">
      
    <form>
              <table style="width: 70%">
              <tr>
                <td><label for="id_karyawan">Kode Karyawan</label></td>
                <td>:</td>
                <td><input readonly type="text-form" class ="form-control" name="id_karyawan" id="id_karyawan"></td>
              </tr>
              <tr>
                <td style="width: 25%"><label for="id_pelamar">Kode pelamar</label></td>
                <td style="width: 5%">:</td>
                <td><input type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar"></td>
              </tr>
              <tr>
                <td><label for="nm_pelamar">Nama Lengkap</label></td>
                <td>:</td>
                <td><input type="text-form" name="nm_pelamar" id="nm_pelamar" class="form-control"></td>
              </tr>
          <tr>
            <td><label for="tgl_daftar">Tanggal Daftar</label></td>
            <td>:</td>
            <td><input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control"></td>
          </tr>
          <tr>
          <tr>
            <td><label for="nm_pelamar">Nama Lengkap</label></td>
            <td>:</td>
            <td><input type="text-form" name="nm_pelamar" id="nm_pelamar" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="jk_pelamar">Jenis Kelamin</label></td>
            <td>:</td>
            <td><input type="radio" name="jk_pelamar" value="Pria"> Pria
                &nbsp; &nbsp;<input type="radio" name="jk_pelamar" value="Wanita"> Wanita</td>
          </tr>
          <tr>
            <td><label for="tempat_lahir">Tempat Lahir</label></td>
            <td>:</td>
            <td><input type="text-form" name="tempat_lahir" id="tempat_lahir" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
            <td>:</td>
            <td style="padding-bottom: 13px;"><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="almt_pelamar">Alamat</label></td>
            <td>:</td>
            <td><textarea name='almt_pelamar' id='almt_pelamar' cols='25' rows='3' class="form-control"></textarea></td>
          </tr>
          <tr>
            <td><label for="no_ktp">No KTP</label></td>
            <td>:</td>
            <td><input type="text-form" name="no_ktp" id="no_ktp" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="status">Status</label></td>
            <td>:</td>
            <td><input type="radio" name="status" value="Menikah">  Menikah
                &nbsp; &nbsp;<input type="radio" name="status" value="Lajang">  Lajang</td>
          </tr>
          <tr>
            <td><label for="nohp_pelamar">No HP</label></td>
            <td>:</td>
            <td><input type="text-form" name="nohp_pelamar" id="nohp_pelamar" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="pendidikan_akhir">Pendidikan Terakhir</label></td>
            <td>:</td>
            <td>
              <select name="pendidikan_akhir" id="pendidikan_akhir" class="form-control">
              <option value="">--Pendidikan Akhir--</option>
              <option value="SMA">SMA</option>
              <option value="D3">D3</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              </select>
            </td>
          </tr>
        </table>
              </table>
          </div>
          <div class="modal-footer" style="margin-right: 280px;">
              <button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
              <button type='reset' class="btn btn-warning fas fa-undo" name='btnbatal' value='BATAL' onclick="javascript:Batal();"> Cancel</button>
            </div>
          </form>
    </div>
  </div>


 