
<?php

use Mpdf\Tag\Td;
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
  font-size: smaller;
}

td{
	text-align: left;
	padding: 10px 5px 10px 5px;
	font-size: smaller;
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
</style>

<div class="center-bar">
	<h3><i class='far fa-file-alt'></i>&nbsp;Hasil Penilaian Pelamar</h3> 
  	<div class="border"></div>
	<br>

	<div class="hasil-matriks">
		<?php	
				$jml_subkriteria= $jmlsubkriteria['total'];
				$jmlpelamar		= $jmlpelamar['total'];
				$n 				= $jmlsubkriteria['total'];
				$jml_kriteria 	= 3;

			?>

		<h4>Nilai Pelamar</h4>
		<table class='table-striped'>
			<?php	

				$purut=0;	//Pelamar
				$gurut=0;	//Gap	
				
			?>
			
			<thead>
				<tr>
					<th style="width:100px;" rowspan="2"></th>
					<?php for ($x=0; $x < $jml_kriteria; $x++) {
							for($y=0; $y< $jml_subkriteria; $y++){ ?>
							<?php 
							$row_count=0;
							$temp = 1;
							if($idsubkriteria[$y]['id_kriteria'] == $idkriteria[$x]['id_kriteria']){?>
									<?php
											$temp++
									?>
									<th><?=$kriteria[$x]['nm_kriteria']?></th>
							<?php	} ?>
						<?php } ?>	
					<?php 
				}?>
				</tr>
				<tr>
					<?php for ($x=0; $x <= ($jml_subkriteria-1); $x++) {?>
							<th><?=$nmsubkriteria[$x]['nm_subkriteria']?></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				
				<?php
					for ($y=0; $y <= ($jmlpelamar-1); $y++) { ?>
						<tr>
							<td><?= $nmpelamar[$y]['nm_pelamar']?></td>
								<?php for($z=0; $z<=$jml_subkriteria-1; $z++) {
										$Nilai[$y][$z] = $nilaipelamar[$purut]['nilai_tes'];
										$purut++; ?>
							<td><?=$Nilai[$y][$z]?></td>	
							<?php } ?>
						</tr>
				<?php } ?>
			</thead>
		</table>
		
		<br><br>
		<h4>Gap Penilaian Pelamar</h4>
		<table class='table-striped'>
			<?php	

				$purut=0;	//Pelamar
				$gurut=0;	//Gap	
			?>
			
			<thead>
				<tr>
					<th style="width:100px;" rowspan="2"></th>
					<?php for ($x=0; $x < $jml_kriteria; $x++) {
							for($y=0; $y< $jml_subkriteria; $y++){ ?>
							<?php 
							$row_count=0;
							$temp = 1;
							if($idsubkriteria[$y]['id_kriteria'] == $idkriteria[$x]['id_kriteria']){?>
									<?php
											$temp++
									?>
									<th><?=$kriteria[$x]['nm_kriteria']?></th>
							<?php	} ?>
						<?php } ?>	
					<?php 
				}?>
				</tr>
				<tr>
					<?php for ($x=0; $x <= ($jml_subkriteria-1); $x++) {?>
							<th><?=$nmsubkriteria[$x]['nm_subkriteria']?></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php
					for ($y=0; $y <= ($jmlpelamar-1); $y++) { ?>
						<tr>
							<td><?= $nmpelamar[$y]['nm_pelamar']?></td>
								<?php for($z=0; $z<=$jml_subkriteria-1; $z++) {
										$Nilai[$y][$z] = $nilaipelamar[$purut]['nilai_tes'];
										$purut++; ?>
							<td><?=$Nilai[$y][$z]?></td>	
							<?php } ?>
						</tr>
				<?php } ?>
						<tr>
							<td style="font-weight: bold; background:#e3dede">Nilai Profile</td>
								<?php for($z=0; $z<=$jml_subkriteria-1; $z++) { ?>						
							<td style="font-weight: bold; background:#e3dede"><?=$ntarget[$z]['nilai_target']?></td>			
							<?php } ?>
						</tr>
				<?php
					for ($y=0; $y <= ($jmlpelamar-1); $y++) { ?>
						<tr>
							<td><?= $nmpelamar[$y]['nm_pelamar']?></td>
									<?php for($z=0; $z<=$jml_subkriteria-1; $z++) { 
											$Nilai[$y][$z] = $gappelamar[$gurut];
											$gurut++;?>
							<td><?= $Nilai[$y][$z]?></td>
							<?php } ?>
						</tr>
				<?php }?>
			</thead>
		</table>
		
		<br><br>
		
		<h4>Bobot Pelamar</h4>
		<table class='table-striped'>
			<?php	
				$turut=0;	//Gap	
			?>
			
			<tbody>
				<th style="width:100px;"></th>
				<?php for ($x=0; $x <= ($jml_subkriteria-1); $x++) {?>
						<th><?=$nmsubkriteria[$x]['nm_subkriteria']?></th>
				<?php } ?>
				<?php
					for ($y=0; $y <= ($jmlpelamar-1); $y++) { ?>
						<tr>
							<td><?= $nmpelamar[$y]['nm_pelamar']?></td>
								<?php for($z=0; $z<=$n-1; $z++) {
										$Nilai[$y][$z] = $bobotpelamar[$turut];
										$turut++; ?>
							<td><?=$Nilai[$y][$z]?></td>	
							<?php } ?>
						</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<br><br>

		<h4>Nilai Total Pelamar</h4>
		<!-- <table style="width: 80%">
		<tbody>
					<?php
						//inisialisasi
						for ($x=0; $x<$jmlpelamar; $x++){ ?>
						<tr>
							<td><?= $nmpelamar[$x]['nm_pelamar']?></td> 
							<td><?= $hasilpm[$x]?></td>
							
						</tr>
						<?php } ?>

						
				</tbody>
		</table> -->
		
		<br><br>

		<h4>Nilai Total Pelamar</h4>

	</div>
</div>