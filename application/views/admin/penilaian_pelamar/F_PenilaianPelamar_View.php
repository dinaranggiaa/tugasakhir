<!--SIDE BAR-->
<?php $this->view('partials/sidebar_admin')?>

<style>

  table, td, th {
    text-align: center;
    border: 1px solid #ccc;
    margin-top: 90px;;
    
  }

  .table {
    border-collapse: collapse;
    /* padding-left: 10px; */
    text-align: center;
    width: 45%;
    margin: auto;
  }

  td{
    font-size: 15px;
    text-align: left;  
  }

  .form-pendataan{
    margin-top: 30px;
    padding: 0%;
  }

</style>

<div class="navigation" style="border: black;">
    <ul class="breadcrumb">
	    	<li><?php echo "<a href='".base_url()."Dashboard/dashboard_admin'><i class='fas fa-fas fa-desktop'> &nbsp; </i>Dashboard</a>"; ?></li>
        <li><?php echo "<a href='".base_url()."C_PenilaianPelamar/index'><i class='far fa-list-alt'> &nbsp; </i>Data Penilaian Pelamar</a>"; ?></li>
        <li>Hasil Penilaian Pelamar</li>
      </ul>
</div>

  <div class="center-bar">
    <h3><i class='far fa-folder-open'></i>&nbsp;Penilaian Pelamar</h3> 
    <div class="border"></div>

    <!-- <div class="center-pencarian" style="padding-top:30px;">
        <?php echo form_open('C_PenilaianPelamar/cari_data')?>
          <input class="form-control" type="text-form" name="keyword" id="" placeholder="Masukkan Kode Pelamar / Nama Pelamar">
          <button class="button button1" type='submit'><i class='fas fa-search'></i></button>
        <?php echo form_close()?>
    </div> -->
    
    <div class="form-pendataan">
      <h3 style="text-align: center;">Hasil Penilaian Pelamar</h3>
      <?php $n = $JmlKriteria['total']; ?>
    <form action="<?php echo base_url()?>index.php/C_PenilaianPelamar/ubah_penilaian" method="POST">
              <table class= "table table-striped table-bordered">
                <?php $no=0; ?>
                  <?php foreach ($npelamar as $row) : ?>
                    <?php if ($no == 0) : ?>
                        <tr>
                          <td><label for="id_pelamar" style="width: 50%;">Kode pelamar</label></td>
                          <!-- <td><input readonly type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?= $row -> id_pelamar?>"></td> -->
                          <td><?= $row -> id_pelamar?></td>
                        </tr>
                        <tr>
                          <td><label for="nm_pelamar">Nama Pelamar</label></td>
                          <td><?= $row -> nm_pelamar?></td>
                          <!-- <td><input readonly type="text-form" name="nm_pelamar" id="nm_pelamar" class="form-control" value="<?= $row -> nm_pelamar?>"></td> -->
                        </tr>
                        <tr>
                          <td><label for="nohp_pelamar">No Handphone</label></td>
                          <td><?= $row -> nohp_pelamar?></td>
                          
                          <!-- <td><input readonly type="text-form" name="nohp_pelamar" id="nohp_pelamar" class="form-control" value="<?= $row -> nohp_pelamar?>"></td> -->
                        </tr>
                            <?php endif ?>
                        <?php $no++;
                          endforeach ?>
                      
                      <?php foreach ($npelamar as $row) : ?>
                          <tr>
                          <td><label for="nm_subkriteria"><?= $row -> nm_subkriteria?></label></td>
                          <input type="hidden" name="id_subkriteria" id="id_subkriteria" class="form-control">
                          <td><?= $row -> nilai_tes?></td>
                          <!-- <td>
                            <input readonly type="text-form" name="nilai_tes" id="nilai_tes" class="form-control" value="<?= $row -> nilai_tes?>"></td> -->
                        </tr>
                      <?php endforeach?>


              </table>
          </div>
          
          </form>
    </div>
  </div>


 