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
		$data['matriks']					= $this->get_nilai_matriks();
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
		echo "Nilai A: ";
		print_r($nilaiA);
		// $n = $this->M_Proses->get_jmlkriteria();
		$jml_kriteria = 5;
		$uruta = 0;
		$matriksA = array();
		for($i=0; $i<$jml_kriteria; $i++){
			for($j=0; $j<$jml_kriteria; $j++){
				
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
		
		echo 'Matriks B : ';

		$urutc[] = 0;
		$matriksC = array();
		for($i=0; $i<3; $i++){
			for($j=0; $j<3; $j++){
				
				$matriksC[$i][$j] = $urutc;
				$urutc++;
			}
		}
		
		echo 'Matriks C: ';
		// print_r($matriksC);
		

		$matrikshasil = array();
		for($x=0; $x<$jml_kriteria; $x++){
			for($y=0; $y<$jml_kriteria; $y++){
				for($z=1; $z<=$jml_kriteria; $z++){
					//$matrikshasil[$y][$x] = $matriksC[$y][$z] + ($matriksA[$y][$z] * $matriksB[$z][$x]);
				}
			}
		}
		$this->load->view('admin/h_perhitunganAHP', $matriksB);

	}

}