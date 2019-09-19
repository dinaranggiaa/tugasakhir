<!DOCTYPE html>
<html>
<head>
	<title>Kartu Identitas Pasien</title>
</head>
<body>

	<img src="assets/img/logo-ppti.jpg" style="position: absolute; width: 60px; height: auto; margin-top: 20px">
	<img src="assets/img/logo-klinik.jpg" style="position: absolute; width: 60px; height: auto; float: right; margin-top: 20px">
	<table style="width: 100%; border: 0px solid black; margin: auto;">
		<tr>
			<td style="text-align: center; border: 0px solid black;">
				<span style="line-height: 1.6; font-weight: bold; font-size: 20px; font-family: sans-serif;">KLINIK UTAMA JRC - PPTI</span><br>
				<span style="line-height: 1.2; font-size: 13px; margin-left: 60px;">(JAKARTA RESPIRATORY CENTRE)</span> 
				<br>
				<span style="line-height: 1.2; font-size: 10px; margin-left: 60px;">Jl.Sultan Iskandar Muda No.66 A, Kebayoran Lama, Jakarta Selatan 12240</span>
				<br>
				<span style="line-height: 1.2; font-size: 10px; margin-left: 60px;">Telp: (021) 7228127</span>
			</td>
		</tr>
	</table>
	<hr style="background-color: black;">
	<p style="text-align: center; font-size: 18px; margin: 10px; margin-top: 20px; font-weight: 580; color: #315857">KARTU IDENTITAS PASIEN TUBERCULOSIS</p>

	<style type="text/css">
		.demo-table {
			  border-collapse: collapse;
			  font-size: 12px;
			  width: 50%;
			  margin: 10px auto;
			  border: 1px solid black;
			}

		.demo-table td:first-child{
		  width: 140px;
		  text-align: left;
		}

		.demo-table td:nth-child(2) {
		  width: 5px;
		  text-align: left;
		}
		.demo-table td:last-child {
			width: 200px;
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

	<table style="width: 75%;" class="demo-table">	

		<tr>
			<td>NIK</td>
			<td>:</td>
			<td><?= $pasientbc['nik_pasien'] ?></td>
		</tr>

		<tr>
			<td>Nama Pasien</td>
			<td>:</td>
			<td><?= $pasientbc['nm_pasien'] ?></td>
		</tr>

		<tr>
			<td>Jenis Kelamin</td>			
			<td>:</td>
			<td><?= $pasientbc['jenkel'] ?></td>
		</tr>

		<tr>
			<td>Umur</td>
			<td>:</td>
			<td><?= $pasientbc['usia'] ?></td>
		</tr>

		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?= $pasientbc['alamat'] ?></td>
		</tr>

		<tr>
			<td>No. Hp</td>
			<td>:</td>
			<td><?= $pasientbc['no_hp'] ?></td>
		</tr>

		<tr>
			<td>Nama Faskes</td>
			<td>:</td>
			<td>Jakarta Respiratory Centre</td>
		</tr>

		<tr>
			<td>No. Reg TB</td>
			<td>:</td>
			<td><?= $pasientbc['no_faskes'] ?></td>
		</tr>

		<tr>
			<td>No. Reg Kab/Kota</td>
			<td>:</td>
			<td>Jakarta Selatan</td>
		</tr>

		<tr>
			<td>Propinsi</td>
			<td>:</td>
			<td>Daerah Khusus Ibukota Jakarta</td>
		</tr>

		<tr>
			<td>Tipe Pasien</td>
			<td>:</td>
			<td><?= $pasientbc['tipe_pasien'] ?></td>
		</tr>

		<tr>
			<td>Klasifikasi Penyakit</td>
			<td>:</td>
			<td><?= $pasientbc['lokasi_anatomi'] ?></td>
		</tr>

		<tr>
			<td>Panduan OAT</td>
			<td>:</td>
			<td><?= $pasientbc['panduan_oat'] ?></td>
		</tr>

		<tr>
			<td>Tanggal Mulai Pengobatan</td>
			<td>:</td>
			<td><?= $pasientbc['tgl_mulai'] ?></td>
		</tr>

	</table>

	<p style="float: right; font-size: 10px;">Printed by : <?= $this->session->userdata('nama'); ?> <br>
		<?= $tgl; ?> WIB</p>

	<br><br>

	<p style="font-size: 10px;">INGAT :</p>
	<ol style="font-size: 10px;">
		<li>Peliharalah kartu anda dan bawa selalu bila datang ke Faskes</li>
		<li>Anda dapat sembuh jika mengikuti aturan pengobatan dengan menelan obat secara teratur</li>
		<li>Penyakit TB dapat menyebar ke orang lain bila tidak diobati</li>
	</ol>
</body>
</html>

    