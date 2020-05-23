<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Periode extends MY_Controller {

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

	function index()
	{
		$data['kode'] 		= $this->M_Pendataan->get_id_periode();
		$data['periode']	= $this->M_Pendataan->ambil_data_periode();
		$this->load->view('admin/F_Periode', $data);
	}

	function simpan_periode()
	{
		$data['periode'] 	= $this->M_Pendataan->simpan_periode();
		redirect('C_Periode/index');
	}

	function hapus_periode($id_periode)
	{
		$data['periode'] 	= $this->M_Pendataan->hapus_periode($id_periode);
		redirect('C_Periode/index');
	}

	function ubah_periode()
	{
		$id_periode 		= $this->input->post('id_periode');
		$bulan 				= $this->input->post('bulan');
		$tgl_pembukaan 		= $this->input->post('tgl_pembukaan');
		$tahun		 		= $this->input->post('tahun');

		$data 				= array('bulan' 		=> $bulan,
									'tahun' 		=> $tahun,
									'tgl_pembukaan' => $tgl_pembukaan);

		$where 				= array('id_periode' 	=> $id_periode);

		$data['periode'] 	= $this->M_Pendataan->ubah_periode($where, $data, 'periode');
		redirect('C_Periode/index');
	}

	function cari_keyword()
	{
		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode'] 		= $this->M_Pendataan->get_id_periode();
		$data['periode']	= $this->M_Pendataan->cari_periode($data['keyword']);
		$this->load->view('admin/F_Periode', $data);
	}
	
		
}
