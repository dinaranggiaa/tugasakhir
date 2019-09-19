<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_diabetes extends MY_Controller {

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

	function index()
	{
		$data['kode'] = $this->Pendataan_model->getIdTesDM();
		$data['diabetes'] = $this->Pendataan_model->SimpanDiabetes();
		$this->load->view('cekdiabetes/form_cekdiabetes', $data);
	}

	//Pencarian Hasil diabetes Pasien
		function listdiabetes()
		{
			// $this->load->database();
		//	$jmlpasien = $this->Pendataan_model->jmlpasien(); // total record
			$config['base_url'] = site_url('Cek_diabetes/listdiabetes'); // site_url
			$config['total_rows'] = $this->db->count_all('diabetes');
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
			$data['diabetes'] = $this->Pendataan_model->getListdiabetes($config['per_page'], $data['page']);

			$data['pagination'] = $this->pagination->create_links();

			//$data['pasien']= $this->Pendataan_model->getListPasien($config['per_page'],$from);
			$this->load->view('cekdiabetes/listdiabetes', $data);

		}


	//Mencari data pasien tbc berdasarkan nama [form diabetes]
		function caridata()
		{
			$data['kode'] = $this->Pendataan_model->getIdTesDM();
			$data['keyword'] = $this->input->post("keyword");
			$data['pasientbc']= $this->Pendataan_model->getByName($data['keyword'])->row_array();
			$this->load->view("cekdiabetes/form_cekdiabetes2", $data);
		}

	//Menghapus Transaksi diabetes berdasarkan nomor faskes
		function deleteid($id_tesdm)
		{
			$data['diabetes'] = $this->Pendataan_model->DeleteDM($id_tesdm);
			redirect('Cek_diabetes/listdiabetes');
			//$this->load->view("cekdiabetes/form_cekdiabetes2", $data);
		}

	//Menampilkan Form Edit Transaksi diabetes
		function editdiabetes($no_faskes)
		{
			$data['pasientbc'] = $this->Pendataan_model->TampilDiabetes($no_faskes);

			$this->load->view('cekdiabetes/edit_cekdiabetes', $data);
		}

		function updatediabetes()
		{
			$data['pasientbc'] = $this->Pendataan_model->UpdateDiabetes($where, $data, $tabel);
			redirect('Cek_diabetes/listdiabetes');
		}

	//Mencari data diabetes pasien berdasarkan nama
		function carinama()
		{
			$data['keyword'] = $this->input->post("keyword");
			$data['diabetes']= $this->Pendataan_model->getDataDiabetes($data['keyword'])->result();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('cekdiabetes/listdiabetes', $data);
		}




}
