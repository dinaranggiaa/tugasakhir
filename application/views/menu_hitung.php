<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>COBA COBA</title>
</head>
<body>
	<p>MASUKAN DATA</p>


<?php echo form_open('Checkup/HitungTransaksi')?>
    <label for="nm_pasien">Masukan Angka</label>
    <input type="date" name="tgl_sekarang" id="tgl_sekarang" value="<?php set_value('tgl_sekarang')?>"> x

    <input type="date" name="tgl_checkup" id="tgl_checkup" value="<?php set_value('tgl_checkup')?>">

       <label for="nm_pasien">Masukan Dosis</label>
       <input type="text" name="dosis_tablet" id="dosis_tablet" value="<?php set_value('dosis_tablet')?>"><br>  
            
    <input type='submit' value='hitung' name="hitung">
<?php echo form_close()?>


	<br>

</body>
</html>