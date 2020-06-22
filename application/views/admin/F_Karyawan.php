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
  p{
    margin-top: 5px; 
    margin-bottom:5px; 
    margin-left: 5px;    
    font-family: 'Roboto';
    color: black;
    font-size: 15px;
  }

  .header-bar{
    width: 100%;    
  }

</style>

<div class="navigation" style="border: black;">
    <ul class="breadcrumb">
        <li><?php echo "<a href='".base_url()."Dashboard/dashboard_admin'><i class='fas fa-fas fa-desktop'> &nbsp; </i>Dashboard</a>"; ?></li>
        <li>Data Karyawan</li>
      </ul>
</div>

<div class="center-bar">
  <!-- <h3><i class='far fa-folder-open'></i>&nbsp;Data Karyawan</h3>  -->
  <div class = "header-bar"> 
    <div class="judul" style="width:300px; position:absolute"><h3><i class='far fa-folder-open'></i>&nbsp;Data Karyawan</h3></div>
    <div class="judul" style="float:right; margin-top: 15px;"><a class="btn btn-success" href="<?php echo site_url('C_Laporan/cetak_form_datadiri') ?>"><span class="fas fa-file-download">&nbsp; Biodata Diri Karyawan</span></a></div>
  </div>
  <br>
  <br>
  <br> 
  <div class="border"></div>
  
  <br>

  <?php $this->load->view('alert')?>
  
    <?php echo form_open('C_Karyawan/entri_karyawan')?>
    <button class="btn btn-default" type='submit' href="<?php echo site_url('C_Karyawan/entri_karyawan')?>"><i class='fas fa-plus'></i> &nbsp;Add Data</button>
    <?php echo form_close()?>

    <div class="inputsearch" style="float: right; margin-top:12px;">
    <?php echo form_open('C_Karyawan/index')?>
      <button class="btn-link" type='submit' href="<?php echo site_url('C_Karyawan/index')?>"><i class='fas fa-undo'></i></button>
    <?php echo form_close()?>
  </div>

  <div class="inputsearch">
    <?php echo form_open('C_Karyawan/cari_keyword')?>
      <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
      <button class="button button1" type='submit' name='btncari'><i class='fas fa-search'></i></button>
    <?php echo form_close()?>
  </div>


  <br>
  <br>
  
  <!-- Data Karyawan -->
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
                      <?php foreach ($karyawan as $Karyawan):?>
                      <tr>
                        <td><?= $no?></td>
                        <td><?= $Karyawan -> id_karyawan?></td>
                        <td><?= $Karyawan -> nm_karyawan?></td>
                        <td><?= $Karyawan -> almt_karyawan?></td>
                        <td><?= $Karyawan -> nohp_karyawan?></td>
                        <td style="width: 15%; text-align:center">
                       
                          <a class="btn btn-info btn_edit" id="<?= $Karyawan -> id_karyawan;?>" data-toggle = "modal" data-target = "#ModalView<?php echo $Karyawan -> id_karyawan; ?>"><span class="fas fa-eye"></span></a>
                          <a class="btn btn-primary btn_edit" id="<?= $Karyawan -> id_karyawan;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $Karyawan -> id_karyawan; ?>"><span class="fas fa-edit"></span></a>
                          <a class="btn btn-danger btn_hapus" onclick="return confirm('Yakin Hapus Data?')" href="<?php echo site_url('C_Karyawan/hapus_karyawan/'.$Karyawan -> id_karyawan)?>"><span class="fas fa-trash-alt"></span></a>

                        </td>
                      </tr>
                      <?php $no++?>
                      <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!-- Modal View Data Karyawan -->
<?php foreach ($karyawan as $row) : ?>

