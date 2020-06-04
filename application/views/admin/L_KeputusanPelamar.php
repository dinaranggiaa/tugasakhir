<!DOCTYPE html>
<html>
<head>
	<title>Laporan Rekomendasi Pelamar</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
	<table style="margin:auto; border: 0px solid black; width:100% ">
		<tr>
			<th style="border: 0px solid black; width:30%; padding-left:35px;"><img src="assets/img/logo-honda.jpg" style="position: absolute; width: 120px; height: auto; margin-top: 20px;"></th>
			<th style="margin: auto; border: 0px solid black; width:70%">
				<span style="border: 0px solid black; line-height: 1.6; font-weight: bold; font-size: 35px; font-family: sans-serif; padding-top: 0px; color:red; font-family:Verdana, Geneva, Tahoma, sans-serif";>PT JAYA UTAMA MOTOR</span><br>
				<span style="border: 0px solid black; line-height: 1.6; font-weight: bold; font-size: 15px; font-family: sans-serif; padding-top: 0px; color:red; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">DEALER RESMI MOTOR HONDA & AHASS 06986</span><br>
				<span style="border: 0px solid black; line-height: 1; font-weight: normal; font-size: 10px; padding-top: 0px; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Jl. R.C. VETERAN 33-35 JAKARTA, INDONESIA</span><br>
				<span style="border: 0px solid black; line-height: 1; font-weight: normal; font-size: 10px; padding-top: 0px; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">TELP.(021)73771499, 73691158 FAX.(021)7354548</span><br>
				<span style="border: 0px solid black; line-height: 1; font-weight: normal; font-size: 10px; padding-top: 0px; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Email : jmjayamotor@gmail.com / jaya_motor@hotmail.com</span><br>
			</th>
		</tr>
	</table>
	
	<hr style="height: 3px; background-color: black;">

	<style type="text/css">
		.inti {
			border-collapse: collapse;
		}
		.inti th, .inti td {
			border: 1px solid black;
		}
		th {
			text-align: center;
		}
		.inti th, .inti td {
			padding: 3px 15px;
		}
	</style>
	
	<h3 style="text-align: center;">Hasil Keputusan Seleksi Calon Karyawan<br>Periode Bulan <?= $bulan?> Tahun <?= $tahun?></h3>

	<table style="width: 100%; font-size:x-small" class="inti">
		<tr>
			<th style="width: 3%;">No</th>
			<th style="width: 12%;">Kode</th>
			<th style="width: 30%;">Nama</th>
			<th style="width: 20%;">No HP</th>
			<th style="width: 15%;">Nilai Akhir</th>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($pelamar as $row) { ?>

		<tr>
			<td>
				<?= $no; ?>
			</td>

			<td>
				<?= $row -> id_pelamar; ?>
			</td>

			<td>
				<?= $row -> nm_pelamar; ?>
			</td>

			<td>
				<?= $row -> nohp_pelamar; ?>
			</td>

			<td>
				<?= $row -> nilai_akhir; ?>
			</td>
			<?php $no++; ?>
		</tr>
	<?php } ?>
	</table>

	<p style="float: right; font-size: 10px;">Printed by : <?= $this->session->userdata('nama'); ?> <br>
		<?= $tgl; ?> WIB</p>

		<br style="clear: both;"><br><br>

		<style type="text/css">
		    .demo-table {
		        border-collapse: collapse;
		        font-size: 15px;
		        width: 100%;
		        margin: 50px auto;
		        /*border: 1px solid black;*/
		        /*padding: 5px;*/
		      }

		    .demo-table td:first-child{
		      width: 210px;
		      text-align: center;
		    }

		    .demo-table td:nth-child(2) {
		      width: 190px;
		      text-align: left;
		    }
		    .demo-table td:last-child {
		    	width: 210px;
		    	text-align: center;
		    }

		    .demo-table td {
		       /*border: 1px solid #2ed573; */
		      padding: 7px 17px;
		    }
		    /* Table Body */
		    .demo-table tbody td {
		      color: #353535;
		    }
  		</style>

		<table class="demo-table" style="margin: auto;">
			<tr>
				<td style="text-align: center;">
				
					<span>Kepala Cabang</span><br> 
					<span>PT Jaya Utama Motor</span>
					<br> 
					<br> 
					<br> 
					<br>
					<br>
					<br>
					<span>(Lutfi Amin)</span> 
				</td>
			</tr>
		</table>
	</body>
</html>

    