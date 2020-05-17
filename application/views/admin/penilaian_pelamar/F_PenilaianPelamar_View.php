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

    <!-- <div class="center-pencarian" style="padding-top:30px;">
        <?php echo form_open('C_PenilaianPelamar/cari_data')?>
          <input class="form-control" type="text-form" name="keyword" id="" placeholder="Masukkan Kode Pelamar / Nama Pelamar">
          <button class="button button1" type='submit'><i class='fas fa-search'></i></button>
        <?php echo form_close()?>
    </div> -->
    
    <div class="form-pendataan" style="padding-bottom: 25px;">
      <?php $n = $JmlKriteria['total']; ?>
    <form action="<?php echo base_url()?>index.php/C_PenilaianPelamar/ubah_penilaian" method="POST">
              <table style="width: 70%;">
                <?php $no=0; ?>
                  <?php foreach ($npelamar as $row) : ?>
                    <?php if ($no == 0) : ?>
              <tr>
                <td style="width: 25%"><label for="id_pelamar">Kode pelamar</label></td>
                <td style="width: 5%">:</td>
                <td><input readonly type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?= $row -> id_pelamar?>"></td>
              </tr>
              <tr>
                <td><label for="nm_pelamar">Nama Pelamar</label></td>
                <td>:</td>
                <td><input readonly type="text-form" name="nm_pelamar" id="nm_pelamar" class="form-control" value="<?= $row -> nm_pelamar?>"></td>
              </tr>
              <tr>
                <td><label for="nohp_pelamar">No Handphone</label></td>
                <td>:</td>
                <td><input readonly type="text-form" name="nohp_pelamar" id="nohp_pelamar" class="form-control" value="<?= $row -> nohp_pelamar?>"></td>
              </tr>
                  <?php endif ?>
              <?php $no++;
                endforeach ?>
             
             <?php foreach ($npelamar as $row) : ?>
                <tr>
                <td><label for="nm_kriteria"><?= $row -> nm_kriteria?></label></td>
                <input type="hidden" name="id_kriteria" id="id_kriteria" class="form-control">
                <td>:</td>
                <td>
                  <input readonly type="text-form" name="nilai_tes" id="nilai_tes" class="form-control" value="<?= $row -> nilai_tes?>"></td>
              </tr>
            <?php endforeach?>


              </table>

          </div>
          
          </form>
    </div>
  </div>


 