
<?php $this->view('partials/sidebar_admin')?>
<style>
  h5 {
    color: red;
  }
</style>

<div class="center-bar">
    <h5>SISTEM PENUNJANG KEPUTUSAN, PEMILIHAN KARYAWAN</h5>
    <div class="border"></div>
    <br>
    Visi dan Misi 
    <br>
    <?php
      $n = $JmlKriteria['total'];
      
      foreach ($NmKriteria as $row ){

        $pilihan[] = $row['nm_kriteria'];
     }
      
    ?>
    <form method="post">
	<table class="ui celled selectable collapsing table">
		<thead>
			<tr>
				<th colspan="2">pilih yang lebih penting</th>
				<th>nilai perbandingan</th>
			</tr>
		</thead>
		<tbody>
    <?php

	//inisialisasi
	$urut = 0;

	for ($x=0; $x <= ($n - 2); $x++) {
		for ($y=($x+1); $y <= ($n - 1) ; $y++) {

			$urut++;

  ?>
  
  <tr>
				<td>
					<div class="field">
						<div class="ui radio checkbox">
							<input name="pilih<?php echo $urut?>" value="1" checked="" class="hidden" type="radio">
							<label><?php echo $pilihan[$x]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">
						<div class="ui radio checkbox">
							<input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
							<label><?php echo $pilihan[$y]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">

						<input type="text" name="bobot<?php echo $urut?>" required>
					</div>
				</td>
			</tr>
			<?php
		}
	}

	?>

</div>
