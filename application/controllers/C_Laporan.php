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
		$this->load->model('M_Proses');
		$this->load->library('mypdf');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('pagination');
    }
    
    function Periode_Rekomendasi()
	{	
		$data['divisi']		= $this->M_Pendataan->ambil_data_divisi();
		$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
		$data['tahun']		= $this->M_Pendataan->ambil_data_tahun();

		$this->load->view('admin/P_RekomendasiPelamar', $data);		
	}
	
	function Periode_Keputusan()
	{	
		$data['divisi']		= $this->M_Pendataan->ambil_data_divisi();
		$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
		$data['tahun']		= $this->M_Pendataan->ambil_data_tahun();
		$this->load->view('admin/P_LKeputusan', $data);		
	}

	function Periode_Karyawan_Baru()
	{	
		$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
		$data['tahun']		= $this->M_Pendataan->ambil_data_tahun();
		$this->load->view('admin/P_KaryawanBaru', $data);		
	}

	function cetak_form_penilaian()
	{	
		
		$data['subkriteria']	= $this->M_Pendataan->data_target_subkriteria()->result();
		$data['kriteria']		= $this->M_Pendataan->getIdKriteria()->result();
		//print_r($data['kriteria']);

		$this->mypdf->generate('admin/O_FormPenilaian',$data, true);
		
	}

	function cetak_form_datadiri()
	{	
		$this->mypdf->generate('admin/O_FormDataDiri', true);	
	}
	
	public function Cetak_RekomendasiPelamar()
	{
		$bulan				= $this->input->post('bulan');
		$tahun				= $this->input->post('tahun');
		$data['bulan']		= $bulan;
		$data['tahun']		= $tahun;
		$data['tgl'] 		= date('d M Y h:i:s');
		$id_periode 		= $this->input->post('id_periode');	
		$data['periode']	= $this->M_Pendataan->get_periode($id_periode);
		$data['pelamar']	= $this->M_Pendataan->rekomendasi_pelamar($bulan, $tahun)->result();
		$this->mypdf->generate('admin/L_RekomendasiPelamar',$data,true);
	}

	public function Cetak_KeputusanPelamar()
	{
		$bulan				= $this->input->post('bulan');
		$tahun				= $this->input->post('tahun');
		$divisi				= $this->input->post('id_divisi');
		
		$data['bulan']		= $bulan;
		$data['tahun']		= $tahun;
		$data['divisi']		= $divisi;

		$data['tgl'] 		= date('d M Y h:i:s');
		$data['pelamar']	= $this->M_Pendataan->keputusan_pelamar($bulan, $tahun, $divisi)->result();
		print_r($data['pelamar']);
		print_r($bulan);
		print_r($tahun);
		print_r($divisi);
		$this->mypdf->generate('admin/L_KeputusanPelamar',$data,true);
	}

	public function Cetak_Hasil_Keputusan($bulan, $tahun, $divisi)
	{

		$data['bulan']		= $bulan;
		$data['tahun']		= $tahun;
		$data['divisi']		= $divisi;
		
		$data['tgl'] 		= date('d M Y h:i:s');
		$data['pelamar']	= $this->M_Pendataan->keputusan_pelamar($bulan, $tahun, $divisi)->result();
		print_r($data['pelamar']);
		print_r($bulan);
		print_r($tahun);
		print_r($divisi);
		$this->mypdf->generate('admin/L_KeputusanPelamar',$data,true);
	}

	public function Cetak_KaryawanBaru()
	{
		$bulan				= $this->input->post('bulan');
		$tahun				= $this->input->post('tahun');
		// $divisi				= $this->input->post('id_divisi');
		
		$data['bulan']		= $bulan;
		$data['tahun']		= $tahun;
		// $data['divisi']		= $divisi;

		$data['tgl'] 		= date('d M Y h:i:s');
		$data['karyawan']	= $this->M_Pendataan->karyawan_baru($bulan, $tahun)->result();
		//print_r($data['karyawan']);
		$this->mypdf->generate('admin/L_KaryawanBaru',$data,true);
	}


	
    
}
