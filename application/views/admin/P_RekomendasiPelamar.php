
<?php $this->view('partials/sidebar_admin')?>
<style>
  h3 {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #041a11;
    text-align: center;
  }
</style>
<div class="home">
    <div class="home-judul text-center">Rekomendasi Pelamar</div>
    <div class="home-isi text-center">
    	<?php echo form_open('C_Laporan/Cetak_RekomendasiPelamar')?>
      <br>
      <span>Periode</span>
        <?php
                echo "
                <select name='id_periode' id='id_periode' required>
                <option value='' disabled selected>Pilih Periode</option>";
                  foreach ($periode as $Periode) {  
                  echo "<option name='id_periode' value='".$Periode->id_periode."'>".$Periode->bulan."</option>";
                  }
                  echo"
                </select>";
                ?> 
       <a target="_blank"><input type='submit' class="button button4" name='btn tampilkan' id='Tampilkan' value="VIEW"></a>
      
    <?php echo form_close()?>
</div>
