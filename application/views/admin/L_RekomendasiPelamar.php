<!DOCTYPE html>
<html>
<head>
	<title>Laporan Rekomendasi Pelamar</title>
</head>
<body>
	<table style="margin:auto; border: 0px solid black; ">
		<tr>
			<th style="border: 0px solid black; width:20%;"><img src="assets/img/logo-ppti.jpg" style="position: absolute; width: 80px; height: auto; margin-top: 10px"></th>
			<th style="margin: auto; border: 0px solid black; width:70%">
				<span style="border: 0px solid black; line-height: 1.6; font-weight: bold; font-size: 26px; font-family: sans-serif; padding-top: 0px;">PT DEALER HONDA JAYA UTAMA</span><br>
				<span style="border: 0px solid black; line-height: 1.6; font-weight: normal; font-size: 13px; padding-top: 0px;">Jl. R.C. Veteran No.33-35 Bintaro Jakarta Selatan, Indonesia</span><br>
				<span style="border: 0px solid black; line-height: 1.6; font-weight: normal; font-size: 13px; padding-top: 0px;">Telp: (021) 722812</span><br>
			</th>
			<th style="border: 0px solid black; width:20%;"><img src="assets/img/logo-klinik.jpg" style="position: absolute; width: 80px; height: auto; float: right; margin-top: 10px"></th>
		</tr>
	</table>
	
	<hr style="height: 3px; background-color: black;">
	<?php foreach ($periode as $row): { ?>
		<p style="text-align: center; font-size: 25px; margin: 10px;">Laporan Rekomendasi Pelamar <br> Periode <?= $row -> bulan ?></p>
	<?php }?>
	<?php endforeach?>
	
	<!-- <p style="text-align: center; margin-top: 0px;">Periode <?= $tglawal ?> s/d <?= $tglakhir?></p> -->

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
			<th>Kode Pelamar</th>
			<th>Nama Pelamar</th>
			<th>No HP Pelamar</th>
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
					<span>PT Dealer Honda Jaya Utama</span>
					<br> 
					<br> 
					<br> 
					<br>
					<br>
					<br>
					<span>(Luthfi Amin)</span> 
				</td>
			</tr>
		</table>
	</body>
</html>

    