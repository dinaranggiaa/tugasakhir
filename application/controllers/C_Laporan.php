<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends MY_Controller {

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
		$this->load->library('mypdf');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('pagination');
    }
    
    function index()
	{	
		$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
		$this->load->view('admin/P_RekomendasiPelamar', $data);		
	}

	function cetak_form_penilaian()
	{	
		$data['kriteria'] 	= $this->M_Pendataan->ambil_data_kriteria();
		$this->mypdf->generate('admin/O_FormPenilaian',$data,true);
		
	}

	function cetak_form_datadiri()
	{	
		$this->mypdf->generate('admin/O_FormDataDiri',true);	
	}
	
	public function Cetak_RekomendasiPelamar()
	{
		$data['tgl'] 		= date('d M Y h:i:s');
		$id_periode 		= $this->input->post('id_periode');	
		$periode 			= $this->M_Pendataan->ambil_data_periode();
		$pelamar 			= $this->M_Pendataan->rekomendasi_pelamar($id_periode);
		$data['periode']	= $this->M_Pendataan->get_periode($id_periode);
		$data['pelamar']	= $this->M_Pendataan->ambil_data_pelamar();
		$this->mypdf->generate('admin/L_RekomendasiPelamar',$data,true);
	}
    
}
