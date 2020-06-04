
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
  width: 50%;
  padding-left: 10px;
  text-align: center;
  margin: auto;
}

th {
  background: #f4f1f1;
  padding: 10px 0px 10px 0px;
}

td{
	text-align: left;
	padding-left: 10px;
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

h4{
	text-align: center;
}

.button-footer{
	margin:auto;
}


</style>

<div class="center-bar">
	<h3>
		<i class='far fa-file-alt'></i>&nbsp;Hasil Nilai Perbandingan
	</h3> 

	<div class="border"></div>
	<br>

	<div class="hasil-matriks">
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
								<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px;"><?= $getNamaKriteria[$y]['nm_kriteria']?></td>
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
								<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px;">
									<?=$getNamaKriteria[$y]['nm_kriteria']?>
								</td>
									<?php for($z=0; $z<=$n-1; $z++) {
										$Nilai[$y][$z] = $matriks[$urutan];
										$urutan++; ?>
								<td><?=round($Nilai[$y][$z],4)?></td>								
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

			<h4>Eigen Vector Kriteria</h4>
			<form action="<?php echo base_url()?>index.php/C_ProsesAHP/simpan_eigenvector" method="POST">
			<table style="width: 50%;">
				<thead>
					<tr style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px;">
						<th><label>Nama Kriteria</label></th>
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
								<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px;"><?= $getNamaKriteria[$x]['nm_kriteria']?>
									<input type="hidden" class ="form-control" name="id_kriteria<?= $x?>" id="id_kriteria" value="<?= $getIdKriteria[$x]['id_kriteria']?>">
								</td>
								<td style="text-align: right">
									<?= $eigenvector[$x]?>
									<input type="hidden" class ="form-control" name="bobot_kriteria<?= $x?>"id="bobot_kriteria" value="<?= $eigenvector[$x]?>">
								</td>					
							<?php } ?>
							</tr>
							<td style="background: #f4f1f1; font-weight:bold; padding-top:5px; padding-bottom:5px; text-align:center">Total Eigen Vector</td>
							<td style="text-align: right; font-weight: bold; background:#f4f1f1;"><?= round($jmleigen)?></td>
					</tbody>
			</table>

			<br>

			<h4>Consistency Vector</h4>
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
			</table>
			
			<br>

			<h4>Hasil Pengujian Consistency</h4>
			<table>
				<?php
					$CV = $sum_cv;
					$CI = $CI;
					$CR = $CR; 
				?>
				<tr>
					<td><label>Consistency Vector</label></td>
					<td style="text-align: center; font-weight:bold;"><?= round($CV,4)?></label></td>
				</tr>
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
			<br>
			<div class="modal-footer">
				<div class ="button-footer">
					
				<table style="float: right; width:10%; border:hidden;" >
					<tr>
						<td style="width: 20px;">
								<button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
							</form>
						</td>
						<td>
							<form action="<?php echo base_url()?>index.php/C_ProsesAHP/input_nilai_perbandingan">
								<button type="submit" class="btn btn-warning fas fa-undo" > Cancel</button>
							</form>
						</td>
					</tr>
				</table>
					
				</div>
				
			</div>
	</div>               
</div>