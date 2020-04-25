<!--SIDE BAR-->
<?php $this->view('partials/sidebar_admin')?>

<style>
  /* .form-pendataan{
    margin-left: 35px;
    font-family: arial;
  }

  .demo-table {
    border-collapse: collapse;
    font-size: 17px;
    width: 75%;
    margin-left: 130px;
    margin-top: 50px;
  }

  .demo-table td:first-child {
    width: 250px;
    text-align: left;
  }

  .demo-table td:nth-child(2) {
    width: 30px;
    text-align: center;
  }
  .demo-table td {
    /* border: 1px solid #2ed573; */
    /* padding: 7px 17px;
  } */

  /* Table Body */
  .demo-table tbody td {
    color: #353535;
  }

  input.form-control{
    width: 350px;
  }

  .modal-body td{
    padding: 5px;
  }

  /*.btn-primary{
    float: left;
    margin-right: 35px;
  } */

</style>

<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Data Kriteria</h3> 
  <div class="border"></div>
  
  <br>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Tambah Data</button>
  <br>
  <br>
  
  <!-- Data Kandidat -->
  <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php  $no = $this->uri->segment(3) + 1; ?>
                    <tbody id="tbl_data_kriteria">
                         
                    </tbody>
                </table>
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
              <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Kriteria</h4>
            </div>
            <div class="modal-body">
              <table>
                <tr>
                  <td><label for="id_kriteria">Kode Kriteria</label></td>
                  <td>:</td>
                  <td><input readonly type="text-form" class ="form-control" name="id_kriteria" id="id_kriteria" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
                </tr>
                <tr>
                  <td><label for="nm_kriteria">Nama Kriteria</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="nm_kriteria" id="nm_kriteria" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="bobot_kriteria">Bobot Kriteria</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="bobot_kriteria" id="bobot_kriteria" class="form-control"></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="btn_simpan">Simpan</button>
              <button type='reset' class="btn btn-warning" name='btnbatal' value='BATAL' onclick="javascript:Batal();">Batal</button>
            </div>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
      tampil_data();

      // Menampilkan data kandidat pada table
      function tampil_data() {
        $.ajax({
          url : "<?php echo base_url('C_Kriteria/ambil_data_kriteria')?>",
          type : 'POST',
          dataType: 'json',
          success: function (response){
            console.log(response);
            var i;
            var no = 0;
            var html = "";
            for (i=0; i < response.length; i++){
              no++;
              html = html + '<tr>'
                          + '<td>' + no + '</td>'
                          + '<td>' + response[i].id_kriteria + '</td>'
                          + '<td>' + response[i].nm_kriteria + '</td>'
                          + '<td>' + response[i].bobot_kriteria + '</td>'
                          + '<td style="width: 16.66%;">' + '<span><button data-id="'+response[i].id_kriteria+'" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="'+response[i].id_kriteria+'" class="btn btn-danger btn_hapus">Hapus</button></span>'  + '</td>'
                          + '</tr>';
            }
          $("#tbl_data_kriteria").html(html);
        }
     });
    }

     $('#btn_simpan').on('click', function() {
      var id_kriteria=$('#id_kriteria').val();
      var nm_kriteria=$('#nm_kriteria').val();
      
      $.ajax({
        type : "POST",
        url : "<?php echo base_url('C_Kriteria/simpan_Kriteria')?>",
        dataType : "JSON",
        data : {id_kriteria:id_kriteria, nm_kriteria:nm_kriteria},
        success : function (data) {
          $('[name="id_kriteria"]').val("");
          $('[name="nm_kriteria"]').val("");
          tampil_data();
          $("ModalAdd").modal('hide');
        }
      })
    });
    });
</script>