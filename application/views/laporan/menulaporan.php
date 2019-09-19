<!--SIDE BAR-->

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
    width: 800px;
    height: 150px;
    position: relative;
    left: 180px;
    top: 200px;
  }
  .container-fluid {
    height: 690px;
  }
  .but {
    margin-right: 70px;
  }
  .button {
    width: 200px;
    margin: 10px;
    height: 50px;
    padding-bottom: 10px;
  }

</style>

 <div class="home">
    <div class="home-judul text-center">LAPORAN</div>
    <div class="home-isi text-center">
      <br>
      <div class="but">
        <a class="button button4" href="<?= base_url('Laporan/pengobatanpasien'); ?>"> Laporan Pengobatan Pasien</a> &nbsp;
        <a class="button button4" href="<?= base_url('Laporan/kehadirancheckup'); ?>"> Laporan Kehadiran Checkup</a> &nbsp;
  	    <a class="button button4" href="<?= base_url('Laporan/hasilakhir'); ?>"> Laporan Hasil Akhir Pengobatan</a>
      </div>
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
