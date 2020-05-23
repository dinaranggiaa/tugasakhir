<?php

use PhpParser\Node\Stmt\Echo_;

defined('BASEPATH') OR exit('No direct script access allowed');

class C_ProsesAHP extends MY_Controller {

		/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pendataan');
		$this->load->model('M_Proses');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function input_nilai_perbandingan()
	{

		// $data['JmlKriteria'] 		= $this->M_Proses->getJmlKriteria();
		$data['JmlKriteria'] 		= $this->M_Proses->get_jmlkriteria();
		$data['NmKriteria'] 		= $this->M_Proses->getNamaKriteria()->result_array();
		$data['IdKriteria'] 		= $this->M_Proses->getIdKriteria()->result_array();
		$data['getNamaKriteria']	= $this->M_Proses->getNmKriteria()->result_array();
		$data['getIdKriteria'] 		= $this->M_Proses->getIdKriteria()->result_array();

		$this->load->view("admin/F_NilaiPerbandingan", $data);
		
	}

	function hasil_perbandingan()
	{
		$perbandingan_kriteria = $this->db->count_all('perbandingan_kriteria');
		if($perbandingan_kriteria != 0){
			redirect('C_ProsesAHP/get_hasil_perbandingan');
		} else {
			echo "Data Tidak Ada";
			redirect('C_ProsesAHP/input_nilai_perbandingan');
		}
		
	}

