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

  <!-- Modal Entri Data Penilaian -->
  <div class="form-pendataan">
   <?php $n = $JmlKriteria['total']; ?>

  <?php foreach ($n_pelamar as $Pelamar):?> -->
        <!-- Modal -->
    <div class="modal fade" id="ModalAdd<?php echo $Pelamar -> id_pelamar; ?>" role="dialog">
        <div class="modal-dialog"> -->
        
          <!-- Modal content-->
          <div class="modal-content">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Penilaian</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_PenilaianPelamar/simpan_penilaian" method="POST"> -->
                  <table>
                    <tr>
                      <td><label for="id_pelamar">Kode Pelamar</label></td>
                      <td>:</td>
                      <td><?= $Pelamar -> id_pelamar?><input type="hidden" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?= $Pelamar -> id_pelamar?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_pelamar">Nama Lengkap</label></td>
                      <td>:</td>
                      <td><?= $Pelamar -> nm_pelamar?><input type="hidden" class ="form-control" name="nm_pelamar" id="nm_pelamar" value="<?= $Pelamar -> nm_pelamar?>"></td>
                    </tr>
                    <tr>
                    <?php endforeach?>
                    <?php foreach($datanilai as $Pelamar) : ?>
                      <?php for($i=0; $i<$n; $i++){?>
                      <td><label for="nm_kriteria" name="nm_kriteria<?= $i?>"><?= $kriteria[$i]['nm_kriteria']?></label>
                          <input type="hidden" name="id_kriteria<?= $i?>" value="<?= $kriteria[$i]['id_kriteria']?>" class="form-control">
                    </td>
                      <td>:</td>
                      <td>
                        <input type="text-form" class ="form-control" name="nilai_tes<?php echo $i?>" required> <?= $Pelamar -> nilai_tes?>
                      </td>
                    </tr>
                    <?php } ?>
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
     <?php endforeach?>
</div>


<!-- Modal View Data Penilaian -->
<?php $no=0; ?>
<?php foreach ($datanilai as $Penilaian) : ?>
  <?php if ($no == 0) : ?>
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalView<?= $Penilaian -> id_pelamar?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelView">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Data Penilaian</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url()?>index.php/C_Penilaian/simpan_penilaian" method="POST">
              <table >
                    <tr>
                      <td><label for="id_pelamar">Kode Pelamar</label></td>
                      <td>:</td>
                      <td><?= $Penilaian -> id_pelamar?><input type="hidden" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?= $Penilaian -> id_pelamar?>" placeholder="<?= $Penilaian -> id_pelamar?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_pelamar">Nama Lengkap</label></td>
                      <td>:</td>
                      <td><?= $Penilaian -> nm_pelamar?><input type="hidden" class ="form-control" name="nm_pelamar" id="nm_pelamar" value="<?= $Penilaian -> nm_pelamar?>" placeholder="<?= $Penilaian -> nm_pelamar?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nohp_pelamar">No Handphone</label></td>
                      <td>:</td>
                      <td><?= $Penilaian -> nohp_pelamar?><input type="hidden" class ="form-control" name="nohp_pelamar" id="nohp_pelamar" value="<?= $Penilaian -> nohp_pelamar?>" placeholder="<?= $Penilaian -> nohp_pelamar?>"></td>
                    </tr>
                    <tr>
                      <td><label for="almt_pelamar">Alamat</label></td>
                      <td>:</td>
                      <td><?= $Penilaian -> almt_pelamar?><input type="hidden" class ="form-control" name="almt_pelamar" id="almt_pelamar" value="<?= $Penilaian -> almt_pelamar?>" placeholder="<?= $Penilaian -> almt_pelamar?>"></td>
                    </tr>
              </table>
              <br>
              <table class="table table-striped table-bordered table-hover" style="width: 80%; margin:auto;">
                <thead >
                  <tr style="text-align:center; ">
                    <th style="text-align:center; width:60%"> Nama Kriteria</th>
                    <th style="text-align:center; width:5%">:</th>
                    <th style="text-align:center; width:35%">Nilai</th>
                  </tr>
                </thead>
                <tbody style="border: 1px solid black;">

  <?php endif ?>
