
<?php $this->view('partials/sidebar_admin')?>

<style>

table {
	font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
	text-align: center;
	margin: auto;
}

table th {
	color: #243f4d;
    font-size: 15px;
	text-align: center;
  }

  .w3-btn {width:150px;}

  label{
	font-weight: normal;
  }
</style>

<div class="center-bar">
	<h3>
		<!-- <i class='far fa-file-alt'></i>&nbsp; -->
		Tabel Perbandingan Kriteria
	</h3> 

  	<div class="border"></div>
	<br>
	
	<div class="inputsearch">
    <?php echo form_open('C_ProsesAHP/hasil_perbandingan')?>
    <button class="btn btn-info" type='submit' href="<?php echo site_url('C_Kriteria/index')?>"><span class="fas fa-eye">&nbsp; Hasil Perbandingan</span></button>
    <?php echo form_close()?>
  </div>

	<?php
      $n = $JmlKriteria['total'];
	?>
	
    <form action="<?php echo base_url()?>index.php/C_ProsesAHP/input_data_perbandingan" method="POST">
	<div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width: 75%; font-size:13px; font-weight:normal;">	
			<thead>
				<tr>
					<th style="width: 25%;">Kriteria Pertama</th>
					<th style="width: 50%;">Penilaian</th>
					<th style="width: 25%;">Kriteria Kedua</th>
				</tr>
			</thead>
			<tbody>
    			<?php
					//inisialisasi
					$urut = 0;

					for ($x=1; $x <= $n; $x++) 
					{
						for ($y=($x+1); $y <= $n ; $y++) 
						{
							$urut++;
				?>
  
  				<tr>
					<td>		
					<input name="kriteria1_<?php echo $x.$y?>" value="<?= $x?>" class="hidden";>
						<label><?php echo $getNamaKriteria[$x-1]['nm_kriteria']; ?></label>
					</td>

					<td>
						<select style="width: 95%" name="nilai_pembanding<?=$x.$y;?>">
							<option checked >--</option>
							<option value="9">9 - Mutlak sangat lebih penting</option>
							<option value="8">8 - Mendekati mutlak dari</option>
							<option value="7">7 - Sangat penting dari</option>
							<option value="6">6 - Mendekati sangat penting dari</option>
							<option value="5">5 - Lebih penting dari</option>
							<option value="4">4 - Mendekati lebih penting dari</option>
							<option value="3">3 - Sedikit lebih penting dari</option>
							<option value="2">2 - Mendekati sedikit lebih penting dari</option>
							<option value="1">1 - Sama penting dengan</option>
							<option value="-2">-2 - Mendekati sedikit lebih penting dari </option>
							<option value="-3">-3 - Sedikit lebih penting dari </option>
							<option value="-4">-4 - Mendekati lebih penting dari </option>
							<option value="-5">-5 - Lebih penting dari </option>
							<option value="-6">-6 - Mendekati sangat penting dari  </option>
							<option value="-7">-7 - Sangat penting dari </option>
							<option value="-8">-8 - Mendekati mutlak dari </option>
							<option value="-9">-9 - Mutlak sangat penting dari </option>
							<!-- <option value="0.5">0.5 - 1 bagi mendekati sedikit lebih penting dari </option>
							<option value="0.333">0.333 - 1 bagi sedikit lebih penting dari </option>
							<option value="0.25">0.25 - 1 bagi mendekati lebih penting dari </option>
							<option value="0.2">0.2 - 1 bagi lebih penting dari </option>
							<option value="0.167">0.167 - 1 bagi mendekati sangat penting dari  </option>
							<option value="0.143">0.143 - 1 bagi sangat penting dari </option>
							<option value="0.125">0.125 - 1 bagi mendekati mutlak dari </option>
							<option value="0.1">0.1 - 1 bagi mutlak sangat penting dari </option> -->
						</select>
					</td>
					
					<td>		
					<input name="kriteria2_<?php echo $x.$y?>" value="<?= $y?>" class="hidden";>
						<label><?php echo $getNamaKriteria[$y-1]['nm_kriteria']; ?></label>
					</td>
					<!-- <td>
						<input name="kriteria2_<?php echo $x.$y?>" value="<?=$getIdKriteria[$y]['id_kriteria']?>" class="text">
						<label><?php echo $getNamaKriteria[$y-1]['nm_kriteria']; ?></label>
						<input name="kriteria2_<?php echo $urut?>" value="<?=$getIdKriteria[$y]['id_kriteria']?>" class="hidden" type="radio">
						<label><?php echo $getNamaKriteria[$y]['nm_kriteria']; ?></label>
					</td>

					<td>
						<input type="text" class ="form-control" name="nilai_pembanding<?php echo $x.$y?>" required>
					</td> -->
				</tr>
				<?php

					}
				}
				?>
			</tbody>
			</table>
			<button type="submit" class="button button1" name="submit" id="btn_simpan" style="float: right; margin-right: 130px;"><i class='fas fa-sync'></i>&nbsp;Process</button>

		</div>
	</div>
	
	</form>
</div>
