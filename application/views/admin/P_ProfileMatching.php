
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

  table th {
    font-size: 16px;
    text-align: center;
    color: #243f4d;
  } 
  
</style>
<div class="center-bar">
<h3><i class='far fa-folder-open'></i>&nbsp;Data Pelamar</h3> 
  <div class="border"></div>
<div class="home-judul text-center">Rekomendasi Pelamar</div>
    <div class="home-isi text-center">
    	<?php echo form_open('C_ProsesPM/proses_alternatif')?>
      <br>
      <span>Periode</span>
        <?php
                echo "
                <select name='bulan' id='bulan' required>
                <option value='' disabled selected>Pilih Bulan</option>";
                  foreach ($periode as $Periode) {  
                  echo "<option name='bulan' value='".$Periode->bulan."'>".$Periode->bulan."</option>";
                  }
                  echo"
                </select>";
                ?> 
        <?php
                echo "
                <select name='tahun' id='tahun' required>
                <option value='' disabled selected>Pilih Tahun</option>";
                  foreach ($tahun as $Periode) {  
                  echo "<option name='tahun' value='".$Periode->tahun."'>".$Periode->tahun."</option>";
                  }
                  echo"
                </select>";
                ?> 
       <a target="_blank"><input type='submit' class="button button4" name='btn tampilkan' id='Tampilkan' value="VIEW"></a>
      
    <?php echo form_close()?>
</div>

