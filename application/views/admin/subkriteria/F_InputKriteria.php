
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
        <li>Entri Perbandingan Sub Kriteria</li>
      </ul>
</div>

<div class="center-bar">
	<h3>
		<i class='far fa-file-alt'></i>&nbsp;
		Entri Perbandingan Sub Kriteria
	</h3> 

  	<div class="border"></div>
	<br>

	<?php $this->load->view('alert')?>
	<?php echo form_open('C_ProsesAHP/tampil_subkriteria')?>
	<table>
		<tr>
			<td>
				<select name='id_kriteria' id='id_kriteria' required class="form-control">
							<option value='' disabled selected>Pilih Kriteria</option>
						<?php foreach ($kriteria as $row) {  ?>
							<option name='id_kriteria' value="<?=$row->id_kriteria?>"><?= $row->nm_kriteria?> </option>;
						<?php }?>
				</select>
			</td>
			<td>
				<button type='submit' class="btn btn-primary" id='Tampilkan'><span>View</span></button>
			</td>
		</tr>
	</table>
	
	<?php echo form_close()?>