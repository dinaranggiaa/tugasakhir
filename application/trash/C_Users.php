<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Users extends MY_Controller 
{

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
			redirect(base_url('C_Users/index'));
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
				$data['petugas'] = $this->M_Users->ResetPassword($where, $data, $tabel);
				//$this->load->view("Pendataan/list_pasien", $data);
				redirect('Login/lupapass');
			}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Login/index'));
	}

}
