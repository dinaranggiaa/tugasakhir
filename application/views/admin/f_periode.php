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
  <h3><i class='far fa-folder-open'></i>&nbsp;Data Periode</h3> 
  <div class="border"></div>
  
  <br>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button>
  
  <div class="inputsearch">
    <?php echo form_open('C_Periode/cari_keyword')?>
    <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
    <button class="button button1" type='submit' name='btncari'><i class='fas fa-search'></i></button>
    <button class="btn-link" type='submit' href="<?php echo site_url('C_Periode/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>
  <br>
  <br>
  
  <!-- Data Periode -->
  <div class="panel-body">
            <div class="table-responsive">
            <table class= "table table-striped table-bordered table-hover" style="text-align: center; font-size:15px; width:100%; margin:auto">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Periode</th>
                            <th style="width: 20%">Bulan</th>
                            <th>Tanggal Pembukaan</th>
                            <th style="width: 30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=1?>
                      <?php foreach ($periode as $Periode):?>
                      <tr>
                        <td><?= $no?></td>
                        <td><?= $Periode -> id_periode?></td>
                        <td><?= $Periode -> bulan?></td>
                        <td><?= $Periode -> tgl_pembukaan?></td>
                        <td style="width: 15%;">
                          <a class="btn btn-info btn_edit" id="<?= $Periode -> id_periode;?>" data-toggle = "modal" data-target = "#ModalView<?php echo $Periode -> id_periode; ?>"><span class="fas fa-eye"></span></a>
                          <a class="btn btn-primary btn_edit" id="<?= $Periode -> id_periode;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $Periode -> id_periode; ?>"><span class="fas fa-edit"></span></a>
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_Periode/hapus_periode/'.$Periode -> id_periode)?>"><span class="fas fa-trash-alt"></span></a>
                        </td>
                      </tr>
                      <?php $no++?>
                      <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Modal Entri Data Periode -->
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalAdd" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Periode</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Periode/simpan_periode" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_periode">Kode Periode</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_periode" id="id_periode" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="bulan">Bulan</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="bulan" id="bulan" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><label for="tgl_pembukaan">Tanggal Pembukaan</label></td>
                      <td>:</td>
                      <td><input type="date" name="tgl_pembukaan" id="tgl_pembukaan" class="form-control"></td>
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


<!-- Modal View Data Periode -->
<?php foreach ($periode as $Periode) : ?>

  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalView<?= $Periode -> id_periode?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelView">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Periode</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Periode/simpan_periode" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_periode">Kode Periode</label></td>
                      <td>:</td>
                      <td><?= $Periode -> id_periode?></td>
                    </tr>
                    <tr>
                      <td><label for="bulan">Bulan</label></td>
                      <td>:</td>
                      <td><?= $Periode -> bulan?></td>
                    </tr>
                    <tr>
                      <td><label for="tgl_pembukaan">Tanggal Pembukaan</label></td>
                      <td>:</td>
                      <td><?= $Periode -> tgl_pembukaan?></td>
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


<!-- Modal Edit Data Periode -->
<?php foreach ($periode as $Periode) : ?>
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalEdit<?= $Periode -> id_periode?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelEdit">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Periode</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url()?>index.php/C_Periode/ubah_periode" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_periode">Kode Periode</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="id_periode" id="id_periode" value="<?= $Periode -> id_periode?>" placeholder="<?= $Periode -> id_periode?>"></td>
                    </tr>
                    <tr>
                      <td><label for="bulan">Bulan</label></td>
                      <td>:</td>
                      <td><input type="text-form" name="bulan" id="bulan" value="<?= $Periode -> bulan?>" placeholder="<?= $Periode -> bulan?>" class="form-control"></td>
                    </tr>
                    <tr>
                      <td><label for="tgl_pembukaan">Tanggal Pembukaan</label></td>
                      <td>:</td>
                      <td><input type="date" name="tgl_pembukaan" id="tgl_pembukaan" value="<?= $Periode -> tgl_pembukaan?>" placeholder="<?= $Periode -> tgl_pembukaan?>" class="form-control"></td>
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