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
    padding: 7px 17px;
  }

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

  /* .btn-primary{
    float: left;
    margin-right: 35px;
  }  */

</style>
<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Data Kandidat</h3> 
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
                            <th>Id Kandidat</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_data_kandidat">
                         
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Modal Entri Data Kandidat -->
  <div class="form-pendataan">
        <!-- Modal -->
    <div class="modal fade" id="ModalAdd" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Entri Data Kandidat</h4>
            </div>
            <div class="modal-body">
              <table>
                <tr>
                  <td><label for="id_kandidat">Kode Kandidat</label></td>
                  <td>:</td>
                  <td><input readonly type="text-form" class ="form-control" name="id_kandidat" id="id_kandidat" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
                </tr>
                <tr>
                  <td><label for="nm_kandidat">Nama Lengkap</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="nm_kandidat" id="nm_kandidat" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="jk_kandidat">Jenis Kelamin</label></td>
                  <td>:</td>
                  <td><input type='radio' name='jk_kandidat' id="jk_kandidat" value='Pria'>Pria &nbsp;&nbsp;
                  <input type='radio' name='jk_kandidat' id="jk_kandidat" value='Wanita'>Wanita</td>
                </tr>
                <tr>
                  <td><label for="almt_kandidat">Alamat</label></td>
                  <td>:</td>
                  <td><textarea name='almt_kandidat' id='almt_kandidat' cols='25' rows='3' class="form-control"></textarea></td>
                </tr>
                <tr>
                  <td><label for="nohp_kandidat">No HP</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="nohp_kandidat" id="nohp_kandidat" class="form-control"></td>
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
          url : "<?php echo base_url('M_Kandidat/ambil_data_kandidat')?>",
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
                          + '<td>' + response[i].id_kandidat + '</td>'
                          + '<td>' + response[i].nm_kandidat + '</td>'
                          + '<td>' + response[i].jk_kandidat + '</td>'
                          + '<td>' + response[i].almt_kandidat + '</td>'
                          + '<td>' + response[i].nohp_kandidat + '</td>'
                          + '<td>' + response[i].pendidikan_akhir + '</td>'
                          + '<td>' + response[i].nohp_kandidat + '</td>'
                          + '</tr>';
            }
          $("#tbl_data_kandidat").html(html);
        }
     });
    }

     $('#btn_simpan').on('click', function() {
      var id_kandidat=$('#id_kandidat').val();
      var nm_kandidat=$('#nm_kandidat').val();
      var jk_kandidat=$('#jk_kandidat').val();
      var almt_kandidat=$('#almt_kandidat').val();
      var nohp_kandidat=$('#nohp_kandidat').val();
      var pendidikan_akhir=$('#pendidikan_akhir').val();
      
      $.ajax({
        type : "POST",
        url : "<?php echo base_url('M_Kandidat/simpan_kandidat')?>",
        dataType : "JSON",
        data : {id_kandidat:id_kandidat, nm_kandidat:nm_kandidat, jk_kandidat:jk_kandidat, almt_kandidat:almt_kandidat, nohp_kandidat:nohp_kandidat, pendidikan_akhir:pendidikan_akhir},
        success : function (data) {
          $('[name="id_kandidat"]').val("");
          $('[name="nm_kandidat"]').val("");
          $('[name="jk_kandidat"]').val("");
          $('[name="almt_kandidat"]').val("");
          $('[name="nohp_kandidat"]').val("");
          $('[name="pendidikan_akhir"]').val("");
          tampil_data();
        }
      })
    });
    });



</script>