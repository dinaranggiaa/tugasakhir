<?php

use PhpParser\Node\Stmt\Echo_;

defined('BASEPATH') OR exit('No direct script access allowed');

class C_ProsesPM extends MY_Controller {

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
		$this->load->library('mypdf');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{

		$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
		$data['tahun']		= $this->M_Pendataan->ambil_data_tahun();
		$this->load->view("admin/P_ProfileMatching", $data);
		
	}

	public function periode_keputusan()
	{
		$bulan 				= $this->input->post('bulan');
		$tahun 				= $this->input->post('tahun');

		$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
		$data['tahun']		= $this->M_Pendataan->ambil_data_tahun();
		$data['pelamar']	= $this->M_Pendataan->rekomendasi_pelamar($bulan, $tahun)->result_array();
		$this->load->view("admin/P_Keputusan", $data);
		
	}

	public function entri_keputusan()
	{
		$bulan 				= $this->input->post('bulan');
		$tahun 				= $this->input->post('tahun');
		$data['bulan']		= $bulan;
		$data['year']		= $tahun;
		$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
		$data['tahun']		= $this->M_Pendataan->ambil_data_tahun();
		$data['pelamar']	= $this->M_Pendataan->rekomendasi_pelamar($bulan, $tahun)->result_array();

		$this->load->view("admin/F_Keputusan", $data);
		
	}

	function simpan_terpilih()
	{
		$bulan				= $this->input->post('bulan');
		$tahun				= $this->input->post('tahun');
		$data['bulan']		= $bulan;
		$data['tahun']		= $tahun;
		$data['tgl'] 		= date('d M Y h:i:s');

		$id_pelamar 	= $this->input->post('status_akhir');

		$status_akhir 	= 1;

		for($x=0; $x<3; $x++){
			
			$id_pelamar 	= $this->input->post('status_akhir'.$x);

			$this->db->set('status_akhir', $status_akhir);
			$this->db->where('id_pelamar', $id_pelamar);
			$this->db->update('hasil_akhir');
		}
	
		redirect('C_ProsesPM/entri_keputusan');
	}

