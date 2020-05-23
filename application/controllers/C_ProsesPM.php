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
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{

		$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
		$data['tahun']		= $this->M_Pendataan->ambil_data_tahun();
		$this->load->view("admin/P_ProfileMatching", $data);
		
	}

	function proses_alternatif()
	{
		$bulan 					= $this->input->post('bulan');
		$tahun 					= $this->input->post('tahun');
		$data['c_alternatif']	= $this->M_Proses->get_alternatif($bulan, $tahun);
	}

	function proses_pm()
	{
		$bulan 					= $this->input->post('bulan');
		$tahun 					= $this->input->post('tahun');
		// <!--Pengambilan nilai pada database-->
		
		//get data Kriteria dan alternatif
		$getkriteria	= $this->M_Proses->get_kriteria()->result_array();
		$kriteria 		= array();

		foreach ($getkriteria as $row){
			$kriteria[$row['id_kriteria']] = array(
												$row['nm_kriteria'],
												$row['bobot_kriteria'],
												$row['nilai_target'],
												$row['status_kriteria']);
		}
		print_r($kriteria); echo "<br><br>";
		
		
		$getalternatif	= $this->M_Proses->data_alternatif()->result_array();
		$alternatif		= array();
		foreach ($getalternatif as $row){
			$alternatif[$row['id_pelamar']] = array(
												$row['nm_pelamar']);
		}
		print_r($alternatif); echo "<br><br>";

		//get data alternatif join dengan kriteria
		$getsample		= $this->M_Proses->data_penilaian()->result_array();
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
		$gap = array();
		$nilaigap = array();
		foreach ($sample as $id_pelamar => $data){
			// $gap[$id_pelamar] = array();
			foreach($kriteria as $id_kriteria => $val){
				
				
				// print_r ($data[$id_kriteria]);
				// print_r ($val); echo"<br>";
				$gap[$id_pelamar][$id_kriteria] = $data[$id_kriteria]- $val[2];
				// print_r($id_pelamar); echo"   "; print_r($id_kriteria); echo"  =  ";
				// print_r($gap[$id_pelamar][$id_kriteria]); echo"<br><br>";
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
				// print_r($id_pelamar); echo "   "; print_r($id_kriteria); echo " = ";
				// print_r($terbobot[$id_pelamar][$id_kriteria]);
			}
		}
		print_r($terbobot);

		//Mengelompokan CF dan SF
		$hasilpm = array();

		foreach ($kriteria as $id_kriteria => $data){
			// echo "  <br><br> "; print_r($nm_pelamar);
			$cf=$sf=array();
			foreach($data as $id_kriteria => $value){
				
				print_r($value); echo "  <br><br> ";
			}
		}

		
	}


}