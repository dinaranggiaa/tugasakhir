<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kandidat extends MY_Controller {

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
		$this->load->model('M_Pendataan');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('pagination');

	}

	//Menampilkan Form Pendataan Kandidat
		function index()
		{
			$data['kode'] = $this->M_Pendataan->get_id_kandidat();
			$this->load->view('admin/f_entrikandidat', $data);
			
		}

		function simpan_kandidat()
		{
			$id_kandidat = $this->input->post('id_kandidat');
			$nm_kandidat = $this->input->post('nm_kandidat');
			$jk_kandidat = $this->input->post('jk_kandidat');
			$almt_kandidat = $this->input->post('almt_kandidat');
			$nohp_kandidat = $this->input->post('nohp_kandidat');
			$pendidikan_akhir = $this->input->post('pendidikan_akhir');

			$data = ['id_kandidat' => $id_kandidat,
				'nm_kandidat' => $nm_kandidat,
				'jk_kandidat' => $jk_kandidat,
				'almt_kandidat' => $almt_kandidat,
				'nohp_kandidat' => $nohp_kandidat,
				'pendidikan_akhir' => $pendidikan_akhir
			];
			$data = $this->M_Pendataan->simpan_kandidat($data);
			echo json_encode($data);
		}

		function ambil_data_kandidat()
		{
			$data = $this->M_Pendataan->ambil_data_kandidat();
			echo json_encode($data);
		}

		function ambil_data_byidkandidat()
		{
			$id_kandidat = $this->input->post('id_kandidat');
			$data = $this->M_Pendataan->ambil_data_byidkandidat($id_kandidat);
			echo json_encode($data);
		}

		function hapus_kandidat()
		{
			$id_kandidat = $this->input->post('id_kandidat');
			$data = $this->M_Pendataan->hapus_kandidat($id_kandidat);
			echo json_encode($data);
		}

		function ubah_kandidat(){
			$id_kandidat = $this->input->post('id_kandidat');
			$nm_kandidat = $this->input->post('nm_kandidat');
			$jk_kandidat = $this->input->post('jk_kandidat');
			$almt_kandidat = $this->input->post('almt_kandidat');
			$nohp_kandidat = $this->input->post('nohp_kandidat');
			$pendidikan_akhir = $this->input->post('pendidikan_akhir');
	 
			$data = ['id_kandidat' => $id_kandidat, 
						'nm_kandidat' => $nm_kandidat, 
						'jk_kandidat' => $jk_kandidat , 
						'almt_kandidat' => $almt_kandidat,
						'nohp_kandidat' => $nohp_kandidat,
						'pendidikan_akhir' => $pendidikan_akhir,
					];
	 
			$data = $this->m_Pendataan->ubah_kandidat($id_kandidat,$data);
			 
			echo json_encode($data); // Mengencode variabel data menjadi json format
		}

	
}