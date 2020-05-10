<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pelamar extends MY_Controller {

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

	//Menampilkan Form Pendataan pelamar
		function index()
		{
			$data['kode'] = $this->M_Pendataan->get_id_pelamar();
			$this->load->view('admin/f_entripelamar', $data);
		}

		function simpan_pelamar()
		{
			$id_pelamar = $this->input->post('id_pelamar');
			$nm_pelamar = $this->input->post('nm_pelamar');
			$jk_pelamar = $this->input->post('jk_pelamar');
			$almt_pelamar = $this->input->post('almt_pelamar');
			$nohp_pelamar = $this->input->post('nohp_pelamar');
			$pendidikan_akhir = $this->input->post('pendidikan_akhir');

			$data = ['id_pelamar' => $id_pelamar,
				'nm_pelamar' => $nm_pelamar,
				'jk_pelamar' => $jk_pelamar,
				'almt_pelamar' => $almt_pelamar,
				'nohp_pelamar' => $nohp_pelamar,
				'pendidikan_akhir' => $pendidikan_akhir
			];
			$data = $this->M_Pendataan->simpan_pelamar($data);
			echo json_encode($data);
		}

		function ambil_data_pelamar()
		{
			$data = $this->M_Pendataan->ambil_data_pelamar();
			echo json_encode($data);
		}

		function ambil_data_byidpelamar()
		{
			$id_pelamar = $this->input->post('id_pelamar');
			$data = $this->M_Pendataan->ambil_data_byidpelamar($id_pelamar);
			echo json_encode($data);
		}

		function hapus_pelamar()
		{
			$id_pelamar = $this->input->post('id_pelamar');
			$data = $this->M_Pendataan->hapus_pelamar($id_pelamar);
			echo json_encode($data);
		}

		function ubah_pelamar(){
			$id_pelamar = $this->input->post('id_pelamar');
			$nm_pelamar = $this->input->post('nm_pelamar');
			$jk_pelamar = $this->input->post('jk_pelamar');
			$almt_pelamar = $this->input->post('almt_pelamar');
			$nohp_pelamar = $this->input->post('nohp_pelamar');
			$pendidikan_akhir = $this->input->post('pendidikan_akhir');
	 
			$data = ['id_pelamar' => $id_pelamar, 
						'nm_pelamar' => $nm_pelamar, 
						'jk_pelamar' => $jk_pelamar , 
						'almt_pelamar' => $almt_pelamar,
						'nohp_pelamar' => $nohp_pelamar,
						'pendidikan_akhir' => $pendidikan_akhir,
					];
	 
			$data = $this->m_Pendataan->ubah_pelamar($id_pelamar,$data);
			 
			echo json_encode($data); // Mengencode variabel data menjadi json format
		}

		public function cari_pelamar()
		{
			$keyword = $this->input->post('keyword');
			$pelamar = $this->M_Pendataan->cari_pelamar($keyword);
			$hasil = $this->load->view('admin/f_entripelamar', array('pelamar'=> $pelamar), true);
			$callback = array('hasil' => $hasil,);
			echo json_encode($callback);
		}

		// public function cari_pelamar()
		// {
		// 	$data['keyword'] = $this->input->post('keyword');
		// 	$data['pelamar'] = $this->M_Pendataan->cari_pelamar($data['pelamar']);
		// 	$data['hasil'] = $this->load->view('admin/f_entripelamar', $data, true);
		// 	print_r($data['hasil']);

		// 	echo json_encode($data);
		// }

		

}
