<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PenilaianPelamar extends MY_Controller {

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
		$data['kriteria'] = $this->M_Proses->get_kriteria()->result_array();
		$data['pelamar'] = $this->M_Pendataan->ambil_data_pelamar();
		$data['penilaian'] = $this->M_Pendataan->ambil_id_penilaian();
		$data['JmlKriteria'] = $this->M_Proses->getJmlKriteria();
		$this->load->view('admin/F_PenilaianPelamar', $data);
	}

	function simpan_penilaian()
	{
		$data['penilaian'] = $this->M_Pendataan->simpan_penilaian();
		redirect('C_PenilaianPelamar/index');
	}

	function hapus_penilaian($id_pelamar, $id_kriteria)
	{
		$data['penilaian'] = $this->M_Pendataan->simpan_penilaian($id_pelamar, $id_kriteria);
		redirect('C_PenilaianPelamar/index');
	}

	function ubah_penilaian()
	{
		$id_pelamar = $this->input->post('id_pelamar');
		$id_kriteria = $this->input->post('id_kriteria');
		$nilai_tes = $this->input->post('nilai_tes');
		
		$data = array(
			'nilai_tes' => $nilai_tes
		);

		$where = array('id_pelamar' => $id_pelamar,
						'id_kriteria' => $id_kriteria);

		$data['penilaian'] = $this->M_Pendataan->simpan_penilaian($where, $data, 'penilaian');
		redirect('C_PenilaianPelamar/index');
	}

	function cari_keyword()
	{
		$data['keyword'] = $this->input->post("keyword");
		$data['kode'] = $this->M_Pendataan->get_id_PenilaianPelamar();
		$data['penilaian']= $this->M_Pendataan->cari_PenilaianPelamar($data['keyword']);
		$this->load->view('admin/F_PenilaianPelamar', $data);
	}
	
		
}
