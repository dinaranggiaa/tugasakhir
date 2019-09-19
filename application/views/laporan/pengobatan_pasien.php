<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
  span {
    font-size: 20px;
  }
  .form-control {
    width: 200px;
  }
  .home {
    width: 50%;
    position: relative;
    left: 200px;
    top: 200px;
  }
  .container-fluid {
    height: 690px;
  }
  .button {
    margin-right: 250px
  }
</style>

 <div class="home">
    <div class="home-judul text-center">LAPORAN PENGOBATAN PASIEN TUBERCULOSIS</div>
    <div class="home-isi text-center">
    	<?php echo form_open('Laporan/laporanpengobatan')?>
      <br>
      <span>Mulai</span>
	    <input type="text" class="input-tanggal form-control" name="tglawal" id="tglawal"> &nbsp; &nbsp; &nbsp; &nbsp;
      <span>Hingga</span>
	    <input type="text" class="input-tanggal form-control" name="tglakhir" id="tglakhir"><br><br>
	    <input type='submit' class="button button4" name='btn tampilkan' id='Tampilkan' value="EXPORT EXCEL">
    <?php echo form_close()?>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.input-tanggal').datepicker({
          dateFormat: 'yy-mm-dd'
        });
      });
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jqueryui/jquery-ui.css');?>">
    <script type="text/javascript" src="<?php echo base_url().'js/jquery-3.4.1.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/jqueryui/jquery-ui.js'?>"></script>

</div>
</div>
</body>

</html>
