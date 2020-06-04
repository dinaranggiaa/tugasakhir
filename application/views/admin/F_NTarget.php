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

<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Entri Sub Kriteria</h3> 
  <div class="border"></div>
  
  <br>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button>

  <div class="inputsearch" style="float: right; margin-top:12px;">
    <?php echo form_open('C_NTarget/index')?>
      <button class="btn-link" type='submit' href="<?php echo site_url('C_Karyawan/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>

  <div class="inputsearch">
    <?php echo form_open('C_NTarget/cari_keyword')?>
      <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
      <button class="button button1" type='submit' name='btncari'><i class='fas fa-search'></i></button>
    <?php echo form_close()?>
  </div>

  <br>
  <br>
  
  <!-- Data Kriteria -->
  <div class="panel-body">
            <div class="table-responsive">
            <table class= "table table-striped table-bordered table-hover" style="text-align: center; font-size:15px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Subkriteria</th>
                            <th>Nama Subkriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Nilai Target</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  $no = $this->uri->segment(3) + 1; ?>
                      <?php foreach ($ntarget as $row):?>
                      <tr>
                        <td><?= $no?></td>
                        <td><?= $row -> id_subkriteria?></td>
                        <td><?= $row -> nm_subkriteria?></td>
                        <td><?= $row -> nm_kriteria?></td>
                        <td><?= $row -> nilai_target?></td>
                        <td><?= $row -> status_subkriteria?></td>
                        <td style="width: 15%;">
                          <a class="btn btn-info btn_edit" id="<?= $row -> id_subkriteria;?>" data-toggle = "modal" data-target = "#ModalView<?php echo $row -> id_subkriteria; ?>"><span class="fas fa-eye"></span></a>
                          <a class="btn btn-primary btn_edit" id="<?= $row -> id_subkriteria;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $row -> id_subkriteria; ?>"><span class="fas fa-edit"></span></a>
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_NTarget/hapus_subkriteria/'.$row -> id_subkriteria)?>"><span class="fas fa-trash-alt"></span></a>
                        </td>
                      </tr>
                      <?php $no++?>
                      <?php endforeach?>
                    </tbody>
                </table>
                <?php echo $pagination;?>
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
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Subkriteria Krtieria</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_NTarget/input_data" method="POST">
                  <table>
                  <tr>
                    <td><label for="id_subkriteria">Kode Subkriteria</label></td>
                    <td>:</td>
                    <td><input readonly type="text-form" class ="form-control" name="id_subkriteria" id="id_subkriteria" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
                  </tr>
                    <tr>
                      <td><label for="id_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td>
                      <?php
                          echo "
                          <select name='id_kriteria' id='id_kriteria' required>
                          <option value='' disabled selected> -- pilih kriteria -- </option>";
                            foreach ($kriteria as $Kriteria) {  
                            echo "<option value='".$Kriteria->id_kriteria."'>".$Kriteria->nm_kriteria."</option>";
                            }
                            echo"
                          </select>";
                          ?>    
                      </td>     
                    </tr>
                    <tr>
                      <td><label for="nm_subkriteria">Nama Subkriteria</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="nm_subkriteria" id="nm_subkriteria" class="form-control"></td>    
                    </tr>
                    <tr>
                      <td><label for="nilai_target">Nilai Target</label></td>
                      <td>:</td>
                      <td>
                        <select name="nilai_target">
                        <option checked > -- pilih target --</option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                      </td>
                    </tr>
                    <tr>
                      <td><label for="status_subkriteria">Status Kriteria</label></td>
                      <td>:</td>
                      <td>
                        <select name="status_subkriteria">
                        <option checked >-- pilih status --</option>
                        <option value="CF">Core Factor</option>
                        <option value="SF">Secondary Factor</option>
                      </td>
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
<?php foreach ($ntarget as $row) : ?>

  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalView<?= $row -> id_subkriteria?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelView">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Subkriteria</h4>
              </div>
              <div class="modal-body">
              <form>
                  <table>
                  <tr>
                      <td><label for="id_subkriteria">Kode Subkriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> id_subkriteria?></td>
                    </tr>
                  <tr>
                      <td><label for="nm_subkriteria">Nama Subkriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> nm_subkriteria?></td>
                    </tr>
                  <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> nm_kriteria?></td>
                    </tr>     
                    <tr>
                      <td><label for="nilai_target">Nilai Target</label></td>
                      <td>:</td>
                      <td><?= $row -> nilai_target?></td>
                    </tr>
                    <tr>
                      <td><label for="status_subkriteria">Status Subkriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> status_subkriteria?></td>
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
<?php foreach ($ntarget as $row) : ?>
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalEdit<?= $row -> id_subkriteria?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelEdit">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Edit Subkriteria</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url()?>index.php/C_NTarget/ubah_subkriteria" method="POST">
                  <table>
                  <tr>
                      <td><label for="id_subkriteria">Kode Subkriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_subkriteria" id="nm_subkriteria" value="<?= $row -> id_subkriteria?>" placeholder="<?= $row -> id_subkriteria?>">
                    </tr>
                    <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="nm_kriteria" id="nm_kriteria" value="<?= $row -> nm_kriteria?>" placeholder="<?= $row -> nm_kriteria?>">   
                    </tr>
                    <tr>
                      <td><label for="nm_subkriteria">Nama Subkriteria</label></td>
                      <td>:</td>
                      <td><input type="text-form" class ="form-control" name="nm_subkriteria" id="nm_subkriteria" value="<?= $row -> nm_subkriteria?>" placeholder="<?= $row -> nm_subkriteria?>">
                    </tr>                  
                    <tr>
                      <td><label for="nilai_target">Nilai Target</label></td>
                      <td>:</td>
                      <td>
                        <select name="nilai_target">
                        <option checked >--</option>
                        <option value="5" <?php if ($row -> nilai_target == '5') echo 'selected = "selected"'?>>5</option>
                        <option value="4" <?php if ($row -> nilai_target == '4') echo 'selected = "selected"'?>>4</option>
                        <option value="3" <?php if ($row -> nilai_target == '3') echo 'selected = "selected"'?>>3</option>
                        <option value="2" <?php if ($row -> nilai_target == '2') echo 'selected = "selected"'?>>2</option>
                        <option value="1" <?php if ($row -> nilai_target == '1') echo 'selected = "selected"'?>>1</option>
                      </td>
                    </tr>
                    <tr>
                      <td><label for="status_subkriteria">Status Kriteria</label></td>
                      <td>:</td>
                      <td>
                        <select name="status_subkriteria">
                        <option checked >--</option>
                        <option value="CF" <?php if ($row -> status_subkriteria == 'CF') echo 'selected = "selected"'?>>Core Factor</option>
                        <option value="SF" <?php if ($row -> status_subkriteria == 'SF') echo 'selected = "selected"'?>>Secondary Factor</option>
                      </td>
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