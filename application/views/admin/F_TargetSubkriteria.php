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
        <li>Data Target Sub Kriteria</li>
      </ul>
</div>

<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Entri Target Sub Kriteria</h3> 
  <div class="border"></div>
  
  <br>

  <?php $this->load->view('alert')?>
  
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button>

  <div class="inputsearch" style="float: right; margin-top:12px;">
    <?php echo form_open('C_TargetSubkriteria/index')?>
      <button class="btn-link" type='submit' href="<?php echo site_url('C_TargetSubkriteria/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>

  <div class="inputsearch">
    <?php echo form_open('C_TargetSubkriteria/cari_keyword')?>
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
                            <th>Nama Sub Kriteria</th>
                            <th>Nilai Target</th>
                            <th>Status Target</th>
                            <th>Bobot Sub Kriteria</th>
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
                        <td><?= $row -> nm_subkriteria?><input type="hidden" name="id_subkriteria" id="id_subkriteria" value="<?= $row -> id_subkriteria?>"></td>
                        <td><?= $row -> nilai_target?></td>
                        <td><?= $row -> status_subkriteria?></td>
                        <td><?= $row -> bobot_subkriteria?></td>
                        <td style="width: 15%;">
                          <a class="btn btn-info btn_edit" id="<?= $row -> id_subkriteria;?>" data-toggle = "modal" data-target = "#ModalView<?php echo $row -> id_subkriteria; ?>"><span class="fas fa-eye"></span></a>
                          
                          <a class="btn btn-primary btn_edit" id="<?= $row -> id_subkriteria;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $row -> id_subkriteria; ?>"><span class="fas fa-edit"></span></a>
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_TargetSubkriteria/hapus_data/'.$row -> id_subkriteria)?>"><span class="fas fa-trash-alt"></span></a>
                          
                          
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
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Target Sub Krtieria</h4>
              </div>
              <div class="modal-body">
              <form id="formAdd" name="formAdd" action="<?php echo base_url()?>index.php/C_TargetSubkriteria/input_data" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_divisi">Nama Posisi</label></td>
                      <td>:</td>
                      <td>
                        <select name='id_divisi' id='id_divisi' required>
                                <option value='' disabled selected>Pilih Posisi</option>
                              <?php foreach ($posisi as $row) {  ?>
                                <option value="<?=$row->id_divisi?>"><?= $row->nm_divisi?> </option>;
                            <?php }?>
                          </select>  
                      </td>     
                    </tr>
                    <tr>
                      <td><label for="id_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td>
                        <select id="id_kriteria" name="id_kriteria" onchange="showSubkriteria()">
                              <option value='' disabled selected>Pilih Kriteria</option>
                            <?php foreach ($kriteria as $row) {  ?>
                              <option value="<?= $row -> id_kriteria?>"> <?= $row -> nm_kriteria?> </option>;
                          <?php }?>
                        </select>  
                      </td>     
                    </tr>
                    <tr>
                      <td><label for="id_subkriteria">Nama Sub Kriteria</label></td>
                      <td>:</td>
                      <td>
                        <select id="id_subkriteria" name="id_subkriteria" onchange="showTargetSubkriteria()">
                              <option value='' disabled selected>Pilih Kriteria</option>
                            <?php foreach ($subkriteria as $row) {  ?>
                              <option value="<?= $row -> id_subkriteria?>"> <?= $row -> nm_subkriteria?> </option>;
                          <?php }?>
                        </select>  
                      </td>     
                    </tr>
                    <tr>
                      <td><label for="nilai_target">Nilai Target</label></td>
                      <td>:</td>
                      <td>
                        <select id="nilai_target" name="nilai_target" required></select>
                      </td>
                    </tr>
                    <tr>
                      <td><label for="status_subkriteria">Status Kriteria</label></td>
                      <td>:</td>
                      <td>
                        <select name="status_subkriteria" required>
                        <option checked >-Pilih Status-</option>
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
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Target Sub Kriteria</h4>
              </div>
              <div class="modal-body">
              <form>
                  <table>
                  <tr>
                      <td><label for="id_divisi">Kode Posisi</label></td>
                      <td>:</td>
                      <td><?= $row -> id_divisi?></td>
                    </tr>
                  <tr>
                      <td><label for="id_divisi">Nama Posisi</label></td>
                      <td>:</td>
                      <td><?= $row -> nm_divisi?></td>
                    </tr>
                    <tr>
                      <td><label for="id_kriteria">Kode Kriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> id_kriteria?></td>
                    </tr>
                    <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> nm_kriteria?></td>
                    </tr>    
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
                      <td><label for="nilai_target">Nilai Target</label></td>
                      <td>:</td>
                      <td><?= $row -> nilai_target?></td>
                    </tr>
                    <tr>
                      <td><label for="status_subkriteria">Status Subkriteria</label></td>
                      <td>:</td>
                      <td><?= $row -> status_subkriteria?></td>
                    </tr>
                    <tr>
                      <td><label for="bobot_subkriteria">Bobot</label></td>
                      <td>:</td>
                      <td><?= $row -> bobot_subkriteria?></td>
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
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Edit Target Sub Kriteria</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url()?>index.php/C_TargetSubkriteria/ubah_subkriteria" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_divisi">Nama Divisi</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="nm_divisi" id="nm_divisi" value="<?= $row -> nm_divisi?>" placeholder="<?= $row -> nm_divisi?>">

                      <input  type="hidden" class ="form-control" name="id_divisi" id="id_divisi" value="<?= $row -> id_divisi?>" placeholder="<?= $row -> id_divisi?>">
                    </tr>
                 
                    <tr>
                      <td><label for="nm_subkriteria">Nama Subkriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="nm_subkriteria" id="nm_subkriteria" value="<?= $row -> nm_subkriteria?>" placeholder="<?= $row -> nm_subkriteria?>">

                      <input  type="hidden" class ="form-control" name="id_subkriteria" id="id_subkriteria" value="<?= $row -> id_subkriteria?>" placeholder="<?= $row -> id_subkriteria?>">

                    </tr>
                    <tr>
                      <td><label for="nm_kriteria">Nama Kriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="nm_kriteria" id="nm_kriteria" value="<?= $row -> nm_kriteria?>" placeholder="<?= $row -> nm_kriteria?>">   

                      <input  type="hidden" class ="form-control" name="id_kriteria" id="id_kriteria" value="<?= $row -> id_kriteria?>" placeholder="<?= $row -> id_kriteria?>">
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
                    <tr>
                      <td><label for="bobot_subkriteria">Bobot Subkriteria</label></td>
                      <td>:</td>
                      <td><input readonly type="text-form" class ="form-control" name="bobot_subkriteria" id="bobot_subkriteria" value="<?= $row -> bobot_subkriteria?>" placeholder="<?= $row -> bobot_subkriteria?>">
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

