<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kandidat extends MY_Controller {

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
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('pagination');

	}

	//Menampilkan Form Pendataan Pasien Terduga Tuberculosis
		function index()
		{
			$this->load->view('admin/f_entrikandidat');
			$this->Pendataan_model->create();
			$this->session->set_flashdata('Sukses_Pendataan','Data Pasien Terduga TBC Tersimpan');
		}

	//Menampilkan seluruh data pasien yang terdaftar sebagai terduga tbc
		function listpasien()
		{
			// $this->load->database();
		//	$jmlpasien = $this->Pendataan_model->jmlpasien(); // total record
			$config['base_url'] = site_url('Pendataan/listpasien'); // site_url
			$config['total_rows'] = $this->db->count_all('register');
			$config['per_page'] = 5; // record yang ditampilkan per halaman
			$config["uri segment"] = 3; // uri parameter
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);


			//Bootstrap -> Style pagination
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close'] = '</ul></nav></div>';
			$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] = '</span></li>';
			$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] = '</span class="sr-only"></span></span></li>';
			$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['next_tag1_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['prev_tag1_close'] = '<span>Next</li>';
			$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['first_tag1_close'] = '</span></li>';
			$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['last_tag1_close'] = '</span></li>';

			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			// panggil function jmlpasien pada model
			$data['pasien'] = $this->Pendataan_model->getListPasien($config['per_page'], $data['page']);

			$data['pagination'] = $this->pagination->create_links();

			//$data['pasien']= $this->Pendataan_model->getListPasien($config['per_page'],$from);
			$this->load->view('pendataan/list_pasien', $data);
		}

	//Menampilkan data sesuai nik pasien yang sudah tedaftar sebagai terduga tbc (Detil)
		function listdata($nik_pasien)
		{

			$data['pasien'] = $this->Pendataan_model->getByNik($nik_pasien);
			$this->load->view('pendataan/list_data', $data);
		}

	//Pencarian data pasien terduga berdasarkan nama
		function search()
		{
			$data['keyword'] = $this->input->post("keyword");
			$data['pasien']= $this->Pendataan_model->getByKeyword($data['keyword'])->result();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view("pendataan/list_pasien", $data);
		}

		/*function search()
		{
			$data['cariberdasarkan'] = $this->input->post('cariberdasarkan');
			$data['keyword'] = $this->input->post('keyword');

			$data['pasien']= $this->Pendataan_model->getByKeyword($data['cariberdasarkan'],$data['keyword'])->result();
			$this->load->view("pendataan/list_pasien", $data);
		}*/

	//Menampilkan form untuk edit data pasien yang sudah terdaftar sebagai terduga tbc (Update)
		function showdata($nik_pasien)
		{

			$data['pasien'] = $this->Pendataan_model->getData($nik_pasien);
			$this->load->view("pendataan/edit_form", $data);

		}

	//Mengupdate Data Pasien Terduga TBC
		function UpdateData()
		{
			$data['pasien'] = $this->Pendataan_model->UpdatePasien($where, $data, $tabel);
			//$this->load->view("Pendataan/list_pasien", $data);
			redirect('Pendataan/listpasien');
		}

	//Menghapus data pasien terduga tbc
		function deleteid($nik_pasien)
		{

			$data['pasien'] = $this->Pendataan_model->delete($nik_pasien);
			redirect('Pendataan/listpasien'); //memanggil controller list pasien
		}
}
