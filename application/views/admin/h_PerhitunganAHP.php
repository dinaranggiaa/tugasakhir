
<?php

use PhpParser\Node\Stmt\Echo_;

$this->view('partials/sidebar_admin')?>

<style>

table, td, th {
  text-align: center;
  border: 1px solid #ccc;
  width: 20px;
  
}

table {
  border-collapse: collapse;
  padding-left: 10px;
  text-align: center;
  width: 100%;
}

th {
  background: #f4f1f1;
  padding: 10px 5px 10px 5px;
  font-size: 13px;
}

td{
	text-align: left;
	padding: 5px 5px 5px 5px;
	font-size: 13px;
	text-align: center;
	
}


input[type=text], select {
  width: 95%;
  padding: 10px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  align-items: center;
}

/* Style the tab */
.tab {
  overflow: hidden;
  /* border: 1px solid #ccc; */
  background-color: #d0d8da;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #b5babb;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #b5babb;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}


</style>


<div class="navigation" style="border: black;">
    <ul class="breadcrumb">
		<li><?php echo "<a href='".base_url()."Dashboard/dashboard_admin'><i class='fas fa-fas fa-desktop'> &nbsp; </i>Dashboard</a>"; ?></li>
		<li><?php echo "<a href='".base_url()."C_ProsesAHP/input_nilai_perbandingan'>Entri Perbandingan Kriteria</a>"; ?></li>
        <li>Hasil Perhitungan AHP</li>
      </ul>
</div>

<div class="center-bar">
	<!-- <h3>
		<i class='far fa-file-alt'></i>&nbsp;Hasil Nilai Perbandingan
	</h3> 

	<div class="border"></div>
	<br> -->
	<div class="tab">
			<button class="tablinks" onclick="openCity(event, 'proses')">Proses Analytical Hierarchy Process</button>
			<button class="tablinks" onclick="openCity(event, 'pengujian')">Pengujian Analytical Hierarchy Process</button>
	</div>
	
	<div class="hasil-matriks">
		<div id="proses" class="tabcontent">
		
			<h4>Matriks Perbandingan Per Kriteria</h4>
			<table style="width: 100%">
				<?php
					$jml_kriteria = $JmlKriteria['total'];
					$n = $JmlKriteria['total'];
					$urutan=0;	
					
				?>
					<tbody>
						<th style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px;">Kriteria</th>
						<?php
							for ($x=0; $x <= ($n-1); $x++) { ?>
								<th><?= $getNamaKriteria[$x]['nm_kriteria']?></th>
						<?php } ?>
						<?php
							for ($y=0; $y <= ($n-1); $y++) { ?>
								<tr>
									<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px;  text-align:left;"><?= $getNamaKriteria[$y]['nm_kriteria']?></td>
										<?php for($z=0; $z<=$n-1; $z++) { 
											$Nilai[$y][$z] = $NilaiPerbandinganKriteria[$urutan]['nilai_pembanding'];
											$urutan++; ?>
									<td><?= $Nilai[$y][$z]?></td>								
										<?php }?>
									
								</tr>
						<?php } ?>
					</tbody>
				</table>
				
				<br>

				<h4>Hasil Perkalian Matriks</h4>
				<table style="width: 100%">
				<?php
					$jml_kriteria = $JmlKriteria['total'];
					$n = $JmlKriteria['total'];
					$urutan=0;	
					
				?>
					<tbody>
						<th style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px;">Kriteria</th>
						<?php
						for ($x=0; $x <= ($n-1); $x++) { ?>
						<th><?= $getNamaKriteria[$x]['nm_kriteria']?></th>
						<?php } ?>
						<th><label>Jumlah Baris</label></th>
						<?php
							for ($y=0; $y <= ($n-1); $y++) { ?>
								<tr>
									<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px; text-align:left">
										<?=$getNamaKriteria[$y]['nm_kriteria']?>
									</td>
										<?php for($z=0; $z<=$n-1; $z++) {
											$Nilai[$y][$z] = $matriks[$urutan];
											$urutan++; ?>
									<td><?=$Nilai[$y][$z]?></td>								
							<?php } ?>		
							<td style="text-align:right"><?= $sum_row_kriteria[$y]?></td>
								</tr>
						<?php }?>
								<tr>
									<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px; text-align:center">Total Baris</td>
									<?php for($z=0; $z<=$n-1; $z++){?> 
										<td style="background: #f4f1f1;"></td>
										<?php } ?>
									<td style="font-weight: bold; text-align:right; background: #f4f1f1;"><?= $total_row?></td>
								</tr>
					</tbody>
				</table>

				<br>

				<h4>Eigen Vector Kriteria</h4>
				<form action="<?php echo base_url()?>index.php/C_ProsesAHP/simpan_eigenvector" method="POST">
				<table style="width: 50%;">
					<thead>
						<tr style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px; padding-left:15px;">
							<th style="width: 60%;"><label>Nama Kriteria</label></th>
							<th><label>Eigen Vector</label></th>
						</tr>
					</thead>
						<tbody>
							<?php
								//inisialisasi
								$urut = 0;

								for ($x=0; $x < $jml_kriteria; $x++) 
								{?>	
									<tr>
									<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px; text-align:left;"><?= $getNamaKriteria[$x]['nm_kriteria']?>
										<input type="hidden" class ="form-control" name="id_kriteria<?= $x?>" id="id_kriteria" value="<?= $getIdKriteria[$x]['id_kriteria']?>">
									</td>
									<td style="text-align: right">
										<?= $eigenvector[$x]?>
										<input type="hidden" class ="form-control" name="bobot_kriteria<?= $x?>"id="bobot_kriteria" value="<?= $eigenvector[$x]?>">
									</td>					
								<?php } ?>
								</tr>
								<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px; text-align:center">Total Eigen Vector</td>
								<td style="text-align: right; font-weight: bold; background:#f4f1f1;"><?= $jmleigen?></td>
						</tbody>
				</table>
		</div>
	</div>
	
			<!-- <h4>Jumlah Baris</h4>
			<table style="width: 50%">
				<thead>
					<tr>
						<th><label>Kriteria</label></th>
						<th><label>Jumlah Baris</label></th>
					</tr>
				</thead>
					<tbody>
						<?php
							//inisialisasi
							$urut = 0;

							for ($x=0; $x < $jml_kriteria; $x++) {?>	
								<tr>
									<td><?= $getNamaKriteria[$x]['nm_kriteria']?></td>
									<td style="text-align:right"><?= $sum_row_kriteria[$x]?></td>
							<?php } ?>
								</tr>
								<td style="font-weight: bold; background:cornflowerblue;">Total Baris</td>
								<td style="font-weight: bold; background:cornflowerblue; text-align:right"><?= $total_row?></td>
						
					</tbody>
			</table>
			
			<br> -->
	<div class="hasil-matriks">		
		<div id="pengujian" class="tabcontent">
				<!-- <h4>Consistency Vector</h4>
				<table>
					<thead>
						<tr style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px;">
							<th><label>Bobot</label></th>
							<th><label>:</label></th>
							<th><label>Eigen Vector</label></th>
							<th><label>=</label></th>
							<th><label>Consistency Vector</label></th>
						</tr>
					</thead>
						<tbody>
							<?php
								//inisialisasi
								$urut = 0;

								for ($x=0; $x < $jml_kriteria; $x++) 
								{?>	
									<tr>
										<td style="text-align: center"><?= $bobot[$x]?></td>
										<td style="text-align: center">:</td>
										<td style="text-align: center"><?= $eigenvector[$x]?></td>
										<td style="text-align: center">=</td>
										<td style="text-align: right;"><?= $CV[$x]?></td>
								<?php } ?>
									</tr>
									<td colspan='4' style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px; text-align:center">Total Consistency Vector</td>
									<td style="text-align: right; font-weight: bold; background:#f4f1f1;"><?= $sum_cv?></td>
							
						</tbody>
				</table> -->

				<h4>Hasil Pengujian Consistency</h4>
					<table>
						<?php
							$CV = $sum_cv;
							$CI = $CI;
							$CR = $CR; 
						?>
						<!-- <tr>
							<td><label>Consistency Vector</label></td>
							<td style="text-align: center; font-weight:bold;"><?= round($CV,4)?></label></td>
						</tr> -->
						<tr>
							<td><label>Consistency Index</label></td>
							<td style="text-align: center; font-weight:bold;"><?= round($CI,4)?></td>
						</tr>
						<tr>
							<td><label>Consistency Ratio</label></td>
							<td style="text-align: center; font-weight:bold;"><?= round($CR,4)?></td>
						</tr>
						<tr>
							<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px; text-align:center"><label>Hasil Konsistensi</label></td>
							<td style="text-align: center; font-weight: bold; background:#f4f1f1;"><?= $pesan?></td>
						</tr>
					</table>

					<table style="float: right; width:10%; border:hidden; padding-bottom:10px;" >
						<tr>
							<td style="width: 20px; padding-right:10px; border:hidden;">
									<button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
								</form>
							</td>
							<td style="width: 20px; padding-right:10px; padding-top:7px; border:hidden;">
							<?php foreach($getdivisi as $value) { ?>
								<input type="hidden" id="id_divisi" name="id_divisi" value="<?php $value -> id_divisi?>"> 
								
								<form action="<?php echo site_url('index.php/C_ProsesAHP/input_nilai_kembali/'.$value -> id_divisi)?>">		
									<?php }
									?>
									<button type="submit" class="btn btn-warning fa fa-arrow-left" > Back</button>
								</form>
							</td>
						  </tr>
                	</table>	
					<br><br>
				</div>
		</div>
	</div>


<script>
	function openCity(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
}
</script>