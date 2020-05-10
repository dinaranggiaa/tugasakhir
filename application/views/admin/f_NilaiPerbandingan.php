
<?php $this->view('partials/sidebar_admin')?>

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
		<i class='far fa-file-alt'></i>&nbsp;Tabel Nilai Perbandingan
	</h3> 

  	<div class="border"></div>
	<br>
	<?php
      $n = $JmlKriteria['total'];
	?>
	
    <form action="<?php echo base_url()?>index.php/C_ProsesAHP/inputNilaiPerbandingan" method="POST">
		<table>
			<thead>
				<tr>
					<th colspan="2">Pilih yang lebih penting</th>
					<th>Nilai perbandingan</th>
				</tr>
			</thead>
			<tbody>
    			<?php
					//inisialisasi
					$urut = 0;

					for ($x=0; $x <= ($n - 2); $x++) 
					{
						for ($y=($x+1); $y <= ($n - 1) ; $y++) 
						{
							$urut++;
				?>
  
  				<tr>
					<td>			
						<input name="kriteria_<?php echo $urut?>" value="<?=$getIdKriteria[$x]['id_kriteria']?>" class="hidden" checked="" type="radio">
						<label><?php echo $getNamaKriteria[$x]['nm_kriteria']; ?></label>
					</td>
					<td>
						<input name="kriteria_<?php echo $urut?>" value="<?=$getIdKriteria[$y]['id_kriteria']?>" class="hidden" type="radio">
						<label><?php echo $getNamaKriteria[$y]['nm_kriteria']; ?></label>
					</td>

					<td>
						<input type="text" class ="form-control" name="nilai_pembanding<?php echo $x.$y?>" required>
					</td>
				</tr>
				<?php

					}
				}
				?>
			</tbody>
		</table>

		<br><br><input type="submit" name="submit" value="SUBMIT">
	</form>
</div>