	public function get_hasil_perbandingan()
	{
		$data['JmlKriteria'] 				= $this->M_Proses->get_jmlkriteria();
		$data['NilaiPerbandinganKriteria'] 	= $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		$data['getNamaKriteria'] 			= $this->M_Proses->getNmKriteria()->result_array();

		//Proses Perhitungan AHP
		$nilaiA = $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		
		//Mengubah nilaiA menjadi matriks A
		// $jml_kriteria = 5;
		$jml_kriteria	= $this->db->count_all('kriteria');
		$uruta 			= 0;
		$matriksA 		= array();
		for($i=0; $i<$jml_kriteria; $i++){
			for($j=0; $j<$jml_kriteria; $j++){
				$matriksA[$i][$j] = $nilaiA[$uruta];
				$uruta++;
			}
		}


		//Mengubah nilaiA menjadi matriks B
		$urutb = 0;
		$matriksB = array();
		for($i=0; $i<$jml_kriteria; $i++){
			for($j=0; $j<$jml_kriteria; $j++){
				
				$matriksB[$i][$j] = $nilaiA[$urutb];
				$urutb++;
			}
		}
		
		//Hasil Perkalia Matriks A dan B
		$jml_kriteria = $this->db->count_all('kriteria');

		$hasilkali= array(); //hasil perkalian matriks A dan B
		for($x=0; $x<$jml_kriteria; $x++){
			$tempjml = 0;
			for($y=0; $y<$jml_kriteria; $y++){
				$temp = 0;
				for($z=0; $z<$jml_kriteria; $z++){
					$temp += $matriksA[$x][$z]['nilai_pembanding'] * $matriksB[$z][$y]['nilai_pembanding'];
				}
				$hasilkali[$x][$y] = $temp; //Hasil perkalian matriks
				// echo "hasil kali :";
				$tempjml += $hasilkali[$x][$y];
				
				// echo "hasil kalikali :<br>";
				//  $hasiljumlahkali[$y] = $tempjml;
				
			}
			//Hasil jumlah kali per kolom
			$hasiljumlahkali[$x] = $tempjml;	
			// print_r($hasiljumlahkali[$x] = $tempjml);
		}

		
		//Total perkalian
		$totaljmlkali = 0;
		for($x=0; $x<$jml_kriteria; $x++){
			$totaljmlkali += round($hasiljumlahkali[$x],4);
		}
		
		 

		//Normalisasi eigen vector
		$egienvector = array();
		$jmleigen = 0;
		for($x=0; $x<count($hasiljumlahkali); $x++){
			$hasiljmlkalibagi[$x] = round($hasiljumlahkali[$x]/$totaljmlkali,4); //Hasil egienvector
			$jmleigen += $hasiljmlkalibagi[$x];
			$egienvector[$x] = [$hasiljmlkalibagi[$x]];
		}	
		
		$id_kriteria = $this->M_Proses->getIdKriteria()->result_array();
		// print_r($id_kriteria);
		// print_r($egienvector);
		
		// for($x=0; $x<$jml_kriteria; $x++){
		// 	$bobot = [
		// 		'bobot_kriteria' => $egienvector
		// 	];
			
		// 	$kriteria = [
		// 		'id_kriteria' => $id_kriteria
		// 	];
		// 	print_r($kriteria);
		// }
		// $this->db->update('kriteria', $bobot, $kriteria);
		
		
		//Perhitungan pengujian konsistensi
		//perkalian matriks dengan egien vector
		for($x=0; $x<$jml_kriteria; $x++){
			$matriksxeigen =0;
			for($y=0; $y<$jml_kriteria; $y++){
				// echo "hasilkalibagi<br>";
				// print_r($hasiljmlkalibagi[$y]);
				$matriksxeigen += $matriksA[$x][$y]['nilai_pembanding'] * $hasiljmlkalibagi[$y];
			}
			$hasilmatriksxeigen[$x] = round($matriksxeigen, 4);	
		}
		

		//Consistency Vector
		$CV = array();
		for($x=0; $x<$jml_kriteria; $x++){
			$CV[$x] = round($hasilmatriksxeigen[$x]/$hasiljmlkalibagi[$x], 4);
		}


		//Jumlah Consistency Vector
		$jmlcv = 0;
		$lamdamax = 0;
		for($x=0; $x<count($CV); $x++){
			$jmlcv += $CV[$x];
		}


		$lamdamax = $jmlcv / $jml_kriteria; //Mencari lamda eigen max
		$data['CV'] = $lamdamax;
		
		
		//Menghitung CI
		$CI = ($lamdamax - $jml_kriteria) / ($jml_kriteria - 1);


		//Menghitung CR
		$RI = 0;
		if(count($hasilmatriksxeigen) == 1){
			$RI = 0;
		} elseif(count($hasilmatriksxeigen) == 2){
			$RI = 0;
		} elseif(count($hasilmatriksxeigen) == 3){
			$RI = 0.58;
		} elseif(count($hasilmatriksxeigen) == 4){
			$RI = 0.9;
		} elseif(count($hasilmatriksxeigen) == 5){
			$RI = 1.12;
		} elseif(count($hasilmatriksxeigen) == 6){
			$RI = 1.24;
		} elseif(count($hasilmatriksxeigen) == 7){
			$RI = 1.32;
		} elseif(count($hasilmatriksxeigen) == 8){
			$RI = 1.41;
		} elseif(count($hasilmatriksxeigen) == 9){
			$RI = 1.45;
		} elseif(count($hasilmatriksxeigen) == 10){
			$RI = 1.49;
		} elseif(count($hasilmatriksxeigen) == 11){
			$RI = 1.51;
		} elseif(count($hasilmatriksxeigen) == 12){
			$RI = 1.48;
		} elseif(count($hasilmatriksxeigen) == 13){
			$RI = 1.56;
		} elseif(count($hasilmatriksxeigen) == 14){
			$RI = 1.57;
		} elseif(count($hasilmatriksxeigen) == 15){
			$RI = 1.59;
		}
		$CR = 0;
		$CR = $CI/$RI;
		
		if($CR <= 0.1){
			$pesan = "SUDAH KONSISTEN";
		} else {
			$pesan = "BELUM KONSISTEN";
		}

		//Proses Update Data Kriteria
	

		//Proses AHP
		$data['matriks'] 			= $hasilkali; //hasil perkalian matriks
		$data['sum_row_kriteria'] 	= $hasiljumlahkali; //hasil penjumlahan tiap baris matriks
		$data['total_row'] 			= $totaljmlkali; //total penjumlahan sum_row_kriteria
		$data['eigenvector'] 		= $hasiljmlkalibagi; //eigenvector
		$data['jmleigen']			= $jmleigen;
		//Pengujian Konsistensi
		$data['bobot'] 				= $hasilmatriksxeigen;//Bobot
		$data['CV'] 				= $CV; //hasil data CV tiap kriteria
		$data['sum_cv'] 			= $jmlcv;
		$data['CI'] 				= $CI; //hasil data CI
		$data['CR'] 				= $CR; //hasil data CR
		$data['pesan']				= $pesan;
		$this->load->view("admin/h_PerhitunganAHP", $data);
	}

