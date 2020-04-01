<!--SIDE BAR-->
<?php $this->view('partials/sidebar_admin')?>

<style>
  .form-pendataan{
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

  .btn-primary{
    float: right;
    margin-right: 25px;
  }

</style>

<div class="center-bar">
  <h3><i class='far fa-folder-open'></i>&nbsp;Data Kandidat</h3> 
  <div class="border"></div>
  <br>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class='fas fa-plus'></i>&nbsp;Tambah Data</button>
  <div class="form-pendataan">
        <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
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
                  <td><label for="kd_kandidat">Kode Kandidat</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="kd_kandidat" id="kd_kandidat" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="nm_kandidat">Nama Lengkap</label></td>
                  <td>:</td>
                  <td><input type="text-form" name="nm_kandidat" id="nm_kandidat" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="jk_kandidat">Jenis Kelamin</label></td>
                  <td>:</td>
                  <td><input type='radio' name='jk_kandidat' value='Pria'>Pria &nbsp;&nbsp;
                  <input type='radio' name='jk_kandidat' value='Wanita'>Wanita</td>
                </tr>
                <tr>
                  <td><label for="almt_kandidat">Alamat</label></td>
                  <td>:</td>
                  <td><textarea name='almt_kandidat' cols='25' rows='3' class="form-control"></textarea></td>
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
              <button type="button" class="btn btn-success">Simpan</button>
              <button type='reset' class="btn btn-warning" name='btnbatal' value='BATAL' onclick="javascript:Batal();">Batal</button>
            </div>
          </div>
        </div>
    </div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Mahasiswa</td>
            <td>Alamat</td>
            <td>Jurusan</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Masuk</td>
            <td>Action</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <button type="button" class="btn btn-info"><i class="far fa-file-alt"></i> Detail </button>
            <button class="btn btn-success btn-sm edit_data"> <i class="fa fa-edit"></i> Edit </button>
            <button class="btn btn-danger btn-sm hapus_data"> <i class="fa fa-trash"></i> Hapus </button>
                </td>
        </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>