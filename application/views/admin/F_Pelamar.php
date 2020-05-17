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
  <h3><i class='far fa-folder-open'></i>&nbsp;Data Pelamar</h3> 
  <div class="border"></div>
  
  <br>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Add Data</button>
  <!-- <?php echo form_open('C_Pelamar/tambah_pelamar')?>
    <button class="btn btn-default" type='submit' href="<?php echo site_url('C_Pelamar/tambah_pelamar')?>"><i class='fas fa-plus'></i> &nbsp;Add Data</button>
  <?php echo form_close()?> -->

  <div class="inputsearch">
    <?php echo form_open('C_Pelamar/cari_keyword')?>
    <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
    <button class="button button1" type='submit' name='btncari'><i class='fas fa-search'></i></button>
    <button class="btn-link" type='submit' href="<?php echo site_url('C_Pelamar/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
    
  </div>
  
  <br>
  <br>
  
  <!-- Data pelamar -->
  <div class="panel-body">
    <div class="table-responsive">
      <table class= "table table-striped table-bordered table-hover" style="text-align: center; font-size:15px">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Pelamar</th>
            <th>Periode</th>
            <th>Nama Lengkap</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php  $no=1; ?>
          <?php foreach ($pelamar as $Pelamar):?> 
          <tr>
            <td><?= $no?></td>
            <td><?= $Pelamar -> id_pelamar?></td>
            <td><?= $Pelamar -> bulan?></td>
            <td><?= $Pelamar -> nm_pelamar?></td>
            <td><?= $Pelamar -> nohp_pelamar?></td>
            <td  style="text-align: left"><?= $Pelamar -> almt_pelamar?></td>
            <td style="width: 15%;">
              <a class="btn btn-info btn_edit" id="<?= $Pelamar -> id_pelamar;?>" data-toggle = "modal" data-target = "#ModalView<?php echo $Pelamar -> id_pelamar; ?>"><span class="fas fa-eye"></span></a>
              <a class="btn btn-primary btn_edit" id="<?= $Pelamar -> id_pelamar;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $Pelamar -> id_pelamar; ?>"><span class="fas fa-edit"></span></a>
              <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_Pelamar/hapus_pelamar/'.$Pelamar -> id_pelamar)?>"><span class="fas fa-trash-alt"></span></a>
            </td>
          </tr>
          <?php $no++?>
          <?php endforeach?>
        </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Modal Entri Data pelamar -->
  <div class="form-pendataan">
        <!-- Modal -->
        <div class="modal fade" id="ModalAdd" role="dialog">
      <div class="modal-dialog">  
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data pelamar</h4>
          </div>
          <div class="modal-body">
          <form action="<?php echo base_url()?>index.php/C_Pelamar/simpan_pelamar" method="POST">
          <table>
          <tr>
            <td><label for="id_pelamar">Kode Pelamar</label></td>
            <td>:</td>
            <td><input readonly type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
          </tr>
         
          <tr>
            <td><label for="id_periode">Periode</label></td>
            <td>:</td>
            <td>
            <?php
                echo "
                <select name='id_periode' id='id_periode' required>
                <option value='' disabled selected>Pilih Periode</option>";
                  foreach ($periode as $Periode) {  
                  echo "<option value='".$Periode->id_periode."'>".$Periode->bulan."</option>";
                  }
                  echo"
                </select>";
                ?>    
            </td>     
          </tr>
          <tr>
            <td><label for="tgl_daftar">Tanggal Daftar</label></td>
            <td>:</td>
            <td><input type="date" name="tgl_daftar" id="tgl_daftar" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo date('Y-m-d')?>" class="form-control"></td>
          </tr>
          <tr>
          <tr>
            <td><label for="nm_pelamar">Nama Lengkap</label></td>
            <td>:</td>
            <td><input type="text-form" name="nm_pelamar" id="nm_pelamar" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="jk_pelamar">Jenis Kelamin</label></td>
            <td>:</td>
            <td><input type="radio" name="jk_pelamar" value="Pria"> Pria
                &nbsp; &nbsp;<input type="radio" name="jk_pelamar" value="Wanita"> Wanita</td>
          </tr>
          <tr>
            <td><label for="tempat_lahir">Tempat Lahir</label></td>
            <td>:</td>
            <td><input type="text-form" name="tempat_lahir" id="tempat_lahir" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
            <td>:</td>
            <td style="padding-bottom: 13px;"><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="almt_pelamar">Alamat</label></td>
            <td>:</td>
            <td><textarea name='almt_pelamar' id='almt_pelamar' cols='25' rows='3' class="form-control"></textarea></td>
          </tr>
          <tr>
            <td><label for="no_ktp">No KTP</label></td>
            <td>:</td>
            <td><input type="text-form" name="no_ktp" id="no_ktp" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="status">Status</label></td>
            <td>:</td>
            <td><input type="radio" name="status" value="Menikah">  Menikah
                &nbsp; &nbsp;<input type="radio" name="status" value="Lajang">  Lajang</td>
          </tr>
          <tr>
            <td><label for="nohp_pelamar">No HP</label></td>
            <td>:</td>
            <td><input type="text-form" name="nohp_pelamar" id="nohp_pelamar" class="form-control"></td>
          </tr>
          <tr>
            <td><label for="pendidikan_akhir">Pendidikan Terakhir</label></td>
            <td>:</td>
            <td>
              <select name="pendidikan_akhir" id="pendidikan_akhir" class="form-control">
              <option value="">--Pendidikan Akhir--</option>
              <option value="SMA">SMA</option>
              <option value="D3">D3</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              </select>
            </td>
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



  <!-- Modal View Data Pelamar -->
