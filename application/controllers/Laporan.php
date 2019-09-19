<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Load library phpspreadsheet
/*require('./Excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\Helper\IOFactory;
use PhpOffice\PhpSpreadsheet\Helper\Spreadsheet;*/

//End load library phpspreadsheet

class Laporan extends MY_Controller 
{

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
		$this->load->model('Laporan_model');
		$this->load->library('mypdf');
	}

	function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tahun
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tanggal

		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	public function allreport()
	{
		$this->load->view('laporan/menulaporan');
	}

/*Pengobatan Pasien*/

	public function pengobatanpasien()
	{

	    $this->load->view('laporan/pengobatan_pasien');
	}

	public function laporanpengobatan()
	{

		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');
		$tgl = date('d M Y h:i:s');
		$data['tgl'] = $tgl;
		$data['tglawal'] = $this->tgl_indo($tglawal);
		$data['tglakhir'] = $this->tgl_indo($tglakhir);
		$data['pasientbc'] = $this->Laporan_model->pengobatanpasien($tglawal, $tglakhir);
	    $this->load->view('laporan/v_pengobatan_excel', $data);
	}

	public function export_excel()
	{
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');

	    $data['pasientbc'] = $this->Laporan_model->pengobatanpasien($tglawal, $tglakhir);
	    $this->load->view('laporan/v_pengobatan_excel', $data);
	}


/*Kehadiran Checkup*/
	public function kehadirancheckup()
	{
	    $this->load->view('laporan/kehadiran_checkup');
	}

	public function laporankehadiran()
	{
		$tgl = date('d M Y h:i:s');
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');
		$pasientbc = $this->Laporan_model->kehadirancheckup($tglawal,$tglakhir);

		$data['tgl'] = $tgl;
		$data['tglawal'] = $this->tgl_indo($tglawal);
		$data['tglakhir'] = $this->tgl_indo($tglakhir);
		$data['kehadiran'] = $pasientbc;
		$this->mypdf->generate('laporan/laporankehadiran', $data);
	}


/*Hasil Akhir*/
	public function hasilakhir()
	{

	    $this->load->view('laporan/hasil_akhir');
	}

	public function laporanakhir()
	{	
		$tgl = date('d M Y h:i:s');
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');
		$hasilakhir = $this->Laporan_model->hasilakhir($tglawal,$tglakhir);

		$data['tgl'] = $tgl;
		$data['tglawal'] = $this->tgl_indo($tglawal);
		$data['tglakhir'] = $this->tgl_indo($tglakhir);
		$data['hasilakhir'] = $hasilakhir;
		$this->mypdf->generate('laporan/hasilakhir', $data);
	}



}

