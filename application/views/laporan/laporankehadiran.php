<!DOCTYPE html>
<html>
<head>
	<title>Laporan Kehadiran Checkup</title>
</head>
<body>

	<img src="assets/img/logo-ppti.jpg" style="position: absolute; width: 100px; height: auto; margin-top: 20px">
	<img src="assets/img/logo-klinik.jpg" style="position: absolute; width: 100px; height: auto; float: right; margin-top: 20px">
	<table style="width: 100%; border: 0px solid black; margin: auto;">
		<tr>
			<td style="text-align: center; border: 0px solid black;">
				<span style="line-height: 1.6; font-weight: bold; font-size: 37px; font-family: sans-serif;">KLINIK UTAMA JRC - PPTI</span><br>
				<span style="line-height: 1.2; font-size: 20px; margin-left: 100px;">(JAKARTA RESPIRATORY CENTRE)</span> 
				<br>
				<span style="line-height: 1.2; font-size: 13px; margin-left: 100px;">Jl.Sultan Iskandar Muda No.66 A, Kebayoran Lama, Jakarta 		Selatan 12240</span>
				<br>
				<span style="line-height: 1.2; font-size: 13px; margin-left: 100px;">Telp: (021) 7228127</span>
			</td>
		</tr>
	</table>
	<br>
	<hr style="height: 4px; background-color: black;">
	<hr style="height: 1px; background-color: black;">

	<p style="text-align: center; font-size: 25px; margin: 10px;">Laporan <br> Kehadiran Checkup Pasien Tuberculosis</p>
	<p style="text-align: center; margin-top: 0px;">Periode <?= $tglawal ?> s/d <?= $tglakhir?></p>

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
	<br>
	<table style="width: 100%;" class="inti">
		<tr>
			<th>No</th>
			<th>No. Faskes</th>
			<th>Nama Pasien</th>
			<th>Tgl Mulai Pengobatan</th>
			<th>Total Checkup</th>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($kehadiran as $row) { ?>

		<tr>
			<td>
				<?= $no; ?>
			</td>

			<td>
				<?= $row -> no_faskes; ?>
			</td>

			<td>
				<?= $row -> nm_pasien; ?>
			</td>

			<td>
				<?= $row -> tgl_mulai; ?>
			</td>

			<td>
				<?= $row -> total; ?>
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

		<table class="demo-table">
			<tr>
				<td>
					<span>Pimpinan</span><br> 
					<span>Klinik Jakarta Respiratory Centre</span>
				</td>
				<td style="color: white;">
					<!-- <span>Pimpinan</span><br> 
					<span>Klinik Jakarta Respiratory Centre</span></td> -->
				<td>
					<span>Petugas Pojok DOTS</span><br> 
					<span>Klinik Jakarta Respiratory Centre</span>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="text-align: center;">(dr. Ika Herniyanti)</td>
				<td></td>
				<td>(<?= $this->session->userdata('nama')?>)</td>
			</tr>
		</table>
</body>
</html>

    