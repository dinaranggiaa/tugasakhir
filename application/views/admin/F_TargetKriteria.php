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
        <li><?php echo "<a href='".base_url()."Dashboard/dashboard_admin'><i class='fas fa-fas fa-desktop'> &nbsp; </i>Dashboard</a>"; ?></li>
        <li>Data Target Kriteria</li>
      </ul>
</div>

<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Entri Target Kriteria</h3> 
  <div class="border"></div>
  
  <br>

  <?php $this->load->view('alert')?>
  
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button>

  <div class="inputsearch" style="float: right; margin-top:12px;">
    <?php echo form_open('C_TargetKriteria/index')?>
      <button class="btn-link" type='submit' href="<?php echo site_url('C_TargetKriteria/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>

  <div class="inputsearch">
    <?php echo form_open('C_TargetKriteria/cari_keyword')?>
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
                            <th>Nama Posisi</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot Kriteria</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  $no = $this->uri->segment(3) + 1; ?>
                      <?php foreach ($ntarget as $row):?>
                      <tr>
                        <td><?= $no?></td>
                        <td><?= $row -> nm_divisi?></td>
                        <td><?= $row -> nm_kriteria?></td>
                        <td><?= $row -> bobot_kriteria?></td>
                        <td style="width: 15%;">
                          <a class="btn btn-info btn_edit" id="<?= $row -> id_kriteria;?>" data-toggle = "modal" data-target = "#ModalView<?php echo $row -> id_kriteria; ?>"><span class="fas fa-eye"></span></a>
                          
                          <!-- <a class="btn btn-primary btn_edit" id="<?= $row -> id_kriteria;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $row -> id_kriteria; ?>"><span class="fas fa-edit"></span></a> -->
                          
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_TargetKriteria/hapus_data/'.$row -> id_kriteria)?>"><span class="fas fa-trash-alt"></span></a>
                          
                          
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
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Target Krtieria</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_TargetKriteria/input_data" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_kriteria">Nama Posisi</label></td>
                      <td>:</td>
                      <td>
                      <?php
                          echo "
                          <select name='id_divisi' id='id_divisi' required>
                          <option value='' disabled selected> -- Pilih Divisi -- </option>";
                            foreach ($posisi as $row) {  
                            echo "<option value='".$row->id_divisi."'>".$row->nm_divisi."</option>";
                            }
                            echo"
                          </select>";
                          ?>    
                      </td>     
                    </tr>
                    <tr>
                      <td><label for="id_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td>
                      <?php
                          echo "
                          <select name='id_kriteria' id='id_kriteria' required>
                          <option value='' disabled selected> -- Pilih Kriteria -- </option>";
                            foreach ($kriteria as $Kriteria) {  
                            echo "<option value='".$Kriteria->id_kriteria."'>".$Kriteria->nm_kriteria."</option>";
                            }
                            echo"
                          </select>";
                          ?>    
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
    <div class="modal fade" id="ModalView<?= $row -> id_kriteria?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelView">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Target Kriteria</h4>
              </div>
              <div class="modal-body">
              <form>
                  <table>
                  <!-- <tr>
                      <td><label for="id_divisi">Kode Posisi</label></td>
                      <td>:</td>
                      <td><?= $row -> id_divisi?></td>
                    </tr> -->
                  <tr>
                      <td><label for="id_divisi">Nama Posisi</label></td>
                      <td>:</td>
                      <td><?= $row -> nm_divisi?></td>
                    </tr>
                    <!-- <tr>
                      <td><label for="id_kriteria">Kode Kriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> id_kriteria?></td>
                    </tr> -->
                    <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> nm_kriteria?></td>
                    </tr>     
                    <tr>
                      <td><label for="nilai_target">Bobot</label></td>
                      <td>:</td>
                      <td><?= $row -> bobot_kriteria?></td>
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
    <div class="modal fade" id="ModalEdit<?= $row -> id_kriteria?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelEdit">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Edit Target Kriteria</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url()?>index.php/C_TargetKriteria/ubah_target_kriteria" method="POST">
                  <table>
                  <tr>
                      <td><label for="nm_divisi">Nama Posisi</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="nm_kriteria" id="nm_kriteria" value="<?= $row -> nm_divisi?>">

                      <input type="hidden" class ="form-control" name="id_divisi" id="id_divisi" value="<?= $row -> id_divisi?>">
                    </tr>
                    <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="nm_kriteria" id="nm_kriteria" value="<?= $row -> nm_kriteria?>" placeholder="<?= $row -> nm_kriteria?>">   
                      
                      <input type="hidden" class ="form-control" name="id_kriteria" id="id_kriteria" value="<?= $row -> id_kriteria?>">
                    </tr>
                    <tr>
                      <td><label for="bobot_kriteria">Bobot Kriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="bobot_kriteria" id="bobot_kriteria" value="<?= $row -> bobot_kriteria?>" placeholder="<?= $row -> bobot_kriteria?>">
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