<div class="form-pendataan">
  
      <!-- Modal -->
  <div class="modal fade" id="ModalView<?= $row -> id_karyawan?>" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content" id="ModelView">
          
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Karyawan</h4>
            </div>
            <div class="modal-body">

              <table>
                  <tr>
                    <td><label for="id_karyawan">Kode Karyawan</label></td>
                    <td>:</td>
                    <td><?= $row -> id_karyawan?></td>
                </tr>
                <tr>
                  <td><label for="nm_karyawan">Nama Lengkap</label></td>
                  <td>:</td>
                  <td><?= $row -> nm_karyawan?></td>
                </tr>
                <tr>
                  <td><label for="tempat_lahir">Tempat Lahir</label></td>
                  <td>:</td>
                  <td><?= $row -> tempat_lahir?></td>
                </tr>
                <tr>
                  <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                  <td>:</td>
                  <td><?= $row -> tanggal_lahir?></td>
                </tr>
                <tr>
                  <td><label for="almt_karyawan">Alamat</label></td>
                  <td>:</td>
                  <td><?= $row -> almt_karyawan?></td>
                </tr>
                <tr>
                  <td><label for="no_ktp">No KTP</label></td>
                  <td>:</td>
                  <td><?= $row -> no_ktp?></td>
                </tr>
                <tr>
                  <td><label for="status_marital">Status</label></td>
                  <td>:</td>
                  <td><?= $row -> status_marital?></td>
                </tr>
                <tr>
                  <td><label for="nohp_karyawan">No Handphone</label></td>
                  <td>:</td>
                  <td><?= $row -> nohp_karyawan?></td>
                </tr>
                <tr>
                  <td><label for="pendidikan_terakhir">Pendidikan Terakhir</label></td>
                  <td>:</td>
                  <td><?= $row -> pendidikan_terakhir?></td>
                </tr>
                <tr>
                  <td><label for="tglmasukkerja">Tanggal Masuk Kerja</label></td>
                  <td>:</td>
                  <td><?= $row -> tglmasukkerja?></td>
                </tr>
                <tr>
                <tr>
                  <td><label for="nm_ortu">Nama Orang Tua</label></td>
                  <td>:</td>
                  <td><?= $row -> nm_ortu?></td>
                </tr>
                <tr>
                  <td><label for="almt_ortu">Alamat Orang Tua</label></td>
                  <td>:</td>
                  <td><?= $row -> almt_ortu?></td>
                </tr>
              </table>
              <br>
              <div class="border"></div>
              <p>Nama orang yang harus dihubungi bila terjadi keadaan darurat : </p>
              <div class="border"></div>
              
              <table>    
                <tr>
                  <td><label for="pendidikan_terakhir">Nama Lengkap</label></td>
                  <td>:</td>
                  <td><?= $row -> nm_hub?></td>
                </tr>
                
                <tr>
                  <td><label for="stat_hub">Status Hubungan</label></td>
                  <td>:</td>
                  <td><?= $row -> stat_hub?></td>
                </tr>
                <tr>
                <tr>
                  <td><label for="almt_hub">Alamat</label></td>
                  <td>:</td>
                  <td><?= $row -> almt_hub?></td>
                </tr>
                <tr>
                  <td><label for="nohp_hub">No Handphone</label></td>
                  <td>:</td>
                  <td><?= $row -> nohp_hub?></td>
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



  <!-- Modal Edit Data Karyawan -->
    <?php foreach ($karyawan as $row) : ?>
    <div class="form-pendataan">
      
          <!-- Modal -->
      <div class="modal fade" id="ModalEdit<?= $row -> id_karyawan?>" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content" id="ModelEdit">
              
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Karyawan</h4>
                </div>
                <div class="modal-body">
                  <form action="<?php echo base_url()?>index.php/C_Karyawan/ubah_karyawan" method="POST">
                    <table>
                      <tr>
                        <td><label for="id_karyawan">Kode Karyawan</label></td>
                        <td>:</td>
                        <td><input readonly type="text-form" class ="form-control" name="id_karyawan" id="id_karyawan" value="<?= $row -> id_karyawan?>" placeholder="<?= $row -> id_karyawan?>"></td>
                      </tr>
                      <tr>
                        <td><label for="nm_karyawan">Nama Lengkap</label></td>
                        <td>:</td>
                        <td><input type="text-form" name="nm_karyawan" id="nm_karyawan" value="<?= $row -> nm_karyawan?>" placeholder="<?= $row -> nm_karyawan?>" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><label for="tempat_lahir">Tempat Lahir</label></td>
                        <td>:</td>
                        <td><input type="text-form" name="tempat_lahir" id="tempat_lahir" value="<?= $row -> tempat_lahir?>" placeholder="<?= $row -> tempat_lahir?>" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                        <td>:</td>
                        <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= $row -> tanggal_lahir?>" placeholder="<?= $row -> tanggal_lahir?>" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><label for="almt_karyawan">Alamat</label></td>
                        <td>:</td>
                        <td><textarea type="text-form" name="almt_karyawan" id="almt_karyawan" value="<?= $row -> almt_karyawan?>" placeholder="<?= $row -> almt_karyawan?>" class="form-control"><?= $row -> almt_karyawan?></textarea></td>
                      </tr>
                      <tr>
                        <td><label for="no_ktp">No KTP</label></td>
                        <td>:</td>
                        <td><input type="text-form" name="no_ktp" id="no_ktp" value="<?= $row -> no_ktp?>" placeholder="<?= $row -> no_ktp?>" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><label for="status_marital">Status</label></td>
                        <td>:</td>
                        <td>
                          <input type='radio' name='status_marital' value='Menikah' <?php if($row -> status_marital =="Menikah"){echo "checked";}?>>  Menikah &nbsp; &nbsp;
                          <input type='radio' name='status_marital' value='Lajang' <?php if($row -> status_marital =="Lajang"){echo "checked";}?>>  Lajang<br>
                        </td>
                      </tr>
                      <tr>
                        <td><label for="nohp_karyawan">No Handphone</label></td>
                        <td>:</td>
                        <td><input type="text-form" name="nohp_karyawan" id="nohp_karyawan" value="<?= $row -> nohp_karyawan?>" placeholder="<?= $row -> nohp_karyawan?>" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><label for="pendidikan_terakhir">Pendidikan Terakhir</label></td>
                        <td>:</td>
                        <td>                          
                          <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
                          <option value="">--Pendidikan Akhir--</option>
                          <option value="SMA" <?php if($row -> pendidikan_terakhir == "SMA"){echo "selected";}?>>SMA</option>
                          <option value="D3" <?php if($row -> pendidikan_terakhir == "D3"){echo "selected = 'selected'";}?>>D3</option>
                          <option value="S1" <?php if($row -> pendidikan_terakhir == "S1"){echo "selected = 'selected'";}?>>S1</option>
                          <option value="S2" <?php if($row -> pendidikan_terakhir == "S2"){echo "selected = 'selected'";}?>>S2</option>
                        </select>
                      </td>
                      </tr>
                      <tr>
                        <td><label for="tglmasukkerja">Tanggal Masuk Kerja</label></td>
                        <td>:</td>
                        <td><input type="date" name="tglmasukkerja" id="tglmasukkerja" value="<?= $row -> tglmasukkerja?>" placeholder="<?= $row -> tglmasukkerja?>" class="form-control"></td>
                      </tr>
                      <tr>
                      <tr>
                        <td><label for="nm_ortu">Nama Orang Tua</label></td>
                        <td>:</td>
                        <td><input type="text-form" name="nm_ortu" id="nm_ortu" value="<?= $row -> nm_ortu?>" placeholder="<?= $row -> nm_ortu?>" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><label for="almt_ortu">Alamat Orang Tua</label></td>
                        <td>:</td>
                        <td><textarea type="text-form" name="almt_ortu" id="almt_ortu" value="<?= $row -> almt_ortu?>" placeholder="<?= $row -> almt_ortu?>" class="form-control"><?= $row -> almt_ortu?></textarea></td>
                      </tr>
                      <tr>
                        <td><label for="status_kerja">Status Kerja</label></td>
                        <td>:</td>
                        <td><select name="status_kerja" id="status_kerja">
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </td>
                      </tr>
                    </table>
                    <br>
                    
                    <div class="border"></div>
                    <p>Nama orang yang harus dihubungi bila terjadi keadaan darurat : </p>
                    <div class="border"></div>
                    
                    <table>    
                      <tr>
                        <td><label for="nm_hub">Nama Lengkap</label></td>
                        <td>:</td>
                        <td><input type="text-form" name="nm_hub" id="nm_hub" value="<?= $row -> nm_hub?>" class="form-control"></td>
                      </tr>
                      
                      <tr>
                        <td><label for="stat_hub">Status Hubungan</label></td>
                        <td>:</td>
                        <td><input type="text-form" name="stat_hub" id="stat_hub" value="<?= $row -> stat_hub?>" class="form-control"></td>
                      </tr>
                      <tr>
                      <tr>
                        <td><label for="almt_hub">Alamat</label></td>
                        <td>:</td>
                        <td><textarea type="text-form" name="almt_hub" id="almt_hub" value="<?= $row -> almt_hub?>" class="form-control"><?= $row -> almt_hub?></textarea></td>
                      </tr>
                      <tr>
                        <td><label for="nohp_hub">No Handphone</label></td>
                        <td>:</td>
                        <td><input type="text-form" name="nohp_hub" id="nohp_hub" value="<?= $row -> nohp_hub?>" class="form-control"></td>
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

</div>
