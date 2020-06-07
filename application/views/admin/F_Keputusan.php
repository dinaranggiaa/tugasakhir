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

  h4{
   text-align: center;
  }

</style>

<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Hasil Keputusan</h3> 
  <div class="border"></div>
  
  <h4>Hasil Keputusan Calon Karyawan<br>Periode <?= $bulan?> <?= $year?></h4>

  <div class="panel-body">
            <div class="table-responsive">
            <table class= "table table-striped table-bordered table-hover" style="text-align: center; font-size:15px">
              <form action="<?php echo base_url()?>index.php/C_ProsesPM/simpan_terpilih" method="POST">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Nilai Akhir</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                        foreach($pelamar as $row) :?>
                        <tr>
                          <td><?= $no?></td>
                          <td><?= $row -> id_pelamar?></td>  
                          <td><?= $row -> nm_pelamar?></td>
                          <td><?= $row -> nilai_akhir?></td>                          
                          <td><?php if($row -> status_akhir == '0') {
                                echo "Tidak Lolos";
                                } else {
                                  echo "Lolos";
                                }?>
                          </td>
                          <td>
                            <a style="padding:0px 3px 0px 4px;" class="btn btn-primary btn_edit" id="<?= $row -> id_pelamar;?>" data-toggle = "modal" data-target = "#ModalEdit<?php echo $row -> id_pelamar; ?>"><span class="fas fa-edit"></span></a></td>
                        </tr>
                      <?php $no++; endforeach?>
                    </tbody>
                </table>
              </form>
            </div>
  </div>

   <!-- Modal Edit Data pelamar -->
   <?php foreach ($pelamar as $row) : ?>
  <div class="form-pendataan">
        <!-- Modal -->
    <div class="modal fade" id="ModalEdit<?= $row -> id_pelamar?>" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="text-align: left;"><i class='fas fa-user-alt'></i>&nbsp; Edit Status Pelamar</h4>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url()?>index.php/C_ProsesPM/ubah_status" method="POST">
            <table>
                  <tr>
                    <td><label for="id_pelamar">Kode</label></td>
                    <td>:</td>
                    <td><input readonly type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?= $row -> id_pelamar?>" placeholder="<?= $row -> id_pelamar?>"></td>
                  </tr>
                  <tr>
                    <td><label for="nm_pelamar">Nama</label></td>
                    <td>:</td>
                    <td><input readonly type="text-form" class ="form-control" name="nm_pelamar" id="nm_pelamar" value="<?= $row -> nm_pelamar?>" placeholder="<?= $row -> nm_pelamar?>"></td>
                  </tr>
                  <tr>
                    <td><label for="nilai_akhir">Nilai Akhir</label></td>
                    <td>:</td>
                    <td><input readonly type="text-form" class ="form-control" name="nilai_akhir" id="nilai_akhir" value="<?= $row -> nilai_akhir?>" placeholder="<?= $row -> nilai_akhir?>"></td>
                  </tr>
                <tr>
                    <td><label for="status_akhir">Status Akhir</label></td>
                    <td>:</td>
                    <td>
                       <input type='radio' name='status_akhir' value='1' <?php if($row -> status_akhir =="1"){echo "checked";}?>>  Lolos &nbsp; &nbsp;
                        <input type='radio' name='status_akhir' value='0' <?php if($row -> status_akhir =="0"){echo "checked";}?>>  Tidak Lolos<br>
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
  </div>
  <?php endforeach?>

 