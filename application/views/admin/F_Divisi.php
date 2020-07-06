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
</style>

<div class="navigation" style="border: black;">
    <ul class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li>Data Divisi</li>
      </ul>
</div>

<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Data Divisi</h3> 
  <div class="border"></div>
  
  <br>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button>
  
  <div class="inputsearch">
    <?php echo form_open('C_Divisi/cari_keyword')?>
      <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
      <button class="button button1" type='submit' name='btncari'><i class='fas fa-search'></i></button>
      <button class="btn-link" type='submit' href="<?php echo site_url('C_Divisi/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>
  <br>
  <br>
  
  <!-- Data Divisi -->
  <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Divisi</th>
                            <th>Nama Divisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=1?>
                      <?php foreach ($divisi as $row):?>
                      <tr>
                        <td><?= $no?></td>
                        <td><?= $row -> id_divisi?></td>
                        <td><?= $row -> nm_divisi?></td>
                        <td style="width: 15%;">
                          <a class="btn btn-info btn_edit" id="<?=  $row -> id_divisi;?>" data-toggle = "modal" data-target = "#ModalView<?php echo  $row -> id_divisi; ?>"><span class="fas fa-eye"></span></a>
                          <a class="btn btn-primary btn_edit" id="<?=  $row -> id_divisi;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo  $row -> id_divisi; ?>"><span class="fas fa-edit"></span></a>
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_Divisi/hapus_divisi/'.$row -> id_divisi)?>"><span class="fas fa-trash-alt"></span></a>
                        </td>
                      </tr>
                      <?php $no++?>
                      <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Modal Entri Data Divisi -->
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalAdd" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Divisi</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Divisi/simpan_divisi" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_divisi">Kode Divisi</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_divisi" id="id_divisi" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_divisi">Nama Divisi</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="nm_divisi" id="nm_divisi" class="form-control"></td>
                    </tr>
                  </table>
              </div>
              <div class="modal-footer">
                 <button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
                 <button type='reset' class="btn btn-warning fas fa-undo" name='btnbatal' value='BATAL' onclick="javascript:HapusText();"> Cancel</button>
              </div>
              </form>
          </div>
        </div>
    </div>
</div>


<!-- Modal View Data Divisi -->
<?php foreach ($divisi as $row) : ?>

  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalView<?= $row -> id_divisi?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelView">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Divisi</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Divisi/simpan_divisi" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_divisi">Kode Divisi</label></td>
                      <td>:</td>
                      <td><?= $row -> id_divisi?></td>
                    </tr>
                    <tr>
                      <td><label for="nm_divisi">Nama Divisi</label></td>
                      <td>:</td>
                      <td><?= $row -> nm_divisi?></td>
                    </tr> 
                  </table>
              </div>
              </form>
          </div>
        </div>
    </div>
  </form>
</div>
<?php endforeach?>


<!-- Modal Edit Data Divisi -->
<?php foreach ($divisi as $row) : ?>
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalEdit<?= $row -> id_divisi?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelEdit">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Divisi</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url()?>index.php/C_Divisi/ubah_divisi" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_Divisi">Kode Divisi</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_Divisi" id="id_Divisi" value="<?= $row -> id_divisi?>" placeholder="<?= $row -> id_divisi?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_divisi">Nama Divisi</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="nm_divisi" id="nm_divisi" value="<?= $row -> nm_divisi?>" placeholder="<?= $row -> nm_divisi?>" class="form-control"></td>
                    </tr>
                    <!-- <tr>
                      <td><label for="bobot_Divisi">Bobot Divisi</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="bobot_Divisi" id="bobot_Divisi" value="<?= $Divisi -> bobot_Divisi?>" placeholder="<?= $Divisi -> bobot_Divisi?>" class="form-control"></td>
                    </tr> -->
                  </table>
              </div>
              <div class="modal-footer">
                 <button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
                 <button type='reset' class="btn btn-warning fas fa-undo" name='btnbatal' value='BATAL' onclick="javascript:HapusText();"> Cancel</button>
              </div>
              </form>
          </div>
        </div>
    </div>
</div>
<?php endforeach?>
