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
  <h3><i class='far fa-folder-open'></i>&nbsp;Hasil Analisis</h3> 
  <div class="border"></div>
  <br>
  <h4>Entri Data Keputusan Calon Karyawan<br>Periode <?= $bulan?> <?= $year?></h4>
  <div class="panel-body">
            <div class="table-responsive">
            <table class= "table table-striped table-bordered table-hover" style="text-align: center; font-size:15px">
              <form action="<?php echo base_url()?>index.php/C_ProsesPM/simpan_terpilih" method="POST">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Bobot</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($x=0; $x<3; $x++){ ?>
                      <tr>
                        <td><?= $x+1?></td>
                        <td>
                            <input type="hidden" class ="form-control" name="id_pelamar<?= $x?>" id="id_pelamar"><?php echo $pelamar[$x]['id_pelamar']; ?>
                        </td>
                        <td>
                            <input type="hidden" class ="form-control" name="nm_pelamar<?= $x?>" id="nm_pelamar"><?php echo $pelamar[$x]['nm_pelamar']; ?>
                        </td>
                        <td>
                            <input type="hidden" class ="form-control" name="nilai_akhir<?= $x?>" id="nilai_akhir"><?php echo $pelamar[$x]['nilai_akhir']; ?>
                        </td>

                        <td style="width: 15%;">
                            <input type="checkbox" name="status_akhir<?=$x?>" value="<?= $pelamar[$x]['id_pelamar'];?>"> Lolos Seleksi
                            <?php } ?>
                          
                        </td>
                      </tr>
                    </tbody>
                </table>
                <table style="float: right; width:10%; border:hidden;" >
                  <tr>
                    <td style="width: 20px; padding-right:10px;">
                        <button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
                      </form>
                    </td>
                    <td>
                       <button type='reset' class="btn btn-warning fas fa-undo" name='btnbatal' value='BATAL' onclick="javascript:HapusText();"> Cancel</button>
                      </form>
                    </td>
                  </tr>
                </table>
              </form>

            </div>
        </div>
    </div>

 