<script>
  $(document).ready(function(){
    $('$id_kriteria').change(function(){
      var id_kriteria = $(this).val();
      console.log($id_kriteria);

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>C_TargetSubkritera/index',
        data: 'id_kriteria='+id_kriteria,
        success: function(response){
          $('$id_subkriteria'.html(response));
        }
      })
    }) 

  });

  function showSubkriteria(){
    var kriteria = document.getElementById("formAdd").id_kriteria.value;
  
  if (kriteria == 'C03'){
    document.getElementById("nilai_target").innerHTML="<option value=''>-Pilih Nilai Target-</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option>";   
    }
  else {
    document.getElementById("nilai_target").innerHTML="<option value=''>-Pilih Nilai Target-</option><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option>";
    }
}

function showTargetSubkriteria(){
    var subkriteria = document.getElementById("formAdd").id_subkriteria.value;
  if(subkriteria == 'SK07'||'SK08'){
    document.getElementById("nilai_target").innerHTML="<option value=''>-Pilih Nilai Target-</option><option value='1'>1-(Tidak Ada / SMA)</option><option value='2'>2-(< 1 Tahun / D3)</option><option value='3'>3-(> 1 Tahun / S1)</option>";
  } else {
    document.getElementById("nilai_target").innerHTML="<option value=''>-Pilih Nilai Target-</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option>";
  }
   
    
}
</script>