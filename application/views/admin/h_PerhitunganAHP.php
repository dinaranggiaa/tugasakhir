
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
}

th {
  background: #dbd7d7;
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
</style>

<div class="center-bar">
	<h3>
		<i class='far fa-file-alt'></i>&nbsp;Hasil Nilai Perbandingan
	</h3> 

  	<div class="border"></div>
	<br>

  <h4>Matriks Perbandingan Per Kriteria</h4>
  <table style="width: 80%">
	<?php
		$jml_kriteria = $JmlKriteria['total'];
		$n = $JmlKriteria['total'];
		$urutan=0;	
	?>
		<tbody>
			<th>Kriteria</th>
			<?php
				for ($x=0; $x <= ($n-1); $x++) {
					echo "<th>".$getNamaKriteria[$x]['nm_kriteria']."</th>";
				}
			?>
			<?php
				for ($y=0; $y <= ($n-1); $y++) {
					echo "<tr>";
					echo "<td>".$getNamaKriteria[$y]['nm_kriteria']."</td>";
					
							for($z=0; $z<=$n-1; $z++) {
								$Nilai[$y][$z] = $NilaiPerbandinganKriteria[$urutan]['nilai_pembanding'];
								$urutan++;
								echo "<td>".$Nilai[$y][$z]."</td>";								
							}
						
					echo "</tr>";
				}
?>
		</tbody>
	</table>
    
    <br><br>

    <h4>Hasil Perkalian Matriks</h4>
  <table style="width: 80%">
  <?php
	  $jml_kriteria = $JmlKriteria['total'];
	   //Memanggil hasil perkalian matriks
	 
	 
    ?>
			<tbody>
			<th>Kriteria</th>
			<?php
				for ($x=0; $x <= ($n-1); $x++) {
					echo "<th>".$getNamaKriteria[$x]['nm_kriteria']."</th>";
				}
			?>
			<?php
				for ($y=0; $y <= ($n-1); $y++) {
					echo "<tr>";
					echo "<td>".$getNamaKriteria[$y]['nm_kriteria']."</td>";
						
					echo "</tr>";
				}
?>
		</tbody>
	</table>

	<h4>Jumlah Baris</h4>
	<table>
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

	<h4>Eigen Vector Kriteria</h4>
	<table>
		<thead>
			<tr>
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
						<td><?= $getNamaKriteria[$x]['nm_kriteria']?></td>
						<td style="text-align: right"><?= $eigenvector[$x]?></td>					
					<?php } ?>
					</tr>
					<td style="font-weight: bold; background:cornflowerblue;">Total Eigen Vector</td>
					<td style="text-align: right; font-weight: bold; background:cornflowerblue;"><?= round($jmleigen)?></td>
			</tbody>
	</table>

	<h4>Consistency Vector</h4>
	<table>
		<thead>
			<tr>
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
						<td colspan='4' style="font-weight: bold; background:cornflowerblue;">Total Consistency Vector</td>
						<td style="text-align: right; font-weight: bold; background:cornflowerblue;"><?= $sum_cv?></td>
				
			</tbody>
	</table>
	
	<h4>Pengujian Consistency</h4>
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
			<td style="text-align: left; background:cornflowerblue;"><label>Hasil Konsistensi</label></td>
			<td style="text-align: center; font-weight:bold; background:cornflowerblue;"><?= $pesan?></td>
		</tr>
	</table>


</div>