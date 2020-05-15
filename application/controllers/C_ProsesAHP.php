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
		$data['nama'] = $this->M_Proses->get_kriteria1();
		$data['nperbandingan'] = $this->M_Proses->get_nilai_perbandingan();
		
		$data['JmlKriteria'] = $this->M_Proses->getJmlKriteria();
		$data['NilaiPerbandinganKriteria'] = $this->M_Proses->getNilaiPerbandinganKriteria()->result_array();
		$data['getNamaKriteria'] = $this->M_Proses->getNmKriteria()->result_array();
		// print_r($data['NilaiPerbandinganKriteria']);
		$this->load->view("admin/h_PerhitunganAHP", $data);
	}



	

}