<?php $no++; endforeach?>
<?php foreach ($datanilai as $Penilaian) :?>
                      <tr>
                      <td><label style="font-weight:normal" for="nm_kriteria"><?= $Penilaian -> nm_kriteria?></td>
                      <td>:</td>
                      <td style="text-align:center;"><?= $Penilaian -> nilai_tes ?><input type="hidden" name="nilai_tes" value="<?= $Penilaian -> nilai_tes ?>" class="form-control"></td>
                    </tr>
<?php endforeach?>
                    </tbody>
                  </table>
              </div>
              </form>
          </div>
        </div>
    </div>
  </form>
</div>

 <!-- Modal Entri Data Penilaian -->
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
                  <td><label for="id_pelamar">Kode Pelamar</label></td>
                  <td>:</td>
                  <td><input type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar"></td>
                </tr>
                <tr>
                  <td><label for="nm_pelamar">Nama Lengkap</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="nm_pelamar" id="nm_pelamar" class="form-control"></td>
                </tr>
                <?php for($i=0; $i<$n; $i++){?>
                      <td><label for="nm_kriteria" name="nm_kriteria<?= $i?>"><?= $kriteria[$i]['nm_kriteria']?></label>
                          <input type="hidden" name="id_kriteria<?= $i?>" value="<?= $kriteria[$i]['id_kriteria']?>" class="form-control">
                    </td>
                      <td>:</td>
                      <td>
                        <input type="text-form" class ="form-control" name="nilai_tes<?php echo $i?>" required>
                      </td>
                    </tr>
                    <?php } ?>
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



<!-- Modal Edit Data Penilaian -->
<?php $no=0; ?>
<?php foreach ($penilaian as $Penilaian) : ?>
  <?php if ($no == 0) : ?>
  <div class="form-pendataan">
    
        <!-- Modal -->
    <div class="modal fade" id="ModalEdit<?= $Penilaian -> id_pelamar?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content" id="ModelEdit">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Penilaian</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url()?>index.php/C_Penilaian/ubah_Penilaian" method="POST">
                  <table>
                    <tr>
                      <td><label for="id_pelamar">Kode Pelamar</label></td>
                      <td>:</td>
                      <td><?= $Penilaian -> id_pelamar?><input type="hidden" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?= $Penilaian -> id_pelamar?>" placeholder="<?= $Penilaian -> id_pelamar?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nm_pelamar">Nama Lengkap</label></td>
                      <td>:</td>
                      <td><?= $Penilaian -> nm_pelamar?><input type="hidden" class ="form-control" name="nm_pelamar" id="nm_pelamar" value="<?= $Penilaian -> nm_pelamar?>" placeholder="<?= $Penilaian -> nm_pelamar?>"></td>
                    </tr>
                    <tr>
                      <td><label for="nohp_pelamar">No Handphone</label></td>
                      <td>:</td>
                      <td><?= $Penilaian -> nohp_pelamar?><input type="hidden" class ="form-control" name="nohp_pelamar" id="nohp_pelamar" value="<?= $Penilaian -> nohp_pelamar?>" placeholder="<?= $Penilaian -> nohp_pelamar?>"></td>
                    </tr>
                    <tr>
                      <td><label for="almt_pelamar">Alamat</label></td>
                      <td>:</td>
                      <td><?= $Penilaian -> almt_pelamar?><input type="hidden" class ="form-control" name="almt_pelamar" id="almt_pelamar" value="<?= $Penilaian -> almt_pelamar?>" placeholder="<?= $Penilaian -> almt_pelamar?>"></td>
                    </tr>
  <?php endif ?>
<?php $no++; endforeach?>
<?php foreach ($penilaian as $Penilaian) :?>
                      <tr>
                      <td><label class="label-form" for="nm_kriteria"><?= $Penilaian -> nm_kriteria?></td>
                      <td>:</td>
                      <td><input type="text-form" name="nilai_tes" value="<?= $Penilaian -> nilai_tes ?>" class="form-control"></td>
                    </tr>
<?php endforeach?>
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