	//ini udah tidak terpakai 
	function input_perbandingan_kriteria()
	{

		$jml_kriteria = $this->db->count_all('kriteria');
		print_r($jml_kriteria);
		
		$urut=0;		
		$data = array();

		for ($x=1; $x<= $jml_kriteria; $x++) {
			for ($y=1; $y <= $jml_kriteria ; $y++) {	
				
				if($x == $y)
				{
					$item = [
						'id_kriteria1' 		=> $x,
						'id_kriteria2' 		=> $x,
						'nilai_pembanding' 	=> 1
					];
		
					array_push($data, $item);
				} elseif ($x<$y) {
					if($this->input->post('nilai_pembanding',$x,$y) < 1){
						$nilai_pembanding = 1/$this->input->post('nilai_pembanding'.$x.$y);
					} else {
						$nilai_pembanding = $this->input->post('nilai_pembanding'.$x.$y);
					}
					$item = [
						'id_kriteria1' 		=> $this->input->post('kriteria1_'.$x.$y),
						'id_kriteria2' 		=> $this->input->post('kriteria2_'.$x.$y),
						'nilai_pembanding' 	=> $nilai_pembanding
					];
					array_push($data, $item);

				} 
				elseif($x>$y) {
					
					if($this->input->post('nilai_pembanding',$x,$y) < 1){
						$nilai_pembanding = 1/$this->input->post('nilai_pembanding'.$x.$y);
					} else {
						$nilai_pembanding = $this->input->post('nilai_pembanding'.$x.$y);
					}

					$item = [
						'id_kriteria1' 		=> $this->input->post('kriteria2_'.$y.$x),
						'id_kriteria2' 		=> $this->input->post('kriteria1_'.$y.$x),
						'nilai_pembanding' 	=> $this->input->post('nilai_pembanding'.$y.$x)
					];

					array_push($data, $item);
				}
					
			}
		}

		$this->db->empty_table('perbandingan_kriteria', $data);
		$this->db->insert_batch('perbandingan_kriteria', $data);

	}

	function input_data_perbandingan()
	{

		$jml_kriteria = $this->db->count_all('kriteria');
		print_r($jml_kriteria);
		$urut			= 1;
		$item 			= array();
		$nb_kriteria	= array();

		for ($x=1; $x<= $jml_kriteria; $x++) {
			for ($y=1; $y <= $jml_kriteria ; $y++) {	
				
				if($x === $y)
				{		
					$id_kriteria1		= $urut;
					$id_kriteria2 		= $urut;
					$nilai_pembanding 	= 1;

					$nb_kriteria[$x][$y] = ['id_kriteria1' 		=> $id_kriteria1,
											'id_kriteria2' 		=> $id_kriteria2,
											'nilai_pembanding' 	=> $nilai_pembanding];
					$urut++;
					

				} elseif ($x<$y) {
					

					if($this->input->post('nilai_pembanding'.$x.$y) < 0){
						$convertMinus 		= $this->input->post('nilai_pembanding'.$x.$y);
						$nilai_pembanding 	= round(abs(1/$convertMinus),4);
					}else{
						$nilai_pembanding	= $this->input->post('nilai_pembanding'.$x.$y);
					}

					$id_kriteria1			= $this->input->post('kriteria1_'.$x.$y);
					$id_kriteria2 			= $this->input->post('kriteria2_'.$x.$y);		
					$nb_kriteria[$x][$y]	= ['id_kriteria1' 		=> $id_kriteria1,
										 	   'id_kriteria2' 		=> $id_kriteria2,
										 	   'nilai_pembanding' 	=> $nilai_pembanding];
					
					$nilai_banding 			= $this->input->post('nilai_pembanding'.$x.$y);
					
					$nilai_banding_invers	=  ~intval($nilai_banding+1);
					
					if($nilai_banding_invers < 0){
						$nilai_pembanding2 	= abs(1/$nilai_banding);
					} else {
						$nilai_pembanding2	= $nilai_banding_invers+2;	
					}
					$nb_kriteria[$y][$x]	= ['id_kriteria1' 		=> $id_kriteria2,
											   'id_kriteria2' 		=> $id_kriteria1,
												'nilai_pembanding' 	=> $nilai_pembanding2];						
				} 
					
			}
		}
		//data udh disimpan di array, tinggal buat looping baru dengan variabel baru untuk menampung nilai array. baru setelah itu dieksekusi.
		//(Perhitungan -> pengurutan -> insert data)		

		//Proses Penyimpanan
		$jml_kriteria = $this->db->count_all('kriteria');
		print_r($jml_kriteria);
		$data = array();
		$urutan = 1;
		for ($x=1; $x <= $jml_kriteria; $x++) {
			for ($y=1; $y <= $jml_kriteria ; $y++) {

				$urut_kriteria1[$urutan] = $nb_kriteria[$x][$y]['id_kriteria1'];

				$urut_kriteria2[$urutan] = $nb_kriteria[$x][$y]['id_kriteria2'];

				$urut_pembanding[$urutan] = $nb_kriteria[$x][$y]['nilai_pembanding'];
				
				
				$item = [
					'id_kriteria1'		=> $urut_kriteria1[$urutan],
					'id_kriteria2' 		=> $urut_kriteria2[$urutan],
					'nilai_pembanding' 	=> $urut_pembanding[$urutan]
				];
				array_push($data, $item);
				$urutan++;
			}
		}


		$this->db->empty_table('perbandingan_kriteria', $data);
		$this->db->insert_batch('perbandingan_kriteria', $data);

		redirect('C_ProsesAHP/get_hasil_perbandingan');

	}