	function proses_alternatif()
	{
		$bulan 					= $this->input->post('bulan');
		$tahun 					= $this->input->post('tahun');
		$data['c_alternatif']	= $this->M_Proses->get_alternatif($bulan, $tahun);

		// <!--Pengambilan nilai pada database-->
		//get data Kriteria
		$getkriteria	= $this->M_Proses->get_kriteria()->result_array();
		$kriteria 		= array();

		foreach ($getkriteria as $row){
			$kriteria[$row['id_kriteria']] = array( 
													$row['id_kriteria'],
													$row['nm_kriteria'],
													$row['bobot_kriteria']);
		}
		print_r($kriteria); echo "<br><br>";
		$data['kriteria'] = $kriteria;

		//get data SubKriteria
		$getsubkriteria	= $this->M_Proses->get_subkriteria()->result_array();
		$subkriteria 		= array();

		foreach ($getsubkriteria as $row){
			$subkriteria[$row['id_subkriteria']] = array( 
													$row['id_kriteria'],
													$row['id_subkriteria'],
													$row['nm_subkriteria'],
													$row['nilai_target'],
													$row['status_subkriteria']);
		}
		print_r($subkriteria); echo "<br><br>";

		//get data alternatif
		$getalternatif	= $this->M_Proses->get_alternatif($bulan, $tahun);
		$alternatif		= array();
		foreach ($getalternatif as $row){
			$alternatif[$row['id_pelamar']] = array($row['nm_pelamar']);
		}
		print_r($alternatif); echo "<br><br>";

		// $ntpelamar	= $this->M_Proses->getnilaialternatif($bulan, $tahun);	
		// $nourut = 0;
		// foreach ($ntpelamar as $row){
		// 	// if(!isset($sample[$row['id_pelamar']])){
		// 	// 	$sample[$row['id_pelamar']] = array();
		// 	// }
		// 	$nilai[$row['id_pelamar']][$row['id_kriteria']] = $row['nilai_tes'];
			
		// 	$nilaites[$nourut] = $nilai[$row['id_pelamar']][$row['id_kriteria']];
		// 	//print_r($nilaites[$nourut]);
		// 	$nourut++;
		// }


		//get data alternatif join dengan kriteria
		$getsample		= $this->M_Proses->data_penilaian($bulan, $tahun)->result_array();
		$sample			= array();
		$hsample		= array();
		$surut			= 0;
		foreach ($getsample as $key => $row){
			// if(!isset($sample[$row['id_pelamar']])){
			// 	$sample[$row['id_pelamar']] = array();
			// }
			$sample[$row['id_pelamar']][$row['id_subkriteria']] = $row['nilai_tes'];
			// print_r($row['id_pelamar']);  echo "  "; print_r($row['id_kriteria']);  echo " = ";
			// print_r($sample[$row['id_pelamar']][$row['id_kriteria']]); echo "<br>";
			$hsample[$surut] = $sample[$row['id_pelamar']][$row['id_subkriteria']];
			$surut++;
		}
		echo "Nilai Sample <br>";
		print_r($sample); echo "<br><br>";

		// <!--Proses Perhitungan-->
		//Menghitung nilai gap
		$gap 	= array();
		$hgap	= array();
		$gurut = 0;
		foreach ($sample as $id_pelamar => $data){
			$gap[$id_pelamar] = array();
			foreach($subkriteria as $id_subkriteria => $val){
				// echo "<br><br>";
				// print_r($data[$id_subkriteria]); echo"  ";
				// print_r($val[3]);  echo" = ";
				$gap[$id_pelamar][$id_subkriteria] 	= $data[$id_subkriteria]- $val[3];
				$hgap[$gurut]						= $gap[$id_pelamar][$id_subkriteria];
				$gurut++;
				
				$gap_nilai 							= $gap[$id_pelamar][$id_subkriteria];
				$this->db->set('gap',$gap_nilai);
				$this->db->where('id_pelamar', $id_pelamar)
						 ->where('id_subkriteria', $id_subkriteria);
				$this->db->update('nilai_alternatif');
			
				//print_r($gap[$id_pelamar][$id_subkriteria]);

			}
		}
		echo "Gap <br>";
		// print_r($hgap); echo "<br>";
		print_r($gap);

		//Menghitung nilai terbobot
		$terbobot 	= array();
		$hterbobot	= array();
		$turut		= 0;
		foreach ($gap as $id_pelamar => $data) {
			$terbobot[$id_pelamar] = array();
			foreach ($data as $id_subkriteria => $value) {
				$ngap = $value;
				$bobot_gap = 0;

				if($ngap == 0){
					$bobot_gap = 5;
				} elseif ($ngap == 1){
					$bobot_gap = 4.5;
				} elseif ($ngap == -1){
					$bobot_gap = 4;
				} elseif ($ngap == 2){
					$bobot_gap = 3.5;
				} elseif ($ngap == -2){
					$bobot_gap = 3;
				} elseif ($ngap == 3){
					$bobot_gap = 2.5;
				} elseif ($ngap == -3){
					$bobot_gap = 2;
				} elseif ($ngap == 4){
					$bobot_gap = 1.5;
				} elseif ($ngap == -4){
					$bobot_gap = 1;
				}

				$terbobot[$id_pelamar][$id_subkriteria] 	= $bobot_gap;
				$hterbobot[$turut] 							= $terbobot[$id_pelamar][$id_subkriteria];
				$turut++;
				$bobot_nilai 								= $terbobot[$id_pelamar][$id_subkriteria];
				$this->db->set('bobot_nilai',$bobot_nilai);
				$this->db->where('id_pelamar', $id_pelamar)
						 ->where('id_subkriteria', $id_subkriteria);
				$this->db->update('nilai_alternatif');

				
				// echo "<br>"; print_r([$id_pelamar]); echo "  "; print_r([$id_subkriteria]); echo "  ";
				// print_r($terbobot[$id_pelamar][$id_subkriteria]); echo "<br>";
				
			}
		}
		echo "<br>terbobot<br>";
		 print_r($terbobot); echo "<br>";
		 //print_r($hterbobot);
		 echo "<br>";echo "<br>";

		$hasil 	= array();
		$hitungcf 	= array();
		$temp = array();
		$id_kriteria = array();
		$cf			= array();
		$sf			= array();
		$hurut		= 0;
		$hasilcf 	= array();
		$hasilsf 	= array();
		foreach($terbobot as $id_pelamar =>$data){
			foreach($data as $id_subkriteria => $value){
				$temp[$id_subkriteria] = $subkriteria[$id_subkriteria][0];
				$id_kriteria[$id_subkriteria] = $temp[$id_subkriteria];

			}
		}
		foreach($terbobot as $id_pelamar =>$data){
			foreach($data as $id_subkriteria => $value){
				$id_kriteria = $subkriteria[$id_subkriteria][0];

				if($subkriteria[$id_subkriteria][4] == 'CF'){
					$cf[$id_kriteria][$id_subkriteria] = $value;
					
				} else {
					$sf[$id_kriteria][$id_subkriteria] = $value;
					
				}
			}

		}

		
		print_r($cf); echo"<br>"; 	print_r($sf);
		for($x=0; $x<=3; $x++){
			
		}
		// echo"<br>";
		// print_r($sf);


		// foreach($terbobot as $id_pelamar => $data){
		// 	foreach($data as $id_subkriteria => $value){
				
		// 		$idkriteria[$id_pelamar][$id_subkriteria] = $subkriteria[$id_subkriteria];
				
		// 		if($idkriteria[$id_pelamar][$id_subkriteria][4] == 'CF'){
		// 			$cf[$id_pelamar][$id_subkriteria] = $value;
		// 			print_r($cf[$id_pelamar][$id_subkriteria]); echo"<br>";
		// 			// print_r($id_pelamar); echo "  "; print_r($id_subkriteria); echo "  ";
		// 			// print_r($cf[$id_pelamar][$id_subkriteria]);  echo "<br>";
					
		// 		} else {
		// 			$sf[$id_pelamar][$id_subkriteria] = $value;
		// 		}
		// 	}

		// 	foreach($subkriteria as $id_subkriteria => $value){
		// 		$hasilpm[$id_pelamar] = array_sum($cf[$id_pelamar])/count($cf[$id_pelamar])*0.6 +  array_sum($sf[$id_pelamar])/count($sf[$id_pelamar])*0.4;
		// 		//echo"<br><br>";print_r($hasilpelamar[$hurut]);
		// 	}
		// 	$hasilpelamar[$hurut] = $hasilpm[$id_pelamar];
		// 	$hurut++;
		// }
		//echo "<br>"; print_r($hasilpm);
		 
		$data['jmlsubkriteria'] = $this->M_Proses->getjmlsubkriteria();
		$data['nmsubkriteria'] 	= $this->M_Proses->getnmsubkriteria()->result_array();
		$data['idsubkriteria'] 	= $this->M_Proses->getidkriteria_sub()->result_array();
		$data['ntarget']		= $this->M_Proses->getntarget()->result_array();
		$data['nmpelamar']	 	= $this->M_Proses->getnmpelamar($bulan, $tahun);
		$data['jmlpelamar'] 	= $this->M_Proses->get_jmlpelamar($bulan, $tahun);
		$data['nilaipelamar'] 	= $this->M_Proses->getnilaialternatif($bulan, $tahun);	
		$data['nilaipelamar'] 	= $this->M_Proses->getnilaialternatif($bulan, $tahun);
		$data['kriteria']		= $this->M_Proses->NmKriteria();
		$data['idkriteria']		= $this->M_Proses->getIdKriteria()->result_array();
		$data['subkriteria']	= $subkriteria;
		$data['pelamar'] 		= $alternatif;
		$data['getsample']		= $getsample;
		//$data['npelamar'] 		= $ntespelamar;
		$data['gappelamar'] 	= $hgap;
		$data['bobotpelamar'] 	= $hterbobot;
		//$data['hasilpm'] 		= $hasilpelamar;
		$this->load->view("admin/h_PerhitunganPM", $data);

	}

