<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_akhir extends MY_Controller {

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
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index()
	{
		$data['kode'] = $this->Pendataan_model->getIdHasilAkhir();
		$data['hasilakhir'] = $this->Pendataan_model->SimpanHasilAkhir();
		$this->load->view('hasilakhir/form_hasilakhir', $data);
	}

	//Pencarian Hasil hasil Pasien
		function listpasien()
		{

			$data['hasilakhir'] = $this->Pendataan_model->getListHasilAkhir();
			$this->load->view('hasilakhir/listpasien', $data);
		}


	//Mencari data pasien tbc berdasarkan nama [form hasil]
		function caridata()
		{
			$data['kode'] = $this->Pendataan_model->getIdHasilAkhir();
			$data['keyword'] = $this->input->post("keyword");
			$data['pasientbc']= $this->Pendataan_model->getByName($data['keyword'])->row_array();
			$this->load->view('hasilakhir/form_hasilakhir2', $data);
		}

	//Menghapus Transaksi hasil berdasarkan nomor faskes

		function deleteid($no_faskes)
		{
			$data['hasilakhir'] = $this->Pendataan_model->DeleteIdHasil($no_faskes);
			redirect('Hasil_akhir/listpasien');
			//$this->load->view("cekdahak/form_cekdahak2", $data);
		}

	//Menampilkan Form Edit Transaksi hasil
		function edithasilakhir($no_faskes)
		{
			$data['pasientbc'] = $this->Pendataan_model->Tampilhasil($no_faskes);
			$this->load->view('hasilakhir/edit_hasilakhir', $data);
		}


	//Mengupdate Transaksi hasil
		function updatehasil()
		{
			$data['hasil'] = $this->Pendataan_model->UpdateHasil($where, $data, $tabel);
			redirect('Hasil_akhir/listpasien');
		}


	//Mencari data hasil pasien berdasarkan nama
		function carinama()
		{
			$data['keyword'] = $this->input->post("keyword");
			$data['hasilakhir']= $this->Pendataan_model->getDataHasil($data['keyword'])->result();
			//redirect('Pendataan_kartu/listpasientbc');
			$this->load->view('hasilakhir/listpasien', $data);
		}




}
