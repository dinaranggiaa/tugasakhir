<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<style>
.demo-table {
  border-collapse: collapse;
  font-size: 17px;
  width: 75%;
  margin-left: 130px;
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
  width: 450px;
}

.but {
    margin-right: 60px;
}
</style>

<div class="center-bar">
    <h3>Hasil Akhir Pengobatan Pasien Tuberculosis</h3>
  <div class="border"></div>

<br><br>


<div class="center-pencarian">
    <?php echo form_open('Hasil_akhir/caridata')?>
      <input class="text pencarian" type="text" name="keyword" id="" placeholder="Input No Faskes / Nama Pasien">
      <input class="button button1" type='submit' value='Cari'>
      <a class = "button button1" href="<?php echo site_url('Hasil_akhir/listpasien')?>">Daftar Transaksi</a>
    <?php echo form_close()?>
</div>
<br><br>

<div class="form-pendataan">
<form action="<?php echo base_url()?>index.php/Hasil_akhir/index" method="POST">
      <fieldset>
            <table class="demo-table" cellspacing="0">

                <tr>
                    <td><label for="id_hasil">No Transaksi</label></td>
                    <td>:</td>
                    <td><input type="text-form" name="id_hasil" placeholder="<?php echo $kode?>" readonly class="form-control">
                        <input type="hidden" name="id_hasil" value="<?php echo $kode?>" id="id_hasil"></td>
                </tr>


                  <tr>
                    <td><label for="nm_pasien">Nama Pasien</label></td>
                    <td>:</td>
                    <td><?php echo $pasientbc['nm_pasien']?></td>
                </tr>

                <tr>
                    <td><label for="no_faskes">No Faskes</label></td>
                    <td>:</td>
                    <td> <?php echo $pasientbc['no_faskes']?>
                    <input type="hidden" name="no_faskes" id="no_faskes" value="<?php echo $pasientbc['no_faskes']?>"></td>
                </tr>

                <tr>
                    <td><label for="tanggal">Tanggal</label></td>
                    <td>:</td>
                    <td><input type="text" class="form-control" readonly name="tanggal" id="tanggal" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo date('Y-m-d')?>"></td>
                </tr>

                 <tr>
                    <td><label for="hasilakhir">Hasil</label></td>
                    <td>:</td>
                    <td>
                        <select name="hasilakhir" id="bulan_ke" class="form-control">
                            <option value="">--PILIH HASIL--</option>
                            <option value="Sembuh">Sembuh</option>
                            <option value="Gagal">Gagal</option>
                            <option value="Meninggal">Meninggal</option>
                            <option value="Lost To Follow Up">Lost To Follow Up</option>
                            <option value="Pengobatan Lengkap">Pengobatan Lengkap</option>
                        </select>
                    </td>
                </tr>

            </table>

              <br><br>
          <div class="but">
            <input type='submit'class="button button4"  name='btnsimpan' id='simpan' value='SIMPAN'> &nbsp;
            <input type='reset' class="button button4" name='btnbatal' value='BATAL' onclick="javascript:HapusText();">
          </div>
          <br><br>

          </form>

          <script type="text/javascript">
              function HapusText()
              {
                document.getElementById("hasilakhir").value="";
              }
          </script>

</div>

</div>