	function proses_pm()
	{

		$bulan 					= $this->input->post('bulan');
		$tahun 					= $this->input->post('tahun');
		$divisi					= $this->input->post('id_divisi');

		//Pakai Divisi
		//$data['c_alternatif']	= $this->M_Proses->get_alternatif($bulan, $tahun, $divisi);
		
		//Gapake Divisi
		$data['c_alternatif']	= $this->M_Proses->get_alternatif($bulan, $tahun);
		// <!--Pengambilan nilai pada database-->
		
		//get data Kriteria dan alternatif
		$getsubkriteria		= $this->M_Proses->get_kriteria()->result_array();
		$data['nmkriteria'] = $getsubkriteria;
		print_r($getsubkriteria);
		$kriteria 		= array();

		foreach ($getsubkriteria as $row){
		// 	$kriteria[$row['id_kriteria']] = array(
		// 										$row['id_divisi'],
		// 										$row['id_kriteria'],
		// 										$row['nilai_target'],
		// 										$row['status_kriteria']);
		// }

		$kriteria[$row['id_kriteria']] = array(
											$row['id_kriteria'],
											$row['nm_kriteria'],
											$row['nilai_target'],
											$row['status_kriteria']);
								}
		print_r($kriteria); echo "<br><br>";
		
		
		//$getalternatif	= $this->M_Proses->get_alternatif($bulan, $tahun, $divisi);
		$getalternatif	= $this->M_Proses->get_alternatif($bulan, $tahun);
		$alternatif		= array();
		foreach ($getalternatif as $row){
			$alternatif[$row['id_pelamar']] = array(
												$row['nm_pelamar']);
		}
		print_r($alternatif); echo "<br><br>";

		//get data alternatif join dengan kriteria
		$getsample		= $this->M_Proses->data_penilaian($bulan, $tahun)->result_array();
		$sample			= array();
		foreach ($getsample as $row){
			//get id pelamar
			if(!isset($sample[$row['id_pelamar']])){
				$sample[$row['id_pelamar']] = array();
			}
			$sample[$row['id_pelamar']][$row['id_kriteria']] = $row['nilai_tes'];
		}
		echo "Nilai : <br>";
		print_r($sample); echo "<br><br>";

		// <!--Proses Perhitungan-->
		//Menghitung nilai gap
		$gap 	= array();

		foreach ($sample as $id_pelamar => $data){
			// $gap[$id_pelamar] = array();
			foreach($kriteria as $id_kriteria => $val){
				
				
				// print_r ($data[$id_kriteria]);
				// print_r ($val); echo"<br>";
				$gap[$id_pelamar][$id_kriteria] = $data[$id_kriteria]- $val[2];
				print_r($id_pelamar); echo"   "; print_r($id_kriteria); echo"  =  ";
				print_r($gap[$id_pelamar][$id_kriteria]); echo"<br><br>";
			}
		}
		print_r($gap);

		//Menghitung nilai terbobot
		$terbobot = array();
		foreach ($gap as $id_pelamar => $data) {
			$terbobot[$id_pelamar] = array();
			foreach ($data as $id_kriteria => $value) {
				// print_r($value);
				print_r($value[$id_kriteria]);
				$ngap = $value;
				$bobot_gap = 0;

				if($ngap == 0){
					$bobot_gap = 5;
				} elseif ($ngap == 1){
					$bobot_gap = 4.5;
				} elseif ($ngap == -1){
					$bobot_gap = 4;
				} elseif ($ngap == 2){
					$bobot_gap = 3.5;
				} elseif ($ngap == -2){
					$bobot_gap = 3;
				} elseif ($ngap == 3){
					$bobot_gap = 2.5;
				} elseif ($ngap == -3){
					$bobot_gap = 2;
				} elseif ($ngap == 4){
					$bobot_gap = 1.5;
				} elseif ($ngap == -4){
					$bobot_gap = 1;
				}

				$terbobot[$id_pelamar][$id_kriteria] = $bobot_gap;

		
				// echo "<br>Nilai<br>"; 
				print_r($id_pelamar); echo "   "; print_r($id_kriteria); echo " = ";
				print_r($terbobot[$id_pelamar][$id_kriteria]); echo " <br> ";
			}
		}
		echo "<br>terbobot<br>";
		print_r($terbobot);
		echo "<br><br>";

		$hasilpm 	= array();
		$cf			= array();
		$sf			= array();
		$hasilcf 	= array();
		$hasilsf 	= array();
		foreach($terbobot as $id_pelamar => $data){
			
			foreach($data as $id_kriteria => $value){
				$idkriteria[$id_pelamar][$id_kriteria] = $kriteria[$id_kriteria];
				//print_r($idkriteria[$id_pelamar][$id_kriteria]); echo"<br>";
				if($idkriteria[$id_pelamar][$id_kriteria][3] == 'CF'){
					$cf[$id_pelamar][$id_kriteria] = $value;
					// print_r($id_pelamar); echo"  ";
					// print_r($id_kriteria); echo"  ";
					// print_r($cf[$id_pelamar][$id_kriteria]);echo"<br>";
					
				} else {
					$sf[$id_pelamar][$id_kriteria] = $value;
					// print_r($id_pelamar); echo"  ";
					// print_r($id_kriteria); echo"  ";
					// print_r($sf[$id_pelamar][$id_kriteria]);echo"<br>";
				}
			}

			foreach($kriteria as $id_kriteria => $value){
				print_r($cf[$id_pelamar]); echo "<br><br>";
				$hasilcf[$id_pelamar] = array_sum ($cf[$id_pelamar])*0.1;
				
				//$hasilpm = array_sum($hasilcf[$id_pelamar]) + ($hasilsf[$id_pelamar]);
				//print_r($hasilpm[$id_pelamar]); echo"<br>";
			}

		}
		// print_r($hasilcf);
		// print_r($hasilsf); echo " = ";
		// print_r($hasilpm); echo "<br><br>";
		
		// echo" CF "; print_r($cf);echo"<br><br>";
		// echo" SF "; print_r($sf);
		
	}
	
	


}