<?php foreach ($pelamar as $Pelamar) : ?>
<div class="form-pendataan">
  
      <!-- Modal -->
  <div class="modal fade" id="ModalView<?= $Pelamar -> id_pelamar?>" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content" id="ModelView">
          
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Pelamar</h4>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url()?>index.php/C_Periode/simpan_periode" method="POST">
                <table>
                  <tr>
                    <td><label for="id_pelamar">Kode</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> id_pelamar?></td>
                  </tr>
                  <tr>
                    <td><label for="id_periode">Periode</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> bulan?></td>
                  </tr>
                  <tr>
                    <td><label for="tgl_daftar">Tanggal Daftar</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> tgl_daftar?></td>
                  </tr>
                  <tr>
                    <td><label for="nm_pelamar">Nama</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> nm_pelamar?></td>
                  </tr>
                  <tr>
                    <td><label for="jk_pelamar">Jenis Kelamin</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> jk_pelamar?></td>
                  </tr>
                  <tr>
                    <td><label for="tempat_lahir">Tempat Lahir</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> tempat_lahir?></td>
                  </tr>
                  <tr>
                    <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> tanggal_lahir?></td>
                  </tr>
                  <tr>
                    <td><label for="almt_pelamar">Alamat</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> almt_pelamar?></td>
                  </tr>
                  <tr>
                    <td><label for="no_ktp">No KTP</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> no_ktp?></td>
                  </tr>
                  <tr>
                    <td><label for="status">Status</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> status?></td>
                  </tr>
                  <tr>
                    <td><label for="nohp_pelamar">No Handphoe</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> nohp_pelamar?></td>
                  </tr>
                  <tr>
                    <td><label for="pendidikan_akhir">Pendidikan AKhir</label></td>
                    <td>:</td>
                    <td><?= $Pelamar -> pendidikan_akhir?></td>
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
</div>

     <!-- Modal Edit Data pelamar -->
     <?php foreach ($pelamar as $Pelamar) : ?>
  <div class="form-pendataan">
        <!-- Modal -->
    <div class="modal fade" id="ModalEdit<?= $Pelamar -> id_pelamar?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Edit Data pelamar</h4>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url()?>index.php/C_Pelamar/ubah_pelamar" method="POST">
            <table>
                  <tr>
                    <td><label for="id_pelamar">Kode</label></td>
                    <td>:</td>
                    <td><input readonly type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?= $Pelamar -> id_pelamar?>" placeholder="<?= $Pelamar -> id_pelamar?>"></td>
                  </tr>
                  <tr>
                    <td><label for="id_periode">Periode</label></td>
                    <td>:</td>
                    <td><input readonly type="text-form" name="id_periode" id="id_periode" value="<?= $Pelamar -> bulan?>" placeholder="<?php $Pelamar -> bulan?>" class="form-control">
                        <input type="hidden" name="id_periode" id="id_periode" value="<?= $Pelamar -> id_periode?>" placeholder="<?php $Pelamar -> id_periode?>" class="form-control">
                    </td>
                </tr>
                  <tr>
                    <td><label for="tgl_daftar">Tanggal Daftar</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="tgl_daftar" id="tgl_daftar" value="<?= $Pelamar -> tgl_daftar?>" placeholder="<?= $Pelamar -> tgl_daftar?>"></td>
                  </tr>
                  <tr>
                    <td><label for="nm_pelamar">Nama</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="nm_pelamar" id="nm_pelamar" value="<?= $Pelamar -> nm_pelamar?>" placeholder="<?= $Pelamar -> nm_pelamar?>"></td>
                  </tr>
                  <tr>
                    <td><label for="jk_pelamar">Jenis Kelamin</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="jk_pelamar" id="jk_pelamar" value="<?= $Pelamar -> id_pelamar?>" placeholder="<?= $Pelamar -> id_pelamar?>"></td>
                  </tr>
                  <tr>
                    <td><label for="tempat_lahir">Tempat Lahir</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $Pelamar -> tempat_lahir?>" placeholder="<?= $Pelamar -> tempat_lahir?>"></td>
                  </tr>
                  <tr>
                    <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $Pelamar -> tanggal_lahir?>" placeholder="<?= $Pelamar -> tanggal_lahir?>"></td>
                  </tr>
                  <tr>
                    <td><label for="almt_pelamar">Alamat</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="almt_pelamar" id="almt_pelamar" value="<?= $Pelamar -> almt_pelamar?>" placeholder="<?= $Pelamar -> almt_pelamar?>"></td>
                  </tr>
                  <tr>
                    <td><label for="no_ktp">No KTP</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="no_ktp" id="no_ktp" value="<?= $Pelamar -> no_ktp?>" placeholder="<?= $Pelamar -> no_ktp?>"></td>
                  </tr>
                  <tr>
                    <td><label for="status">Status</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="status" id="status" value="<?= $Pelamar -> status?>" placeholder="<?= $Pelamar -> status?>"></td>
                  </tr>
                  <tr>
                    <td><label for="nohp_pelamar">No Handphoe</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="nohp_pelamar" id="nohp_pelamar" value="<?= $Pelamar -> nohp_pelamar?>" placeholder="<?= $Pelamar -> nohp_pelamar?>"></td>
                  </tr>
                  <tr>
                    <td><label for="pendidikan_akhir">Pendidikan AKhir</label></td>
                    <td>:</td>
                    <td><input type="text-form" class ="form-control" name="pendidikan_akhir" id="pendidikan_akhir" value="<?= $Pelamar -> pendidikan_akhir?>" placeholder="<?= $Pelamar -> pendidikan_akhir?>"></td>
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
  </div>
  <?php endforeach?>
