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
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function NilaiPerbandingan()
	{

		$data['JmlKriteria'] = $this->M_Pendataan->getJmlKriteria();
		$data['NmKriteria'] = $this->M_Pendataan->getNamaKriteria()->result_array();
		// print_r($data['NmKriteria']);
		$data['IdKriteria'] = $this->M_Pendataan->getIdKriteria()->result_array();
		$data['getNamaKriteria'] = $this->M_Pendataan->getNmKriteria()->result_array();
		$data['getIdKriteria'] = $this->M_Pendataan->getIdKriteria()->result_array();
		$this->load->view("admin/f_NilaiPerbandingan", $data);
		
	}

	public function inputNilaiPerbandingan()
	{
		$this->M_Pendataan->inputDataPerbandinganKriteria();
		redirect('C_ProsesAHP/getNilaiPerbandinganKriteria');
	}

	public function getNilaiPerbandinganKriteria()
	{
		$data['JmlKriteria'] = $this->M_Pendataan->getJmlKriteria();
		$data['NilaiPerbandinganKriteria'] = $this->M_Pendataan->getNilaiPerbandinganKriteria()->result_array();
		$data['getNamaKriteria'] = $this->M_Pendataan->getNmKriteria()->result_array();
		// print_r($data['NilaiPerbandinganKriteria']);
		$this->load->view("admin/h_PerhitunganAHP", $data);
	}



	

}

