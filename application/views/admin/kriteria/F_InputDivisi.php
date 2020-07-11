
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
							<option value='' disabled selected>Pilih </option>
						<?php foreach ($divisi as $row) {  ?>
							<option name='id_divisi' value="<?=$row->id_divisi?>"><?= $row->nm_divisi?> </option>;
						<?php }?>
				</select>
			</td>
			<td>
				<button type='submit' class="btn btn-primary" id='Tampilkan'><span>View</span></button>
			</td>
		</tr>
	</table>
	
	<?php echo form_close()?>

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
			</table>
		</div>
	</div>