	public function get_proses_ahp()
	{

		$nilaiA = $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		
		//Mengubah nilaiA menjadi matriks A
		// $jml_kriteria = 5;
		$jml_kriteria	= $this->db->count_all('kriteria');
		$uruta 			= 0;
		$matriksA 		= array();
		for($i=0; $i<$jml_kriteria; $i++){
			for($j=0; $j<$jml_kriteria; $j++){
				$matriksA[$i][$j] = $nilaiA[$uruta];
				$uruta++;
			}
		}
		print_r($matriksA);

		//Mengubah nilaiA menjadi matriks B
		$urutb = 0;
		$matriksB = array();
		for($i=0; $i<$jml_kriteria; $i++){
			for($j=0; $j<$jml_kriteria; $j++){
				
				$matriksB[$i][$j] = $nilaiA[$urutb];
				$urutb++;
			}
		}
		
		//Hasil Perkalia Matriks A dan B
		$jml_kriteria = $this->db->count_all('kriteria');

		$hasilkali= array(); //hasil perkalian matriks A dan B
		for($x=0; $x<$jml_kriteria; $x++){
			$tempjml = 0;
			for($y=0; $y<$jml_kriteria; $y++){
				$temp = 0;
				for($z=0; $z<$jml_kriteria; $z++){
					$temp += $matriksA[$x][$z]['nilai_pembanding'] * $matriksB[$z][$y]['nilai_pembanding'];
				}
				$hasilkali[$x][$y] = $temp; //Hasil perkalian matriks
				// echo "hasil kali :";
				$tempjml += $hasilkali[$x][$y];
				
				// echo "hasil kalikali :<br>";
				//  $hasiljumlahkali[$y] = $tempjml;
				
			}
			//Hasil jumlah kali per kolom
			$hasiljumlahkali[$x] = $tempjml;	
			// print_r($hasiljumlahkali[$x] = $tempjml);
		}

		echo "Hasil Perkalian Matriks : <br>";
		$data['hasilmatriks'] = $hasilkali->result_array();
		print_r($hasilkali); ?><br><br><?php


		echo "Hasil Penjumlahan Tiap Kolom Matriks : <br>";
		$data['sum_row_kriteria'] = $hasiljumlahkali;
		print_r($hasiljumlahkali); ?><br><br><?php

		
		//Total perkalian
		$totaljmlkali = 0;
		for($x=0; $x<$jml_kriteria; $x++){
			$totaljmlkali += round($hasiljumlahkali[$x],4);
		}
		echo "Total baris perkalian matrik : <br>";
		print_r($totaljmlkali); ?><br><br><?php
		$data['total_row'] = $totaljmlkali;
		 

		//Normalisasi eigen vector
		for($x=0; $x<count($hasiljumlahkali); $x++){
			$hasiljmlkalibagi[$x] = round($hasiljumlahkali[$x]/$totaljmlkali,4); //Hasil egienvector
			// print_r($hasiljmlkalibagi[$x]); 
		}
		echo "Eigen Vector <br>";
		print_r($hasiljmlkalibagi); ?> <br><br> <?php
		$data['eigenvector'] = $hasiljmlkalibagi;
		
		//Perhitungan pengujian konsistensi
		//perkalian matriks dengan egien vector
		for($x=0; $x<$jml_kriteria; $x++){
			$matriksxeigen =0;
			for($y=0; $y<$jml_kriteria; $y++){
				// echo "hasilkalibagi<br>";
				// print_r($hasiljmlkalibagi[$y]);
				$matriksxeigen += $matriksA[$x][$y]['nilai_pembanding'] * $hasiljmlkalibagi[$y];
			}
			$hasilmatriksxeigen[$x] = round($matriksxeigen, 4);	
		}
		
		echo "Bobot <br>";
		print_r($hasilmatriksxeigen); ?><br><br> <?php
		$data['bobot'] = $hasilmatriksxeigen;

		//Consistency Vector
		$cv = array();
		for($x=0; $x<$jml_kriteria; $x++){
			$cv[$x] = round($hasilmatriksxeigen[$x]/$hasiljmlkalibagi[$x], 4);
		}
		echo "Consistency Vector (Bobot / Eigen Vector)<br> ";
		print_r($cv);?><br><br> <?php
		$data['CV'] = $cv;


		//Jumlah Consistency Vector
		$jmlcv = 0;
		$lamdamax = 0;
		for($x=0; $x<count($cv); $x++){
			$jmlcv += $cv[$x];
		}
		print_r(round($jmlcv));
		$lamdamax = $jmlcv / $jml_kriteria; //Mencari lamda eigen max
		$data['lamdamax'] = $lamdamax;

		echo "Rata-rata CV : <br>";
		print_r(round ($lamdamax, 4)); ?><br><br> <?php

		
		
		//Menghitung CI
		$CI = ($lamdamax - $jml_kriteria) / ($jml_kriteria - 1);
		echo "Menghitung CI <br>";
		print_r(round ($CI, 4));?><br><br> <?php
		$data['CI'] = $CI;

		//Menghitung CR
		$RI = 0;
		if(count($hasilmatriksxeigen) == 1){
			$RI = 0;
		} elseif(count($hasilmatriksxeigen) == 2){
			$RI = 0;
		} elseif(count($hasilmatriksxeigen) == 3){
			$RI = 0.58;
		} elseif(count($hasilmatriksxeigen) == 4){
			$RI = 0.9;
		} elseif(count($hasilmatriksxeigen) == 5){
			$RI = 1.12;
		} elseif(count($hasilmatriksxeigen) == 6){
			$RI = 1.24;
		} elseif(count($hasilmatriksxeigen) == 7){
			$RI = 1.32;
		} elseif(count($hasilmatriksxeigen) == 8){
			$RI = 1.41;
		} elseif(count($hasilmatriksxeigen) == 9){
			$RI = 1.45;
		} elseif(count($hasilmatriksxeigen) == 10){
			$RI = 1.49;
		} elseif(count($hasilmatriksxeigen) == 11){
			$RI = 1.51;
		} elseif(count($hasilmatriksxeigen) == 12){
			$RI = 1.48;
		} elseif(count($hasilmatriksxeigen) == 13){
			$RI = 1.56;
		} elseif(count($hasilmatriksxeigen) == 14){
			$RI = 1.57;
		} elseif(count($hasilmatriksxeigen) == 15){
			$RI = 1.59;
		}
		$CR = 0;
		$CR = $CI/$RI;
		echo"CR <br>";
		print_r(round ($CR, 4));
		$data['CR'] = $CR;
	
	}


}