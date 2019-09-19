<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	/*public function index()
	{

 		$this->load->Model('master_model');
		$this->load->view('index', $data);

	}


	public function register(){

		$this->load->helper('form');
		$this->load->Model('master_model');

	}*/

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master_model');
		$this->load->helper('url');
		/*"session_start();*/
	}

	function index()
	{
		$this->load->helper('form');
		$this->load->view('index');
		$this->Master_model->create();

		/*if(isset($_POST['btnsimpan'])){
			$values = array(
				'nik_pasien' => $this->input->post('nik_pasien'),
				'nm_pasien' => $this->input->post('nm_pasien'),
				'no_bpjs' => $this->input->post('no_bpjs'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'jenkel' => $this->input->post('jenkel'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'tinggi_bdn' => $this->input->post('tinggi_bdn'),
				'berat_bdn' => $this->input->post('berat_bdn'),
			);

			$values1 = array(
				'nik_pasien' => $this->input->post('nik_pasien'),
				'id_register' => $this->input->post('id_register'),
				'no_rm'=> $this->input->post('no_rm')
				);

			$this->db->set($values);
			$this->db->insert('pasien');
			$this->db->set($values1);
			$this->db->insert('register');*/

			/*echo '<script>alert("Berhasil di simpan!");history.go(0);</script>';*/
		}


	public function dashboard()
	{

		$this->load->view('petugas/dashboard');
	}

}
