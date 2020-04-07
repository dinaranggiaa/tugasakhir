<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index()
	{
		$this->load->view('login');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);

		$cek = $this->petugas_model->cek_login('users', $where);
		if($cek) {
			$data_session = array(
				'id' => $cek['id_users'],
				'nama' => $cek['nm_users'],
				'level' => $cek['level'],
				'status' => 'login'
			);

			$this->session->set_userdata($data_session);

			if($this->session->userdata('level')=='Admin'){
				redirect(base_url('Dashboard/dashboard_admin'));
			} elseif($this->session->userdata('level')=='Manager'){
				redirect(base_url('Dashboard/dashboard_manager'));
			}
		} else {
			redirect(base_url('Petugas/index'));
		}
	}

	public function register()
	{
		$data['kode'] = $this->petugas_model->idpetugas();
		$this->load->view('petugas/register', $data);
	}


	  public function SimpanPetugas()
	  {
	  	$data['kode'] = $this->petugas_model->idpetugas();
		  $data['petugas'] = $this->petugas_model->SimpanPetugas();
		  redirect('Petugas/register', $data);
	  }

		public function lupapass()
		{
			$this->load->view('petugas/ubah_pass');
		}

		function ubahpassword()
			{
				$data['petugas'] = $this->petugas_model->UbahPassword($where, $data, $tabel);
				//$this->load->view("Pendataan/list_pasien", $data);
				redirect('Petugas/lupapass');
			}

	public function logout()
	{
		// unset($_SESSION['Username']);
		// $this->load->view('petugas/login');
		$this->session->sess_destroy();
		redirect(base_url('petugas/index'));
	}

}
