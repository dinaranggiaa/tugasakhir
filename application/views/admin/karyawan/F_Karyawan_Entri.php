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

  p{
    margin-top: 15px; 
    margin-bottom:15px; 
    margin-left: 45px; 
    font-weight:bold; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color: black;
    font-size: 15px;
  }
  


.form-control{
  width: 350px;
  margin-top: 10px;
  margin-bottom: 10px;

}

.form-pendataan{
  padding-left: 200px;
  padding-top: 25px;
}

</style>

  <div class="center-bar">
    <h3><i class='far fa-folder-open'></i>&nbsp;Entri Data Karyawan</h3> 
    <div class="border"></div>

    <div class="center-pencarian" style="padding-top:30px;">
        <?php echo form_open('C_Karyawan/cari_data')?>
          <input class="form-control" type="text-form" name="keyword" id="" placeholder="Masukkan Kode Pelamar / Nama Pelamar">
          <button class="button button1" type='submit'><i class='fas fa-search'></i></button>
        <?php echo form_close()?>
    </div>
    
    <div class="form-pendataan" style="padding-bottom: 25px;">
      
    <form>
              <table style="width: 90%">
              <tr>
                <td><label for="id_karyawan">Kode Karyawan</label></td>
                <td>:</td>
                <td><input readonly type="text-form" class ="form-control" name="id_karyawan" id="id_karyawan" value="<?= $kode?>"></td>
              </tr>
              <tr>
                <td style="width: 25%"><label for="id_pelamar">Kode Pelamar</label></td>
                <td style="width: 5%">:</td>
                <td><input type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar"></td>
              </tr>
              <tr>
                <td><input type="hidden" class ="form-control" name="id_periode" id="id_periode"></td>
              </tr>
              <tr>
                <td><label for="nm_pelamar">Nama Lengkap</label></td>
                <td>:</td>
                <td><input type="text-form" name="nm_pelamar" id="nm_pelamar" class="form-control"></td>
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
              <td><label for="nohp_pelamar">No Handphone</label></td>
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
            
            <tr>
              <td><label for="tgl_daftar">Tanggal Masuk Kerja</label></td>
              <td>:</td>
              <td><input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control"></td>
            </tr>
            <tr>
            <tr>
              <td><label for="nohp_pelamar">Nama Orang Tua</label></td>
              <td>:</td>
              <td><input type="text-form" name="nohp_pelamar" id="nohp_pelamar" class="form-control"></td>
            </tr>
            <tr>
              <td><label for="nohp_pelamar">Alamat Orang Tua</label></td>
              <td>:</td>
              <td><input type="text-form" name="nohp_pelamar" id="nohp_pelamar" class="form-control"></td>
            </tr>
            </table>
            
            <table style="width: 90%">
            <p>
              Nama orang yang harus dihubungi bila terjadi keadaan darurat : 
            </p>
            <tr>
                <td style="width: 25%"><label for="nm_hub">Nama Lengkap</label></td>
                <td style="width: 5%">:</td>
                <td><input type="text-form" name="nm_hub" id="nm_hub" class="form-control"></td>
              </tr>
              <tr>
                <td><label for="stat_hub">Status Hubungan</label></td>
                <td>:</td>
                <td><input type="text-form" name="stat_hub" id="stat_hub" class="form-control"></td>
              </tr>
              <tr>
                <td><label for="almt_hub">Alamat</label></td>
                <td>:</td>
                <td><textarea name='almt_hub' id='almt_hub' cols='25' rows='3' class="form-control"></textarea></td>
            </tr>
            <tr>
                <td><label for="nohp_hub">No Handphone</label></td>
                <td>:</td>
                <td><input type="text-form" name="nohp_hub" id="nohp_hub" class="form-control"></td>
              </tr>
        </table>
              
          </div>
          <div class="modal-footer" style="margin-right: 280px;">
              <button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
              <button type='reset' class="btn btn-warning fas fa-undo" name='btnbatal' value='BATAL' onclick="javascript:Batal();"> Cancel</button>
            </div>
          </form>
    </div>
  </div>


 