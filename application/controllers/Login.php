<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Users');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index()
	{
		$this->load->view('users/login');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);

		$cek = $this->M_Users->cek_login('users', $where);
		if($cek) {
			$data_session = array(
				'id' => $cek['id_user'],
				'nama' => $cek['nm_user'],
				'username' => $cek['username'],
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
			redirect(base_url('Login/index'));
		}
	}

	public function register()
	{
		$data['kode'] = $this->petugas_model->idpetugas();
		$this->load->view('users/register', $data);
	}


	  public function SimpanPetugas()
	  {
	  	$data['kode'] = $this->petugas_model->idpetugas();
		  $data['petugas'] = $this->petugas_model->SimpanPetugas();
		  redirect('C_Users/register', $data);
	  }

		public function lupapass()
		{
			$this->load->view('users/ubah_pass');
		}

		function ubahpassword()
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data = array(
					'username' => $username,
					'password' => $password
				);
				$where = array('username' => $username);

				$data['user'] = $this->M_Users->ResetPassword($where, $data, 'users');
				redirect('Login/lupapass');
			}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Login/index'));
	}

}
