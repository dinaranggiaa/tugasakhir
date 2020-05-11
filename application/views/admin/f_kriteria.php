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
</style>

<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Data Kriteria</h3> 
  <div class="border"></div>
  
  <br>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button>
  
  <div class="inputsearch">
    <?php echo form_open('C_Kriteria/cari_keyword')?>
    <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
    <button class="button button1" type='submit' name='btncari'><i class='fas fa-search'></i></button>
    <button class="btn-link" type='submit' href="<?php echo site_url('C_Kriteria/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>
  <br>
  <br>
  
  <!-- Data Kriteria -->
  <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot Kriteria</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=1?>
                      <?php foreach ($kriteria as $Kriteria):?>
                      <tr>
                        <td><?= $no?></td>
                        <td><?= $Kriteria -> id_kriteria?></td>
                        <td><?= $Kriteria -> nm_kriteria?></td>
                        <td><?= $Kriteria -> bobot_kriteria?></td>
                        <td style="width: 15%;">
                          <a class="btn btn-info btn_edit" id="<?= $Kriteria -> id_kriteria;?>" data-toggle = "modal" data-target = "#ModalView<?php echo $Kriteria -> id_kriteria; ?>"><span class="fas fa-eye"></span></a>
                          <a class="btn btn-primary btn_edit" id="<?= $Kriteria -> id_kriteria;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $Kriteria -> id_kriteria; ?>"><span class="fas fa-edit"></span></a>
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_Kriteria/hapus_kriteria/'.$Kriteria -> id_kriteria)?>"><span class="fas fa-trash-alt"></span></a>
                        </td>
                      </tr>
                      <?php $no++?>
                      <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Modal Entri Data Kriteria -->
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalAdd" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Kriteria</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Kriteria/simpan_kriteria" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_kriteria">Kode Kriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_kriteria" id="id_kriteria" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="nm_kriteria" id="nm_kriteria" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><label for="bobot_kriteria">Bobot Kriteria</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="bobot_kriteria" id="bobot_kriteria" class="form-control"></td>
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


<!-- Modal View Data Kriteria -->
<?php foreach ($kriteria as $Kriteria) : ?>

  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalView<?= $Kriteria -> id_kriteria?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelView">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Kriteria</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Kriteria/simpan_kriteria" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_kriteria">Kode Kriteria</label></td>
                      <td>:</td>
                      <td><?= $Kriteria -> id_kriteria?></td>
                    </tr>
                    <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><?= $Kriteria -> nm_kriteria?></td>
                    </tr>
                    <tr>
                      <td><label for="bobot_kriteria">Bobot Kriteria</label></td>
                      <td>:</td>
                      <td><?= $Kriteria -> bobot_kriteria?></td>
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


<!-- Modal Edit Data Kriteria -->
<?php foreach ($kriteria as $Kriteria) : ?>
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalEdit<?= $Kriteria -> id_kriteria?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelEdit">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Kriteria</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url()?>index.php/C_Kriteria/ubah_kriteria" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_kriteria">Kode Kriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_kriteria" id="id_kriteria" value="<?= $Kriteria -> id_kriteria?>" placeholder="<?= $Kriteria -> id_kriteria?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="nm_kriteria" id="nm_kriteria" value="<?= $Kriteria -> nm_kriteria?>" placeholder="<?= $Kriteria -> nm_kriteria?>" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><label for="bobot_kriteria">Bobot Kriteria</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="bobot_kriteria" id="bobot_kriteria" value="<?= $Kriteria -> bobot_kriteria?>" placeholder="<?= $Kriteria -> bobot_kriteria?>" class="form-control"></td>
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
<?php endforeach?>