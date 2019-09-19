<link rel = "stylesheet" type="text/css" href="<?php echo base_url('assets/css/modal-table.css');?>">
<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style type="text/css">
  /* body {
    font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
  } */

  /* Table */
  .demo-table {
    border-collapse: collapse;
    font-size: 17px;
    width: 90%;
    margin: 20px auto;
  }
  .demo-table th,
  .demo-table td {
    border: 1px solid black;
    padding: 7px 17px;
  }
  .demo-table .title {
    caption-side: bottom;
    margin-top: 12px;
  }

  /* Table Header */
  .demo-table thead th {
    background-color: #4CAF50;
    color: #FFFFFF;
    text-align: center;
    border-color: black !important;
    text-transform: capitalize;
  }

  /* Table Body */
  .demo-table tbody td {
    color: #353535;

  }
  .demo-table tbody td:last-child {
    text-align: center;
  }

</style>

<div class="center-bar">
    <h3>Entri Kehadiran Pasien</h3>
  <div class="border"></div>
  <br>

    <table class="demo-table" cellspacing="0" id="dataTable">
        <thead >
           <tr>
                        <th width="5px">No</th>
                        <th width="100px">No Faskes</th>
                        <th width="350px">Nama Pasien</th>
                        <th width="50px">Keterangan</th>
                     </tr>

        </thead>

        <tbody>
            <?php $no=1 ?>
            <?php foreach ($pasientbc as $Pasientbc) : ?>

            <tr>
                <td>
                    <?php echo $no ?>
                </td>

                <td>
                    <?php echo $Pasientbc -> no_faskes ?>
                </td>

                <td>
                    <?php echo $Pasientbc -> nm_pasien ?>
                </td>

                <td>

                  <!-- Button trigger modal -->
                  <button type="button" class = "btn btn-success view_data" id="<?php echo $Pasientbc -> no_faskes; ?>" data-toggle = "modal" data-target = "#myModal<?php echo $Pasientbc -> no_faskes; ?>" >
                     Absensi
                  </button>
                </td>



            <?php $no++?>
            <?php endforeach?>

        </tbody>

    </table>
    <br><br>

    <?php foreach ($pasientbc as $Pasientbc) : ?>
    <!-- Modal -->
<div class = "modal fade" id = "myModal<?php echo $Pasientbc -> no_faskes; ?>" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">

      <div class = "modal-content" id = "myModal">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>

            <h4 class = "modal-title" id = "myModalLabel">

            </h4>
         </div>

         <div class = "modal-body">
            <div id = "fetched_data">
            <form action="<?php echo base_url()?>index.php/Absensi/SimpanAbsensi" method="post">
      <table class="modal-table">
        <tbody>

                <tr>
                    <td><label for="id_checkup">No Transaksi</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="id_checkup" id="id_checkup" value="<?php echo $kode?>" placeholder="<?php echo $kode?>"><?php echo $kode?></td>
                </tr>

                <tr>
                    <td><label for="tanggal">Tanggal</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo date('Y-m-d')?>"><?php echo date('d-m-Y')?></td>
                </tr>

                <tr>
                    <td><label for="no_faskes">No Faskes</label></td>
                    <td>:</td>
                    <td><input type="hidden" name="no_faskes" id="no_faskes" value="<?php echo $Pasientbc -> no_faskes;?>" placeholder="<?php echo $Pasientbc -> no_faskes;?>"><?php echo $Pasientbc -> no_faskes;?></td>
                </tr>

                <input type="hidden" name="no_hp" id="no_hp" value="<?php echo $Pasientbc -> no_hp;?>" placeholder="<?php echo $Pasientbc -> no_hp;?>">
                <input type="hidden" name="no_hp_pmo" id="no_hp_pmo" value="<?php echo $Pasientbc -> no_hp_pmo;?>" placeholder="<?php echo $Pasientbc -> no_hp_pmo;?>">


                <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><?php echo $Pasientbc -> nm_pasien?></td>
                </tr>

               <tr>
                    <td><label>Keterangan</label></td>
                    <td>:</td>
                    <td>
                        <input type='radio' name='keterangan' value='Hadir'<?php if($Pasientbc -> keterangan =="Hadir"){echo "checked";}?>>Hadir &nbsp;
                        <input type='radio' name='keterangan' value='Tidak Hadir'<?php if($Pasientbc -> keterangan =="Tidak Hadir"){echo "checked";}?>>Tidak Hadir
                    </td>
                </tr>
        </tbody>
    </table>



            </div>
         </div>

         <div class = "modal-footer">

            <input type = "submit" class = "btn btn-primary" name = "btnsimpan" value = "Simpan">


         </div>
         </form>
      </div><!-- /.modal-content -->

   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
<?php endforeach?>

    <!-- jQuery JS CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!-- jQuery DataTables JS CDN -->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<!-- Bootstrap JS CDN -->
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<!-- Bootstrap JS CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).on("click", ".btn", function(){
         var no_faskes = $(this).data('no_faskes');
      });

    </script>
    <script src="https://maxcdn/bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</div>
</body>

</html>
