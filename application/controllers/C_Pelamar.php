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
			$data['kode'] 		= $this->M_Pendataan->get_id_pelamar();
			$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
			$data['pelamar'] 	= $this->M_Pendataan->ambil_data_pelamar();
			$this->load->view('admin/F_Pelamar', $data);
		}

		function tambah_pelamar()
		{
			$data['kode'] 	= $this->M_Pendataan->get_id_pelamar();
			$this->load->view('admin/F_Pelamar_Entri', $data);
		}

		function simpan_pelamar()
		{
			$data['pelamar'] = $this->M_Pendataan->simpan_pelamar();
			redirect('C_Pelamar/index');
		}

		function hapus_pelamar($id_pelamar)
		{
			$data['pelamar'] = $this->M_Pendataan->hapus_pelamar($id_pelamar);
			redirect('C_Pelamar/index');
		}

		function ubah_pelamar()
		{
			$id_pelamar 		= $this->input->post('id_pelamar');
			$id_periode 		= $this->input->post('id_periode');
			$tgl_daftar 		= $this->input->post('tgl_daftar');
			$nm_pelamar 		= $this->input->post('nm_pelamar');
			$jk_pelamar 		= $this->input->post('jk_pelamar');
			$tempat_lahir 		= $this->input->post('tempat_lahir');
			$tanggal_lahir 		= $this->input->post('tanggal_lahir');
			$almt_pelamar 		= $this->input->post('almt_pelamar');
			$no_ktp 			= $this->input->post('no_ktp');
			$status 			= $this->input->post('status');
			$nohp_pelamar 		= $this->input->post('nohp_pelamar');
			$pendidikan_akhir 	= $this->input->post('pendidikan_akhir');
	 
			$data = array(
				'tgl_daftar' 		=> $tgl_daftar,
				'nm_pelamar' 		=> $nm_pelamar,
				'jk_pelamar' 		=> $jk_pelamar,
				'tempat_lahir' 		=> $tempat_lahir,
				'tanggal_lahir' 	=> $tanggal_lahir,
				'almt_pelamar' 		=> $almt_pelamar,
				'no_ktp' 			=> $no_ktp,
				'status' 			=> $status,
				'nohp_pelamar' 		=> $nohp_pelamar,
				'pendidikan_akhir' 	=> $pendidikan_akhir,
			);
	
			$where 				= array('id_pelamar' => $id_pelamar);

			$data['pelamar']	= $this->M_Pendataan->ubah_periode($where, $data, 'pelamar');
			redirect('C_Pelamar/index');
		}

		function cari_keyword()
		{
			$data['keyword'] 	= $this->input->post("keyword");
			$data['kode'] 		= $this->M_Pendataan->get_id_pelamar();
			$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
			$data['pelamar'] 	= $this->M_Pendataan->ambil_data_pelamar();
			$data['c_pelamar']	= $this->M_Pendataan->cari_pelamar($data['keyword']);
			$this->load->view('admin/F_Pelamar', $data);
		}

		

}
