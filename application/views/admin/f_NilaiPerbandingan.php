
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

  select.form-control{
  width: 460px;
  margin-right: 10px;
} 

</style>

<div class="navigation" style="border: black;">
    <ul class="breadcrumb">
		<li><?php echo "<a href='".base_url()."Dashboard/dashboard_admin'><i class='fas fa-fas fa-desktop'> &nbsp; </i>Dashboard</a>"; ?></li>
        <li>Entri Perbandingan Kriteria</li>
      </ul>
</div>

<div class="center-bar">
	<h3>
		<i class='far fa-file-alt'></i>&nbsp;
		Entri Perbandingan Kriteria
	</h3> 

  	<div class="border"></div>
	<br>



	<?php $this->load->view('alert')?>

	<?php echo form_open('C_ProsesAHP/input_nilai_perbandingan')?>
	<table>
		<tr>
			<td>
				<select name='id_divisi' id='id_divisi' required class="form-control">
					<?php foreach ($getdivisi as $row) : ?>
						<?php foreach ($divisi as $value) {  
							
							if($row -> id_divisi == $value -> id_divisi) {
								$keterangan = "selected";
							} else {
								$keterangan = "";
							}?> 

							<option <?= $keterangan?> name='id_divisi' value="<?=$value->id_divisi?>"><?= $value->nm_divisi?> </option>;
							
						<?php }?>
				</select>
			</td>
			<td>
				<button type='submit' class="btn btn-primary" id='Tampilkan'><span>View</span></button>
			</td>
		</tr>
	</table>
	
	<?php echo form_close()?>
	<?php endforeach ?>


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
						
						<select required style="width: 95%" name="nilai_pembanding<?=$x.$y;?>">
							<option checked value="">-Pilih Nilai Perbandingan-</option>
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

						</select>
					</td>
					
					<td>		
					<input name="kriteria2_<?php echo $x.$y?>" value="<?= $y?>" class="hidden";>
						<label><?php echo $getNamaKriteria[$y-1]['nm_kriteria']; ?></label>
					</td>
				</tr>
				<?php

					}
				}
				?>
			</tbody>
			</table>

			<?php foreach ($getdivisi as $row) : ?>
				<input type="hidden" class ="form-control" name="id_divisi" id="id_divisi" value="<?php echo $row->id_divisi?>" placeholder="<?php echo $row->id_divisi ?>">
				
			<?php endforeach?>

			<button type="submit" class="button button1" name="submit" id="btn_simpan" style="float: right; margin-right: 130px;"><i class='fas fa-sync'></i>&nbsp;Process</button>

		</div>
	</div>
	
	</form>

</div>
