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

  table {
    margin: auto;
  }

  table td {
    font-size: 16px;
    text-align: center;
    color: #243f4d;
  }

  select.form-control{
  width: 220px;
  margin-top: 25px;
} 

.home-judul{
  width: 500px;
  margin:auto;
  text-align: center;
  border: 1px solid black;
}

.btn btn-primary{
  float: left;
}
  
</style>
<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Laporan Hasil Keputusan</h3> 
  <div class="border"></div>
  <div class="home-periode">
    <div class="home-judul"><span>Periode Pendaftaran</span></div>
        <?php echo form_open('C_Laporan/Cetak_KeputusanPelamar')?>
          <table>
            <tr>
              <td style="padding-right: 15px;">
                <select name='bulan' id='bulan' required class="form-control">
                    <option value='' disabled selected>Pilih Bulan</option>
                  <?php foreach ($periode as $Periode) {  ?>
                    <option name='bulan' value="<?=$Periode->bulan?>"><?= $Periode->bulan?> </option>;
                <?php }?>
              </select>
              </td>
              <td>
                <select name='tahun' id='tahun' required class="form-control">
                    <option value='' disabled selected>Pilih Tahun</option>
                  <?php foreach ($tahun as $Periode) {  ?>
                    <option name='bulan' value="<?=$Periode->tahun?>"><?= $Periode->tahun?> </option>;
                <?php }?>
              </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td style="float:right; padding-bottom: 10px; padding-top: 10px;"> 
                <button type='submit' class="btn btn-primary" id='Tampilkan'><span>View</span></button>
              </td>
            </tr>
          </table>
        <?php echo form_close()?>
  </div>
</div>

