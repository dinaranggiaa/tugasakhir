
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
		<i class='far fa-file-alt'></i>&nbsp;Hasil Perbandingan Kriteria
	</h3> 

  	<div class="border"></div>
	<br>
	<!-- <div class="container-fluid">
    <div class="table-responsive">

				

          <table class="table table-striped table-hover">
        <tr>
          <th><strong>Kriteria</strong></th>
          <?php foreach ($nama as $key => $value) {
          ?>
          <th><strong><?php echo $value->nm_kriteria ; ?></strong></th>
          <?php  }?>
          
        </tr>
        <?php for ($x = 0; $x < 3; $x++) { ?>
          <tr>
            <th><strong><?= $nama[$x]->nm_kriteria ?></strong></th>
            <?php for ($y = 0; $y < 3; $y++) { ?>
              <?php $val = ($x*5)+$y ?>
              <th><?= $nperbandingan[$val] -> nilai_pembanding ?></th>
            <?php } ?>
          </tr>
        <?php } ?>
    </table>
    

	  

      </div>

  </div>	 -->
  <table>
  <?php
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

    <table>
          <tr>
            <th><strong>Kriteria</strong></th>
            <?php foreach ($nama as $key => $value){
            ?>
            <th><strong><?php echo $value->nm_kriteria ; ?></strong></th>
            <?php  }?>
          </tr>
          <?php for ($i = 0; $i < $n; $i++) { ?>
            <tr>
              <th><strong><?= $nama[$i]->nm_kriteria ?></strong></th>
              <?php for ($j = 0; $j < $n; $j++) { ?>
                <?php $val = ($i*5)+$j ?>
                <th><?= $data1[$val]->nilai_pembanding?></th>
              <?php } ?>
            </tr>
          <?php } ?>
        </table>
</div>