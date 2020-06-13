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

  table th {
    font-size: 16px;
    text-align: center;
    color: #243f4d;
  } 

  .header-bar{
    width: 100%;    
  }

</style>

<div class="center-bar">
  <div class = "header-bar"> 
    <div class="judul" style="width:300px; position:absolute"><h3><i class='far fa-folder-open'></i>&nbsp;Data Penilaian</h3></div>
    <div class="judul" style="float:right; margin-top: 15px;"><a class="btn btn-success" href="<?php echo site_url('C_Laporan/cetak_form_penilaian') ?>"><span class="fas fa-file-download">&nbsp; Form Penilaian</span></a></div>
  </div> 
  <br>
  <br>
  <br>
  <div class="border"></div>
  
  <br>
  <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button> -->
  
    <?php echo form_open('C_PenilaianPelamar/entri_penilaian')?>
    <button class="btn btn-default" type='submit' href="<?php echo site_url('C_PenilaianPelamar/entri_penilaian')?>"><i class='fas fa-plus'></i> &nbsp;Add Data</button>
    <?php echo form_close()?>

  <div class="inputsearch" style="float: right; margin-top:12px;">
    <?php echo form_open('C_PenilaianPelamar/index')?>
      <button class="btn-link" type='submit' href="<?php echo site_url('C_Karyawan/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>

  <div class="inputsearch">
    <?php echo form_open('C_PenilaianPelamar/cari_keyword')?>
      <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
      <button class="button button1" type='submit' name='btncari'><i class='fas fa-search'></i></button>
    <?php echo form_close()?>
  </div>

  <br>
  <br>
  
  <!-- Data Penilaian -->
  <div class="panel-body">
            <div class="table-responsive">
            <table class= "table table-striped table-bordered table-hover" style="text-align: center; font-size:15px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>No Handphone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left">
                      <?php $no=1?>
                      <?php foreach ($n_pelamar as $Pelamar):?>
                      <tr>
                        <td><?= $no?></td>
                        <td><?= $Pelamar -> id_pelamar?></td>
                        <td><?= $Pelamar -> nm_pelamar?></td>
                        <td><?= $Pelamar -> almt_pelamar?></td>
                        <td><?= $Pelamar -> nohp_pelamar?></td>
                        <td style="width: 15%; text-align:center">
                        <!-- <a class="btn btn-info btn_edit" name = "<?= $Pelamar -> id_pelamar;?>" id="<?= $Pelamar -> id_pelamar;?>" data-toggle = "modal" data-target = "#ModalAdd<?php echo $Pelamar -> id_pelamar; ?>"><span class="fas fa-plus"></span></a> -->
                          <a class="btn btn-info btn_edit" href="<?php echo site_url('C_PenilaianPelamar/view_nilai_pelamar/'.$Pelamar->id_pelamar) ?>"><span class="fas fa-eye"></span></a>
                          <a class="btn btn-primary btn_edit" href="<?php echo site_url('C_PenilaianPelamar/edit_nilai_pelamar/'.$Pelamar->id_pelamar) ?>"><span class="fas fa-edit"></span></a>
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_PenilaianPelamar/hapus_npelamar/'.$Pelamar -> id_pelamar)?>"><span class="fas fa-trash-alt"></span></a>
                        </td>
                      </tr>
                      <?php $no++?>
                      <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
