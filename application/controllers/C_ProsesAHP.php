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

		$data['JmlKriteria'] = $this->M_Proses->getJmlKriteria();
		$data['NmKriteria'] = $this->M_Proses->getNamaKriteria()->result_array();
		// print_r($data['NmKriteria']);
		$data['IdKriteria'] = $this->M_Proses->getIdKriteria()->result_array();
		$data['getNamaKriteria'] = $this->M_Proses->getNmKriteria()->result_array();
		$data['getIdKriteria'] = $this->M_Proses->getIdKriteria()->result_array();
		$this->load->view("admin/F_NilaiPerbandingan", $data);
		
	}

	public function inputNilaiPerbandingan()
	{
		$this->M_Proses->inputDataPerbandinganKriteria();
		redirect('C_ProsesAHP/getNilaiPerbandinganKriteria');
	}

	public function getNilaiPerbandinganKriteria()
	{
		// $data['nama'] = $this->M_Proses->get_kriteria1();
		$data['nperbandingan'] = $this->M_Proses->get_nilai_perbandingan();
		$data['matriks'] = $this->M_Proses->get_nilai_perbandingan();
		
		$data['JmlKriteria'] = $this->M_Proses->getJmlKriteria();
		$data['NilaiPerbandinganKriteria'] = $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		$data['getNamaKriteria'] = $this->M_Proses->getNmKriteria()->result_array();
		// print_r($data['NilaiPerbandinganKriteria']);
		$this->load->view("admin/h_PerhitunganAHP", $data);
	}

	function get_nilai_perbandingan()
	{

		$A = $this->M_Proses->get_nilai_perbandingan();
		print_r($A);

		$a[1][1] = 2; $a[1][2] = 2; $a[1][3] = 1;
		$a[2][1] = 1; $a[2][2] = 2; $a[2][3] = 3;
		$a[3][1] = 3; $a[3][2] = 2; $a[3][3] = 0;

		$b[1][1] = 2; $b[1][2] = 4;
		$b[2][1] = 2; $b[2][2] = 2;
		$b[3][1] = 1; $b[3][2] = 1;

		$c[1][1] = 0; $c[1][2] = 0;
		$c[2][1] = 0; $c[2][2] = 0;
		$c[3][1] = 0; $c[3][2] = 0;

		$baris_matriks_a = 3;
		$kolom_matriks_a = 3;
		$baris_matriks_b = 3;
		$kolom_matriks_b = 2;
		$baris_matriks_c = 3;
		$kolom_matriks_c = 2;


		/* inilah loop yang melakukan proses perkalian matriks */
		for ($j = 1; $j <= $kolom_matriks_b; $j++) {
		for ($i = 1; $i <= $baris_matriks_a; $i++) {
			for ($k = 1; $k <= $kolom_matriks_a; $k++) {
			$c[$i][$j] = $c[$i][$j] + ($a[$i][$k] * $b[$k][$j]);
			// print_r($c[$i][$j]);?><br><?php
			}
		}
		}

	// 	$nilaiA = $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
	// 	$n = 3;
	// 	$urut = 0;
	// 	$matriksA = array();
	// 	for($i=1; $i<=$n; $i++){
	// 		for($j=1; $j<=$n; $j++){
	// 			$urut++;
	// 			$matriksA[$i][$j] = $nilaiA;
	// 		}
	// 	}
		
	// 	$matriksB = array();
	// 	for($i=1; $i<=$n; $i++){
	// 		for($j=1; $j<=$n; $j++){
	// 			$urut++;
	// 			$matriksB[$i][$j] = $nilaiA;
	// 		}
	// 	}

	// 	$matriksC = array();

	// 	for($x=1; $x<=$n; $x++){
	// 		for($y=1; $y<=$n; $y++){
	// 			for($z=1; $z<=$n; $z++){
	// 				$matriksC[$y][$x] = $matriksC[$y][$z] + ($matriksA[$y][$z] * $matriksB[$z][$x]);
	// 				print_r($matriksC[$y][$x]);
	// 			}
	// 		}
	// 	}

	}



	

}

