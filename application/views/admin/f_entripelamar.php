<!--SIDE BAR-->
<?php $this->view('partials/sidebar_admin')?>

<style>
  .demo-table tbody td {
    color: #353535;
  }

  input.form-control{
    width: 350px;
  }

  .modal-body td{
    padding: 5px;
  }


</style>
<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Data pelamar</h3> 
  <div class="border"></div>
  
  <br>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"><i class='fas fa-plus'></i>&nbsp;Tambah Data</button>
  
  <div class="inputsearch">
    <!-- <?php echo form_open('C_pelamar/cari_pelamar')?> -->
    <input type="text" name="keyword" id="btn-search" class="form-control" placeholder="Search">
    <input class="button button1" type='submit' name='btncari' value='Cari'>
    <!-- <?php echo form_close()?> -->
  </div>

  <br>
  <br>
  
  <!-- Data pelamar -->
  <div class="panel-body" id="view">
    <?php $this->load->view('admin/f_entripelamar2', array('pelamar'=> $pelamar))?>
            <!-- <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id pelamar</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Pendidikan Akhir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php  $no = $this->uri->segment(3) + 1; ?>
                    <tbody id="tbl_data_pelamar">
                         
                    </tbody>
                </table>
            </div>
        </div> -->
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
              <table>
                <tr>
                  <td><label for="id_pelamar">Kode pelamar</label></td>
                  <td>:</td>
                  <td><input readonly type="text-form" class ="form-control" name="id_pelamar" id="id_pelamar" value="<?php echo $kode?>" placeholder="<?php echo $kode ?>"></td>
                </tr>
                <tr>
                  <td><label for="nm_pelamar">Nama Lengkap</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="nm_pelamar" id="nm_pelamar" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="jk_pelamar">Jenis Kelamin</label></td>
                  <td>:</td>
                  <td><input type="radio" name='jk_pelamar' id="jk_pelamar" value="Wanita">Wanita &nbsp;&nbsp;
                      <input type="radio" name='jk_pelamar' id="jk_pelamar" value="Pria">Pria
                </tr>
                <tr>
                  <td><label for="almt_pelamar">Alamat</label></td>
                  <td>:</td>
                  <td><textarea name='almt_pelamar' id='almt_pelamar' cols='25' rows='3' class="form-control"></textarea></td>
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
              <button type="button" class="btn btn-success fas fa-save" id="btn_simpan"> Simpan</button>
              <button type='reset' class="btn btn-warning fas fa-undo" name='btnbatal' value='BATAL' onclick="javascript:Batal();"> Batal</button>
            </div>
          </div>
        </div>
    </div>

     <!-- Modal Edit Data pelamar -->
  <div class="form-pendataan">
        <!-- Modal -->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><i class='fas fa-user-alt'></i>&nbsp; Edit Data pelamar</h4>
            </div>
            <div class="modal-body">
              <table>
                <tr>
                  <td><label for="id_pelamar">Kode pelamar</label></td>
                  <td>:</td>
                  <td><input type="text" name="id_pelamar_edit" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="nm_pelamar">Nama Lengkap</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="nm_pelamar_edit" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="jk_pelamar">Jenis Kelamin</label></td>
                  <td>:</td>
                  <td><input type="radio" name='jk_pelamar' id="jk_pelamar" value="Wanita">Wanita &nbsp;&nbsp;
                      <input type="radio" name='jk_pelamar' id="jk_pelamar" value="Pria">Pria
                </tr>
                <tr>
                  <td><label for="almt_pelamar">Alamat</label></td>
                  <td>:</td>
                  <td><textarea name='almt_pelamar_edit' cols='25' rows='3' class="form-control"></textarea></td>
                </tr>
                <tr>
                  <td><label for="nohp_pelamar">No HP</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="nohp_pelamar_edit" class="form-control"></td>
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

