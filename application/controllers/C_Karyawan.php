<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Karyawan extends MY_Controller {

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
		$this->load->model('M_Proses');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('pagination');

	}

	function index()
	{
		$data['karyawan']	= $this->M_Pendataan->ambil_data_karyawan();
		$this->load->view('admin/F_Karyawan', $data);
	}

	function entri_karyawan()
	{
		$data['kode'] 		= $this->M_Pendataan->get_id_karyawan();	
		$this->load->view('admin/karyawan/F_Karyawan_Entri', $data);
	}

	function input_data()
	{
		$data['simpan'] 	= $this->M_Pendataan->simpan_karyawan();
		redirect('C_Karyawan/index');
	}


	function hapus_karyawan($id_karyawan)
	{
		$data['karyawan'] = $this->M_Pendataan->hapus_karyawan($id_karyawan);
		redirect('C_Karyawan/index');
	}

	function ubah_karyawan()
	{	
		$id_karyawan 			= $this->input->post('id_karyawan');
		$nm_karyawan 			= $this->input->post('nm_karyawan');
		$tempat_lahir 			= $this->input->post('tempat_lahir');
		$tanggal_lahir 			= $this->input->post('tanggal_lahir');
		$almt_karyawan			= $this->input->post('almt_karyawan');
		$no_ktp 				= $this->input->post('no_ktp');
		$status_marital			= $this->input->post('status_marital');
		$nohp_karyawan			= $this->input->post('nohp_karyawan');
		$pendidikan_terakhir 	= $this->input->post('pendidikan_terakhir');
		$tglmasukkerja 			= $this->input->post('tglmasukkerja');
		$nm_ortu				= $this->input->post('nm_ortu');
		$almt_ortu				= $this->input->post('almt_ortu');
		$status_kerja			= $this->input->post('status_kerja');
		
		$data 				= array('nm_karyawan' 			=> $nm_karyawan,
									'tempat_lahir' 			=> $tempat_lahir,
									'tanggal_lahir' 		=> $tanggal_lahir,
									'no_ktp' 				=> $no_ktp,
									'almt_karyawan' 		=> $almt_karyawan,
									'status_marital' 		=> $status_marital,
									'nohp_karyawan' 		=> $nohp_karyawan,
									'pendidikan_terakhir' 	=> $pendidikan_terakhir,
									'tglmasukkerja' 		=> $tglmasukkerja,
									'almt_ortu' 			=> $almt_ortu,
									'nm_ortu' 				=> $nm_ortu,
									'status_kerja' 			=> $status_kerja,

									);
		$where 				= array('id_karyawan' 	=> $id_karyawan);
		$data['karyawan'] 	= $this->M_Pendataan->ubah_data($where, $data, 'karyawan');

		$nm_hub 			= $this->input->post('nm_hub');
		$stat_hub 			= $this->input->post('stat_hub');
		$almt_hub 			= $this->input->post('almt_hub');
		$nohp_hub			= $this->input->post('nohp_hub');
		
		
		$data 				= array('nm_hub' 		=> $nm_hub,
									'stat_hub' 		=> $stat_hub,
									'almt_hub' 		=> $almt_hub,
									'nohp_hub' 		=> $nohp_hub
									);
		$where 				= array('id_karyawan' 	=> $id_karyawan);
		$data['karyawan'] 	= $this->M_Pendataan->ubah_data($where, $data, 'kontak_darurat');

		redirect('C_Karyawan/index');
	}

	function cari_keyword()
	{
		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode'] 		= $this->M_Pendataan->get_id_karyawan();
		$data['karyawan']	= $this->M_Pendataan->cari_data_karyawan($data['keyword']);
		$this->load->view('admin/F_Karyawan', $data);
	}

	//Form entri karyawan
	function cari_data()
	{
		$data['kode'] 			= $this->M_Pendataan->get_id_karyawan();	
		$data['keyword'] 		= $this->input->post("keyword");
		$data['pelamar']		= $this->M_Pendataan->get_data_pelamar($data['keyword'])->row_array();
		$this->load->view('admin/karyawan/F_Karyawan_Entri2', $data);
	}

	function edit_nilai_pelamar($id_pelamar)
	{
		$data['JmlKriteria'] 	= $this->M_Pendataan->getJmlKriteria();
		$data['npelamar'] 		= $this->M_Pendataan->data_nilai_pelamar($id_pelamar)->result();
		$this->load->view('admin/karyawan_pelamar/F_karyawanPelamar_Edit', $data);
	}

	function view_nilai_pelamar($id_pelamar)
	{
		$data['JmlKriteria'] 	= $this->M_Pendataan->getJmlKriteria();
		$data['npelamar'] 		= $this->M_Pendataan->data_nilai_pelamar($id_pelamar)->result();
		$this->load->view('admin/karyawan_pelamar/F_karyawanPelamar_View', $data);
	}
	
		
}
