<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('petugas_model');
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

		$cek = $this->petugas_model->cek_login('petugas', $where);
		if($cek) {
			$data_session = array(
				'id' => $cek['id_petugas'],
				'nama' => $cek['nm_petugas'],
				'status' => 'login'
			);

			$this->session->set_userdata($data_session);

			redirect(base_url('Dashboard/index'));

		} else {
			redirect(base_url('Petugas/index'));
		}
	}

	public function register()
	{
		$data['kode'] = $this->petugas_model->idusers();
		$this->load->view('users/register', $data);
	}


	  public function SimpanPetugas()
	  {
	  	$data['kode'] = $this->petugas_model->idpetugas();
		  $data['petugas'] = $this->petugas_model->SimpanPetugas();
		  redirect('Petugas/register', $data);
	  }

		public function lupapass()
		{
			$this->load->view('users/ubah_pass');
		}

		function ubahpassword()
			{
				$data['users'] = $this->petugas_model->ResetPassword($where, $data, $tabel);
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
