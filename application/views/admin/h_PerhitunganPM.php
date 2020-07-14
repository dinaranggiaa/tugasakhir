
<?php $this->view('partials/sidebar_admin')?>

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
			<li><?php echo "<a href='".base_url()."C_ProsesPM/index'>Periode Analisis Penilaian Pelamar</a>"; ?></li>
        <li>Analisis Penilaian Pelamar</li>
      </ul>
</div>


<div class="center-bar">
	<div class="tab">
			<button class="tablinks" onclick="openCity(event, 'Penilaian')">Penilaian Pelamar</button>
			<button class="tablinks" onclick="openCity(event, 'Total')">Perhitungan <i>Profile Matching</i></button>
			<button class="tablinks" onclick="openCity(event, 'Keputusan')">Rekomendasi Pelamar</button>
	</div>

	<div class="hasil-matriks">
		

		<!-- <?php	
				$jml_subkriteria= $jmlsubkriteria['total'];
				$jmlpelamar		= $jmlpelamar['total'];
				$n 				= $jmlsubkriteria['total'];
				$jml_kriteria 	= $jmlkriteria['total'];
				

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
							<td><?= $pelamar[$y]['nm_pelamar']?></td>
								<?php for($z=0; $z<=$jml_subkriteria-1; $z++) {
										$Nilai[$y][$z] = $nilaipelamar[$purut]['nilai_tes'];
										$purut++; ?>
							<td><?=$Nilai[$y][$z]?></td>	
							<?php } ?>
						</tr>
				<?php } ?>
			</thead>
		</table> -->
		
		<!-- <br><br> -->
		<div id="Penilaian" class="tabcontent">
			<h4>Hasil Penilaian Pelamar</h4>
			
			

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
								if($subkriteria[$y]['id_kriteria'] == $kriteria[$x]['id_kriteria']){?>
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
								<th><?=$subkriteria[$x]['nm_subkriteria']?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
						for ($y=0; $y <= ($jmlpelamar-1); $y++) { ?>
							<tr>
								<td><?= $pelamar[$y]['nm_pelamar']?></td>
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
								<td><?= $pelamar[$y]['nm_pelamar']?></td>
										<?php for($z=0; $z<=$jml_subkriteria-1; $z++) { 
												$Nilai[$y][$z] = $gapbobot[$gurut]['gap'];
												$gurut++;?>
								<td><?= $Nilai[$y][$z]?></td>
								<?php } ?>
							</tr>
					<?php }?>
				</thead>
			</table>
		</div>
		
		<div id="Total" class="tabcontent">

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
									<td><?= $pelamar[$y]['nm_pelamar']?></td>
										<?php for($z=0; $z<=$n-1; $z++) {
												$Nilai[$y][$z] = $gapbobot[$turut]['bobot_nilai'];
												$turut++; ?>
									<td><?=$Nilai[$y][$z]?></td>	
									<?php } ?>
								</tr>
						<?php } ?>
					</tbody>
				</table>
			<br>
			<h4>Nilai Total Sub Kriteria</h4>
			<br>
				
			<h4>Nilai Total Kriteria</h4>
			<table class='table-striped'>
				<?php	
					$purut=0;	//Pelamar
					$gurut=0;	//Gap	
				?>
				
				<thead>
					<tr>
						<th></th>
						<?php for ($x=0; $x <= ($jml_kriteria-1); $x++) {?>
						<th><?=$kriteria[$x]['nm_kriteria']?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
						for ($y=0; $y <= ($jmlpelamar-1); $y++) { ?>
							<tr>
								<td><?= $pelamar[$y]['nm_pelamar']?></td>
									<?php for($z=0; $z<=$jml_kriteria-1; $z++) {
											$Nilai[$y][$z] = $total_kriteria[$purut];
											$purut++; ?>
								<td><?=$Nilai[$y][$z]?></td>	
								<?php } ?>
							</tr>
					<?php } ?>
				</thead>
			</table>
		</div>

		<div id="Keputusan" class="tabcontent">
			<h4>Entri Hasil Keputusan</h4>
			<table class='table-striped'>
				<form action="<?php echo base_url()?>index.php/C_ProsesPM/simpan_terpilih" method="POST">

				<input type="hidden" class ="form-control" name="bulan" id="bulan" value="<?= $bulan?>" placeholder="<?= $bulan?>">

				<input type="hidden" class ="form-control" name="tahun" id="tahun" value="<?= $tahun?>" placeholder="<?= $tahun?>">

				<input type="hidden" class ="form-control" name="id_divisi" id="id_divisi" value="<?= $divisi?>" placeholder="<?= $tahun?>">

				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Nilai Akhir</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php for($x=0; $x<$jmlpelamar; $x++){ ?>
						<tr>
							<td><?= $x+1?></td>
							<td>
								<input type="hidden" class ="form-control" name="id_pelamar<?= $x?>" id="id_pelamar<?= $x?>" value="<?php echo $rangking[$x]['id_pelamar']; ?>"><?php echo $rangking[$x]['id_pelamar']; ?>
							</td>
							<td>
								<input type="hidden" class ="form-control" name="nm_pelamar<?= $x?>" id="nm_pelamar"><?php echo $rangking[$x]['nm_pelamar']; ?>
							</td>
							<td>
								<input type="hidden" class ="form-control" name="nilai_akhir<?= $x?>" id="nilai_akhir"><?php echo $rangking[$x]['nilai_akhir']; ?>
							</td>
							<td style="width: 15%;">
								<input type="checkbox" name="status_akhir<?=$x?>" id="status_akhir<?=$x?>" value="1" <?php if($rangking[$x]['status_akhir'] =="1"){echo "checked";}?>> Lolos Seleksi 

						<?php } ?>
							</td>
						</tr>

				</tbody>
			</table>
			<br>
			<table style="float: right; width:10%; border:hidden;" >
                  <tr>
                    <td style="width: 20px; padding-right:10px;">
                        <button type="submit" class="btn btn-success fas fa-save" name="btn_simpan" id="btn_simpan"> Save</button>
                      </form>
                    </td>
                    <td>
                       <button type='reset' class="btn btn-warning fas fa-undo" name='btnbatal' value='BATAL' onclick="javascript:HapusText();"> Cancel</button>
                      </form>
                    </td>
                  </tr>
                </table>
			<br><br>
              </form>
			
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