</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
      
      tampil_data();

      // Menampilkan data pelamar pada table
      function tampil_data() {
        $.ajax({
          url : "<?php echo base_url('C_pelamar/ambil_data_pelamar')?>",
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
                          + '<td>' + response[i].id_pelamar + '</td>'
                          + '<td>' + response[i].nm_pelamar + '</td>'
                          + '<td>' + response[i].jk_pelamar + '</td>'
                          + '<td>' + response[i].almt_pelamar + '</td>'
                          + '<td>' + response[i].nohp_pelamar + '</td>'
                          + '<td>' + response[i].pendidikan_akhir + '</td>'
                          + '<td style="width: 17%;">' + '<span><button data-id="'+response[i].id_pelamar+'" class="btn btn-primary btn_edit"><span class="fas fa-edit"></span></button><button style="margin-left: 5px;" data-id="'+response[i].id_pelamar+'" class="btn btn-danger btn_hapus"><span class="fas fa-trash-alt"></span></button></span>'  + '</td>'
                          + '</tr>';
            }
          $("#tbl_data_pelamar").html(html);
        }
     });
    }
    
    //Menghapus Data 
    $("#tbl_data_pelamar").on('click','.btn_hapus',function(){
            var id_pelamar = $(this).attr('data-id');
            var status = confirm('Yakin ingin menghapus?');
            if(status){
                $.ajax({
                    url: '<?php echo base_url(); ?>C_pelamar/hapus_pelamar',
                    type: 'POST',
                    data: {id_pelamar:id_pelamar},
                    success: function(response){
                        tampil_data();
                    }
                })
            }
        })
 
    //Menyimpan Data Pada Database
     $('#btn_simpan').on('click', function() {
      var id_pelamar=$('#id_pelamar').val();
      var nm_pelamar=$('#nm_pelamar').val();
      var jk_pelamar=$('#jk_pelamar').val();
      var almt_pelamar=$('#almt_pelamar').val();
      var nohp_pelamar=$('#nohp_pelamar').val();
      var pendidikan_akhir=$('#pendidikan_akhir').val();
      
      $.ajax({
        type : "POST",
        url : "<?php echo base_url('C_pelamar/simpan_pelamar')?>",
        dataType : "JSON",
        data : {id_pelamar:id_pelamar, nm_pelamar:nm_pelamar, jk_pelamar:jk_pelamar, almt_pelamar:almt_pelamar, nohp_pelamar:nohp_pelamar, pendidikan_akhir:pendidikan_akhir},
        success : function (data) {
          $('[name="id_pelamar"]').val("");
          $('[name="nm_pelamar"]').val("");
          $('[name="jk_pelamar"]').val("");
          $('[name="almt_pelamar"]').val("");
          $('[name="nohp_pelamar"]').val("");
          $('[name="pendidikan_akhir"]').val("");
          tampil_data();
        }
      })
    });

    $("#tbl_data_pelamar").on('click','.btn_edit',function(){
            var id_pelamar = $(this).attr('data-id');
            $.ajax({
                url: '<?php echo base_url(); ?>C_pelamar/ambil_data_byidpelamar',
                type: 'POST',
                data: {id_pelamar:id_pelamar},
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    $("#editModal").modal('show');
                    $('input[name="id_pelamar_edit"]').val(response[0].id_pelamar);
                    $('input[name="nm_pelamar_edit"]').val(response[0].nm_pelamar);
                    $('input[name="jk_pelamar_edit"]').val(response[0].jk_pelamar);
                    $('input[name="almt_pelamar_edit"]').val(response[0].almt_pelamar);
                    $('input[name="nohp_pelamar_edit"]').val(response[0].nohp_pelamar);
                    $('input[name="pendidikan_akhir_edit"]').val(response[0].pendidikan_akhir);
                }
            })
        });
    $("#btn-search").click(function(){
      
      $.ajax({
        url: '<?php echo base_url(); ?>C_pelamar/cari_pelamar',
        type: 'POST',
        data: {keyword: $("#keyword").val()},
        dataType: "JSON",
        success: function(hasil){
          $("#panel-body").html(hasil);
        }
      });
    });
   });
</script>