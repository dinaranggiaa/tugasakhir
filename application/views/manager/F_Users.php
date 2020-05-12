<!--SIDE BAR-->
<?php $this->view('partials/sidebar_manager')?>

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
  <h3><i class='far fa-folder-open'></i>&nbsp;Data Users</h3> 
  <div class="border"></div>
  
  <br>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button>
  
  <div class="inputsearch">
    <?php echo form_open('C_Users/cari_keyword')?>
    <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
    <button class="button button1" type='submit' name='btncari'><i class='fas fa-search'></i></button>
    <button class="btn-link" type='submit' href="<?php echo site_url('C_Users/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>
  <br>
  <br>
  
  <!-- Data Users -->
  <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode User</th>
                            <th>Nama User</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=1?>
                      <?php foreach ($users as $Users):?>
                      <tr>
                        <td><?= $no?></td>
                        <td><?= $Users -> id_user?></td>
                        <td><?= $Users -> nm_user?></td>
                        <td><?= $Users -> level?></td>
                        <td style="width: 15%;">
                          <a class="btn btn-info btn_edit" id="<?= $Users -> id_user;?>" data-toggle = "modal" data-target = "#ModalView<?php echo $Users -> id_user; ?>"><span class="fas fa-eye"></span></a>
                          <a class="btn btn-primary btn_edit" id="<?= $Users -> id_user;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $Users -> id_user; ?>"><span class="fas fa-edit"></span></a>
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_Users/hapus_users/'.$Users -> id_user)?>"><span class="fas fa-trash-alt"></span></a>
                        </td>
                      </tr>
                      <?php $no++?>
                      <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Modal Entri Data Users -->
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalAdd" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Users</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Users/simpan_users" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_user">Kode User</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_user" id="id_user" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_user">Nama Lengkap</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="nm_user" id="nm_user" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><label for="level">Level</label></td>
                      <td>:</td>
                      <td><select type="text-form" name="level" id="level" class="form-control">
                            <option value="Manager">Manager</option>
                            <option value="Admin">Admin</option>
                          </select>
                      </td>
                    </tr>
                    <tr>
                      <td><label for="username">Username</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="username" id="username" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><label for="password">Password</label></td>
                      <td>:</td>
                      <td><input type="password" name="password" id="password" class="form-control"></td>
                    </tr>
                  </table>
              </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
                  <button type='reset' class="btn btn-warning fas fa-undo" name='btnbatal' value='BATAL' onclick="javascript:Batal();"> Cancel</button>
                </div>
              </form>
          </div>
        </div>
    </div>
</div>


<!-- Modal View Data Users -->
<?php foreach ($users as $Users) : ?>

  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalView<?= $Users -> id_user?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelView">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Users</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Users/simpan_users" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_user">Kode User</label></td>
                      <td>:</td>
                      <td><?= $Users -> id_user?></td>
                    </tr>
                    <tr>
                      <td><label for="nm_user">Nama Lengkap</label></td>
                      <td>:</td>
                      <td><?= $Users -> nm_user?></td>
                    </tr>
                    <tr>
                      <td><label for="username">Username</label></td>
                      <td>:</td>
                      <td><?= $Users -> username?></td>
                    </tr>
                    <tr>
                      <td><label for="level">Level</label></td>
                      <td>:</td>
                      <td><?= $Users -> level?></td>
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


<!-- Modal Edit Data Users -->
<?php foreach ($users as $Users) : ?>
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalEdit<?= $Users -> id_user?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelEdit">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Edit Data Users</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url()?>index.php/C_Users/ubah_users" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_user">Kode Users</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_user" id="id_user" value="<?= $Users -> id_user?>" placeholder="<?= $Users -> id_user?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_user">Nama Lengkap</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="nm_user" id="nm_user" value="<?= $Users -> nm_user?>" placeholder="<?= $Users -> nm_user?>" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><label for="username">Username</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="username" id="username" value="<?= $Users -> username?>" placeholder="<?= $Users -> username?>" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><label for="level">Level</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="level" id="level" value="<?= $Users -> level?>" placeholder="<?= $Users -> level?>" class="form-control"></td>
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