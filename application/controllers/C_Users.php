<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_users extends MY_Controller {

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
		$this->load->library('pagination');

	}

	function index()
	{
		$data['kode'] 	= $this->M_Pendataan->get_id_users();
		$data['users'] 	= $this->M_Pendataan->ambil_data_users();
		$this->load->view('manager/F_users', $data);
	}

	function simpan_users()
	{
		$data['users'] = $this->M_Pendataan->simpan_users();
		redirect('C_users/index');
	}

	function hapus_users($id_users)
	{
		$data['users'] = $this->M_Pendataan->hapus_users($id_users);
		redirect('C_users/index');
	}

	function ubah_users()
	{
		$id_user 		= $this->input->post('id_user');
		$nm_user 		= $this->input->post('nm_user');
		$username 		= $this->input->post('username');
		$level 			= $this->input->post('level');
		$password 		= $this->input->post('password');
		
		$data 			= array('nm_user'	=> $nm_user,
								'username' 	=> $username,
								'level' 	=> $level,
								'password' 	=> $password);

		$where 			= array('id_user' 	=> $id_user);

		$data['users']	= $this->M_Pendataan->ubah_users($where, $data, 'users');
		redirect('C_users/index');
	}

	function cari_keyword()
	{
		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode']		= $this->M_Pendataan->get_id_users();
		$data['users']		= $this->M_Pendataan->cari_users($data['keyword']);
		$this->load->view('admin/F_users', $data);
	}
	
		
}
