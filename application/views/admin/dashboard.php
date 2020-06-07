
<?php $this->view('partials/sidebar_admin')?>
<style>
  h3 {
    font-family: sans-serif;
    color: #041a11;
    text-align: center;
  }

  .db-jmlkriteria{
    margin: 90px 10px 30px 250px;
    padding: 5px 8px 0 8px;
    min-height: 100px;
    width: 200px;
    background-color: #ffffff;
    /* border-radius: 10px; */
    font-family: 'Roboto'; 
}

.home-periode{
  padding: 5px 8px 5px 8px;
  width: auto;
  background: #ffffff;
  margin:auto;
}

.dashboard-judul{
  margin: 90px 10px 10px 250px;
  background-color: #ffffff;
  border-radius: 10px;
  font-family: 'Roboto'; 
  
}

.dashboard-visimisi{
  width: 520px;
  min-height: 400px;
  background-color: #ffffff;
  border-radius: 10px;
  position: absolute;
}

.visimisi{
  border-radius: 10px;
  position: absolute;
  padding: 10px 25px 10px 20px;
}

.dashboard-info{
  float: right;
  margin: 0px 10px 30px 520px;
  width: 520px;
  min-height: 300px;
  background-color: #ffffff;
  border-radius: 10px;
  /* font-family: 'Roboto';   */
}

span{
  text-align: justify;
  font-size: 15px;
}

.home-judul{
  width: 500px;
  margin:auto;
  text-align: center;
  background-color: #243f4d;
}

.info-left{
  margin-left: 30px;
  float: left;
  padding-right: 10px;
  position: absolute;
}

.info-right{
  /* border: 1px solid black; */
  margin-left: 270px;
  padding-right: 10px;
  position: absolute;

}

.sub-judul-kriteria{
  color: #ffffff;
  margin-left: 10px;
  margin-top: 15px;
  width: 200px;
  height: 30px;
  text-align: center;
  background-color: #243f4d;
  font-family: sans-serif;
  font-size: 15px;
  padding-top: 5px;
  font-weight: bold;

}

.sub-isi-kriteria{
  color: #243f4d;
  margin-left: 10px;
  height: 60px;
  width: 200px;
  text-align: center;
  background-color: rgba(208, 216, 219, 0.96);
  font-size: x-large;
  padding-top: 10px;

  
}

.sub-judul-subkriteria{
  color: #ffffff;
  margin-left: 10px;
  margin-top: 15px;
  width: 200px;
  height: 30px;
  text-align: center;
  background-color: #243f4d;
  font-family: sans-serif;
  font-size: 15px;
  padding-top: 5px;
  font-weight: bold;
  float: right;
}

.sub-isi-subkriteria{
  color: #243f4d;
  margin-left: 10px;
  height: 60px;
  width: 200px;
  text-align: center;
  background-color: #ffffff;
  float: right;
}

  
  
</style>

<div class="dashboard-judul">

<div class="dashboard-visimisi">
  <div class="home-judul">Visi dan Misi</div>
  <div class="visimisi">
    <h4>Visi :</h4>
    <span>
      <ol>
        <li>Menjadi dealer sepeda motor Honda yang terbaik di Jakarta Selatan</li>
        <li>Menjadi dealer sepeda motor Honda yang terunggul di Jakarta Selatan</li>
        <li>Mempertahankan <i>market share</i> sepeda motor Honda di Jakarta Selatan</li>
      </ol> 
    </span>

    <h4>Misi :</h4>
    <span>
      <ol>
        <li>Memberikan pelayanan terbaik dan informasi yang akurat kepada pelanggan sepeda motor Honda untuk dapat memberikan kepuasan terhadap <i>customer</i></li>
        <li>Menjalin kerja sama yang baik dan sinergis dengan semua organisasi yang berkaitan terhadap kinerja dealer, seperti <i>finance company</i>, main dealer dan AHM selaku produsen</li>
      </ol> 
    </span>
  </div>
    
</div>

<div class="dashboard-info">
  <div class="home-judul">Informasi</div>

  
  <div class='info-left'>

    <div class="sub-judul-kriteria">Jumlah Kriteria</div>
    <div class="sub-isi-kriteria"><?= $JmlKriteria['total'] ?></div>

    <br>
    <div class="sub-judul-kriteria">Jumlah Karyawan</div>
    <div class="sub-isi-kriteria"><?= $JmlKaryawan['total'] ?></div>
  
  </div>

  <div class='info-right'>

    <div class="sub-judul-kriteria">Jumlah Sub kriteria</div>
    <div class="sub-isi-kriteria"><?= $JmlSubriteria['total'] ?></div>

    <br>
    <div class="sub-judul-kriteria">Nilai Profil</div>
    <div class="sub-isi-kriteria"><?= $JmlKriteria['total'] ?></div>

    </div>

</div>

    
    <!-- <div class="home-periode"> -->
      <!-- <h3>SISTEM PENUNJANG KEPUTUSAN PEMILIHAN CALON KARYAWAN <br> PT DEALER HONDA JAYA UTAMA</h3> -->
    <!-- </div> -->
</div>



<!-- <div class="db-jmlkriteria"> 
  <span>Jumlah Kriteria</span>
</div> -->
