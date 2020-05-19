<?php
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

	public function NilaiPerbandingan()
	{

		// $data['JmlKriteria'] 		= $this->M_Proses->getJmlKriteria();
		$data['JmlKriteria'] 		= $this->M_Proses->get_jmlkriteria();
		$data['NmKriteria'] 		= $this->M_Proses->getNamaKriteria()->result_array();
		$data['IdKriteria'] 		= $this->M_Proses->getIdKriteria()->result_array();
		$data['getNamaKriteria']	= $this->M_Proses->getNmKriteria()->result_array();
		$data['getIdKriteria'] 		= $this->M_Proses->getIdKriteria()->result_array();
		$data['get_ahp']			= $this->get_nilai_matriks();
		$this->load->view("admin/F_NilaiPerbandingan", $data);
		
	}

	public function inputNilaiPerbandingan()
	{
		$this->M_Proses->inputDataPerbandinganKriteria();
		redirect('C_ProsesAHP/getNilaiPerbandinganKriteria');
	}

	public function getNilaiPerbandinganKriteria()
	{
		// $data['nperbandingan'] 				= $this->M_Proses->get_nilai_perbandingan();
		// $data['matriks'] 					= $this->M_Proses->get_nilai_perbandingan();
		$data['JmlKriteria'] 				= $this->M_Proses->get_jmlkriteria();
		$data['NilaiPerbandinganKriteria'] 	= $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		$data['getNamaKriteria'] 			= $this->M_Proses->getNmKriteria()->result_array();
		$this->load->view("admin/h_PerhitunganAHP", $data);
	}

	function input_perbandingan_kriteria()
	{

		// $n = $this->M_Proses->getJmlKriteria();
		// $n = $this->M_Proses->get_jmlkriteria();
		$jml_kriteria = 5;
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
					
					if($this->input->post('nilai_pembanding') < 1){
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
					
					if($this->input->post('nilai_pembanding') < 1){
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

		redirect('C_ProsesAHP/getNilaiPerbandinganKriteria');
	}

	function get_nilai_matriks()
	{

		$nilaiA = $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		
		//Mengubah nilaiA menjadi matriks A
		$jml_kriteria = 5;
		$uruta = 0;
		$matriksA = array();
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

		// $hasilkali = array();
		// for($x=0; $x<$jml_kriteria; $x++){
		// 	$tempjml = 0;
		// 	for($y=0; $y<$jml_kriteria; $y++){
		// 		$temp = 0;
		// 		for($z=0; $z<$jml_kriteria; $z++){
		// 			// $temp[$y][$x] += ($matriksA[$y][$z]['nilai_pembanding'] * $matriksB[$z][$x]['nilai_pembanding']);
		// 		}
		// 		$hasilkali[$x][$y] = $temp;
		// 		// print_r($hasilkali[$x][$y]); ?> <br><br><?php
		// 		$tempjml += $hasilkali[$x][$y];
		// 		$hasiljumlahkali[$y] = $tempjml;
		// 	}
		// 	//Hasil jumlah kali per kolom
		// 	$hasiljumlahkali[$x] = $tempjml;
		// }
		// // echo "Matriks Hasi <br>";
		// // print_r($temp);


		
		//Hasil Perkalia Matriks A dan B
		$jml_kriteria = 5;
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
		print_r($hasilkali); ?><br><br><?php


		echo "Hasil Penjumlahan Tiap Kolom Matriks : <br>";
		print_r($hasiljumlahkali); ?><br><br><?php

		
		//Total perkalian
		$totaljmlkali = 0;
		for($x=0; $x<$jml_kriteria; $x++){
			$totaljmlkali += $hasiljumlahkali[$x];
		}
		echo "Total baris perkalian matrik : <br>";
		print_r($totaljmlkali); ?><br><br><?php
		 

		//Normalisasi eigen vector
		for($x=0; $x<count($hasiljumlahkali); $x++){
			$hasiljmlkalibagi[$x] = $hasiljumlahkali[$x]/$totaljmlkali; //Hasil egienvector
			// print_r($hasiljmlkalibagi[$x]); 
		}
		echo "Eigen Vector <br>";
		print_r($hasiljmlkalibagi); ?> <br><br> <?php

		//Perhitungan pengujian konsistensi
		
		//perkalian matriks dengan egien vector
		for($x=0; $x<$jml_kriteria; $x++){
			$matriksxeigen =0;
			for($y=0; $y<$jml_kriteria; $y++){
				// echo "hasilkalibagi<br>";
				// print_r($hasiljmlkalibagi[$y]);
				$matriksxeigen += $matriksA[$x][$y]['nilai_pembanding'] * $hasiljmlkalibagi[$y];
			}
			$hasilmatriksxeigen[$x] = $matriksxeigen;	
		}
		
		echo "Matriks x Eigen <br>";
		print_r($hasilmatriksxeigen); ?><br><br> <?php

		//Consistency Vector
		$cv = array();
		for($x=0; $x<$jml_kriteria; $x++){
			$cv[$x] = $hasilmatriksxeigen[$x]/$hasiljmlkalibagi[$x];
		}
		echo "Consistency Vector <br>";
		print_r($cv); ?><br><br> <?php


		//Jumlah Consistency Vector
		$jmlcv = 0;
		$lamdamax = 0;
		for($x=0; $x<count($cv); $x++){
			$jmlcv += $cv[$x];
		}
		$lamdamax = $jmlcv / $jml_kriteria; //Mencari lamda eigen max

		echo "Rata-rata CV : <br>";
		print_r($lamdamax); ?><br><br> <?php

		
		
		//Menghitung CI
		$CI = ($lamdamax - $jml_kriteria) / ($jml_kriteria - 1);
		echo "Menghitung CI <br>";
		print_r($CI); ?><br><br> <?php

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
		print_r($CR);

		
	}


}