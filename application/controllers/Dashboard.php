<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

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
		$this->load->model('Pendataan_model');
		$this->load->model('petugas_model');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function dashboard_admin()
	{
		$data['pasientbc'] = $this->petugas_model->JmlPasienTBC();
		$data['terdugatbc'] = $this->petugas_model->JmlTerduga();
		$data['pasienmangkir'] = $this->petugas_model->PasienMangkir();
		$this->load->view("admin/dashboard", $data);
	}

	public function dashboard_manager()
	{
		$data['pasientbc'] = $this->petugas_model->JmlPasienTBC();
		$data['terdugatbc'] = $this->petugas_model->JmlTerduga();
		$data['pasienmangkir'] = $this->petugas_model->PasienMangkir();
		$this->load->view("manager/dashboard", $data);
	}

	function informasi()
	{
		$data['informasi'] = $this->Pendataan_model->JmlPasienTBC();
		$data['informasi'] = $this->Pendataan_model->JmlTerduga();
		print_r($data);
		$this->load->view("admin/dashboard", $data);

	}

	function pasienmangkir()
	{
		$data['pasienmangkir'] = $this->Pendataan_model->PasienMangkir();
		$this->load->view("petugas/dashboard", $data);
	}

}
