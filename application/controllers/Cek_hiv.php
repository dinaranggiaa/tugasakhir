<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_hiv extends MY_Controller {

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
		$data['kode'] = $this->Pendataan_model->getIdTesHiv();
		$data['hiv'] = $this->Pendataan_model->SimpanHiv();
		$this->load->view('cekhiv/form_cekhiv', $data);
	}

	//Pencarian Hasil hiv Pasien
		function listhiv()
		{
			// $this->load->database();
		//	$jmlpasien = $this->Pendataan_model->jmlpasien(); // total record
			$config['base_url'] = site_url('Cek_hiv/listhiv'); // site_url
			$config['total_rows'] = $this->db->count_all('hiv');
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
			$data['hiv'] = $this->Pendataan_model->getListhiv($config['per_page'], $data['page']);

			$data['pagination'] = $this->pagination->create_links();

			//$data['pasien']= $this->Pendataan_model->getListPasien($config['per_page'],$from);
			$this->load->view('cekhiv/listhiv', $data);
		}


	//Mencari data pasien tbc berdasarkan nama [form hiv]
		function caridata()
		{
			$data['kode'] = $this->Pendataan_model->getIdTesHiv();
			$data['keyword'] = $this->input->post("keyword");
			$data['pasientbc']= $this->Pendataan_model->getByName($data['keyword'])->row_array();
			$this->load->view("cekhiv/form_cekhiv2", $data);
		}

	//Menghapus Transaksi hiv berdasarkan nomor faskes
		function deleteid($no_faskes)
		{
			$data['hiv'] = $this->Pendataan_model->Deletehiv($no_faskes);
			redirect('Cek_hiv/listhiv');
			//$this->load->view("cekhiv/form_cekhiv2", $data);
		}

	//Menampilkan Form Edit Transaksi hiv
		function edithiv($no_faskes)
		{
			$data['pasientbc'] = $this->Pendataan_model->Tampilhiv($no_faskes);

			$this->load->view('cekhiv/edit_cekhiv', $data);
		}

	//Mencari data hiv pasien berdasarkan nama
		function carinama()
		{
			$data['keyword'] = $this->input->post('keyword');
			$data['hiv']= $this->Pendataan_model->getDataHiv($data['keyword'])->result();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('cekhiv/listhiv', $data);
		}




}
