<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faskes extends MY_Controller {

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
		$this->load->library('mypdf');

	}

	//Memanggil Form Pendataan Pasien Terduga Tuberculosis
		function index()
		{
			$data['kode'] = $this->Pendataan_model->nofaskes();
			$this->load->view('faskes/pendataan_faskes2', $data);
		}


		function simpanFaskes()
		{
			$faskes = $this->input->post('no_faskes');
			$data['faskes'] = $this->Pendataan_model->SimpanKartu();
			$this->TB02($faskes);
		}

	//Pencarian data pasien terduga berdasarkan nama[search pada form]
		function search()
		{
			$data['kode'] = $this->Pendataan_model->nofaskes();
			$data['keyword'] = $this->input->post("keyword");
			$data['pasien']= $this->Pendataan_model->getByNama($data['keyword'])->row_array();
			$this->load->view("faskes/pendataan_faskes", $data);
		}


	//Pencarian data pasien terduga berdasarkan nama[search list pasien tbc]
		function carifaskes()
		{
			$data['keyword'] = $this->input->post("keyword");
			$data['pasientbc']= $this->Pendataan_model->getByFaskes($data['keyword'])->result();
			$this->load->view('Faskes/listpasientbc', $data);
		}


	//Menampilkan data pasien TBC yang sudah punya faskes [form listpasientbc]
		function listpasientbc()
		{
			// $data['pasientbc'] = $this->Pendataan_model->getPasienTbc();
			// $this->load->view('Faskes/listpasientbc', $data);
			$config['base_url'] = site_url('Faskes/listpasientbc'); // site_url
			$config['total_rows'] = $this->db->count_all('faskes');
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
			$data['pasientbc'] = $this->Pendataan_model->getPasienTbc($config['per_page'], $data['page']);

			$data['pagination'] = $this->pagination->create_links();

			//$data['pasien']= $this->Pendataan_model->getListPasien($config['per_page'],$from);
			$this->load->view('faskes/listpasientbc', $data);
		}

	//Menampilkan data pasein TBC berdasarkan no faskes [form pasien tbc]
		function pasientbc($no_faskes)
		{
			$data['pasientbc'] = $this->Pendataan_model->getDataPasienTbc($no_faskes);
			$this->load->view('Faskes/pasientbc', $data);
		}

	//Menghapus data pasien TBC berdasarkan no faskes
		function deleteid($no_faskes)
		{
			$data['pasientbc'] = $this->Pendataan_model->deleteid($no_faskes);
			redirect('Faskes/listpasientbc'); //memanggil controller list pasien
		}

	//Menampilkan form edit data pasien tbc berdasarkan no faskes
		function editpasientbc($no_faskes)
		{
			$data['pasientbc'] = $this->Pendataan_model->getDataPasienTbc($no_faskes);
			$this->load->view('Faskes/edit_pasientbc', $data);
		}

		//Mengupdate Data Pasien Terduga TBC
		// function UpdateData()
		// {
		// 	$data['pasientbc'] = $this->Pendataan_model->UpdateFaskes($where, $data, $tabel);
		// 	//$this->load->view("Pendataan/list_pasien", $data);
		// 	redirect('Faskes/listpasientbc');

		// }

		// function UpdatePMO()
		// {
		// 	$data['pasientbc'] = $this->Pendataan_model->UpdatePMO($where, $data, $tabel);
		// 	//$this->load->view("Pendataan/list_pasien", $data);
		// 	redirect('Faskes/listpasientbc');

		// }


		public function TB02($no_faskes)
		{
			$tgl = date('d/m/Y h:i:s');
			$pasientbc = $this->Pendataan_model->getDataPasienTbc($no_faskes);

			$data['tgl'] = $tgl;
			$data['pasientbc'] = $pasientbc;
			$this->mypdf->generate('faskes/TB02', $data,'','A5');
		}

}
