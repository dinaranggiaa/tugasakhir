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
		$this->load->view( 'admin/karyawan/F_Karyawan_Entri');
	}

	function entri_karyawan()
	{
		$data['kriteria'] 		= $this->M_Proses->get_kriteria()->result_array();
		//where tanda=1
		$data['pelamar'] 		= $this->M_Pendataan->data_pelamar();
		$data['karyawan'] 		= $this->M_Pendataan->ambil_id_karyawan();
		$data['JmlKriteria'] 	= $this->M_Pendataan->getJmlKriteria();
		
		$this->load->view('admin/penilaian_pelamar/F_Karyawan_Entri', $data);
	}

	function input_data()
	{
		$data['simpan'] 	= $this->M_Pendataan->simpan_karyawan();
		$id_pelamar 		= $this->input->post('id_pelamar');
		$tanda 				= 1;
		$data 				= array('tanda' => $tanda);
		$where 				= array('id_pelamar' => $id_pelamar);
		$data['karyawan'] 	= $this->M_Pendataan->ubah_pelamar($where, $data, 'pelamar');
		redirect('C_Karyawan/index');
	}

	function simpan_karyawan()
	{
		$data['karyawan'] = $this->M_Pendataan->simpan_karyawan();
		redirect('C_karyawanPelamar/index');
	}

	function hapus_karyawan($id_pelamar, $id_kriteria)
	{
		$data['karyawan'] = $this->M_Pendataan->simpan_karyawan($id_pelamar, $id_kriteria);
		redirect('C_Karyawan/index');
	}

	function ubah_karyawan()
	{
		$id_pelamar 		= $this->input->post('id_pelamar');
		$id_kriteria 		= $this->input->post('id_kriteria');
		$nilai_tes 			= $this->input->post('nilai_tes');
		
		$data 				= array('nilai_tes' 	=> $nilai_tes);
		$where 				= array('id_pelamar' 	=> $id_pelamar,
									'id_kriteria' 	=> $id_kriteria);

		$data['karyawan'] 	= $this->M_Pendataan->simpan_karyawan($where, $data, 'nilai_alternatif');
		redirect('C_Karyawan/index');
	}

	function cari_keyword()
	{
		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode'] 		= $this->M_Pendataan->get_id_karyawanPelamar();
		$data['karyawan']	= $this->M_Pendataan->cari_karyawanPelamar($data['keyword']);
		$this->load->view('admin/F_Karyawan', $data);
	}

	function cari_data()
	{
		$data['keyword'] 		= $this->input->post("keyword");
		$data['JmlKriteria']	= $this->M_Pendataan->getJmlKriteria();
		$data['kriteria'] 		= $this->M_Proses->get_kriteria()->result_array();
		$data['pelamar']		= $this->M_Pendataan->cari_data_pelamar($data['keyword'])->row_array();
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
