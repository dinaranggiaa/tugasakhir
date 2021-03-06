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
		$this->load->model('M_Proses');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function dashboard_admin()
	{
		$data['JmlKriteria'] 		= $this->M_Proses->get_jmlkriteria() ;
		$data['JmlSubriteria'] 		= $this->M_Proses->get_jmlsubkriteria() ;
		$data['JmlKaryawan'] 		= $this->M_Proses->get_jmlkaryawan() ;
		$this->load->view("admin/dashboard", $data);
	}

	public function dashboard_manager()
	{
		
		$this->load->view("manager/dashboard");
	}

}
