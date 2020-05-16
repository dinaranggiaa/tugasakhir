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
		$data['matriks'] 	= $this->M_Proses->get_nilai_perbandingan();
		
		$data['JmlKriteria'] = $this->M_Proses->getJmlKriteria();
		$data['NilaiPerbandinganKriteria'] = $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		$data['getNamaKriteria'] = $this->M_Proses->getNmKriteria()->result_array();
		// print_r($data['NilaiPerbandinganKriteria']);
		$this->load->view("admin/h_PerhitunganAHP", $data);
	}

	function get_nilai_perbandingan()
	{

		$nilaiA = $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		echo "Nilai A: ";
		print_r($nilaiA);
		$n = 3;
		$uruta = 0;
		$matriksA = array();
		for($i=0; $i<$n; $i++){
			for($j=0; $j<$n; $j++){
				
				$matriksA[$i][$j] = $nilaiA[$uruta];
				$uruta++;
			}
		}

		?> <br><br><br><?php
		echo 'Matriks A: ';
		print_r($matriksA);
		
		$urutb = 0;
		$matriksB = array();
		for($i=0; $i<3; $i++){
			for($j=0; $j<3; $j++){
				
				$matriksB[$i][$j] = $nilaiA[$urutb];
				$urutb++;
			}
		}
		?> <br><br><br><?php
		echo 'Matriks B : ';
		print_r($matriksB);

		$urutc[] = 0;
		$matriksC = array();
		for($i=0; $i<3; $i++){
			for($j=0; $j<3; $j++){
				
				$matriksC[$i][$j] = $urutc;
				$urutc++;
			}
		}
		?> <br><br><br><?php
		echo 'Matriks C: ';
		print_r($matriksC);
		

		$matrikshasil = array();
		for($x=0; $x<$n; $x++){
			for($y=0; $y<$n; $y++){
				for($z=1; $z<=$n; $z++){
					$matrikshasil[$y][$x] = $matriksC + ($matriksA[$y][$z] * $matriksB[$z][$x]);
				}
			}
		}
		?> <br><br><br><br><?php
		echo "Hasil : ";
		print_r($matrikshasil);

	}

}