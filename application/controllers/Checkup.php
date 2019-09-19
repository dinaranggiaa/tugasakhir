<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkup extends MY_Controller {

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
		$this->load->library('pagination');
		$this->load->library('mypdf');
	}

	function index()
	{
		$data['kode'] = $this->Pendataan_model->getIdCheckup();
		$this->load->view('checkup/checkup_awal',$data);
	}


	function caripasien()
		{
			//pake if, supaya ketika klik cari harus ada inputan nilai, baru akan diproses. kalo ngga maka akan redirect ke formcheckup
			$data['kode'] = $this->Pendataan_model->getIdCheckup();
			if( $data['keyword'] = $this->input->post('keyword')) {
					$data['pasientbc']= $this->Pendataan_model->getByName($data['keyword'])->row_array();
					$this->load->view("checkup/checkup_awal2", $data);
			} else {
					$this->index();
			}
		}

	function HitungTransaksi2()
		{
					$id_checkup = $this->input->post('id_checkup');
					$nm_pasien = $this->input->post('nm_pasien');
					$no_faskes = $this->input->post('no_faskes');
					$bentuk_oat = $this->input->post('bentuk_oat');
					$panduan_oat = $this->input->post('panduan_oat');

					$tahap_pengobatan = $this->input->post('tahap_pengobatan');
					$berat_bdn_2 = $this->input->post('berat_bdn_2');
					$tgl_sekarang = $this->input->post('tgl_sekarang', true);
					$tgl_selanjutnya = $this->input->post('tgl_selanjutnya', true);
					$no_hp = $this->input->post('no_hp', true);
					$no_hp_pmo = $this->input->post('no_hp_pmo', true);

					$dosis_tablet = (int)$this->input->post('dosis_tablet');

					if($tahap_pengobatan == "Awal"){
							$jml_minum = ((abs(strtotime($tgl_selanjutnya) - strtotime($tgl_sekarang)))/(60*60*24));
							$jml_obat = $jml_minum * $dosis_tablet;
						} else {
							$durasi = ((abs(strtotime($tgl_selanjutnya) - strtotime($tgl_sekarang)))/(60*60*24)) / 3;
							$minum = $durasi + ($durasi / 3);
							$jml_minum = (int)$minum;
							$jml_obat = $jml_minum * $dosis_tablet;
						}

					$tanggal = date('Y-m-d', strtotime('-1 days', strtotime($tgl_selanjutnya)));

					$data['id_checkup'] = $id_checkup;
					$data['nm_pasien'] = $nm_pasien;
					$data['no_faskes'] = $no_faskes;
					$data['bentuk_oat'] = $bentuk_oat;
					$data['tahap_pengobatan'] = $tahap_pengobatan;
					$data['jml_minum'] = $jml_minum;
					$data['jml_obat'] = $jml_obat;
					$data['tgl_sekarang'] = $tgl_sekarang;
					$data['tgl_selanjutnya'] = $tgl_selanjutnya;
					$data['dosis_tablet'] = $dosis_tablet;
					$data['berat_bdn_2'] = $berat_bdn_2;
					$data['panduan_oat'] = $panduan_oat;
					$data['tanggal'] = $tanggal;
					$data['no_hp'] = $no_hp;
					$data['no_hp_pmo'] = $no_hp_pmo;

					$this->load->view('checkup/checkup_awal3', $data);
		}

		function simpanCheckup()
		{
			$checkup = $this->input->post('id_checkup');
			$data['checkup'] = $this->Pendataan_model->SimpanCheckup();
			$this->TransaksiCheckup($checkup);
		}

	////////////////FORM CHECKUP////////////////////

	function formcheckup()
	{
		$data['kode'] = $this->Pendataan_model->getIdCheckup();
		$this->load->view('checkup/form_checkup', $data);
	}



		function search()
	{
			//pake if, supaya ketika klik cari harus ada inputan nilai, baru akan diproses. kalo ngga maka akan redirect ke formcheckup

		if( $data['keyword'] = $this->input->post('keyword')) {
				$data['pasientbc']= $this->Pendataan_model->getByFaskes3($data['keyword'])->row_array();
				$this->load->view("checkup/form_checkup2", $data);
		} else {
				$this->formcheckup();
		}
	}



		function UpdateCheckup()
		{
			$checkup = $this->input->post('id_checkup');
			$data['checkup'] = $this->Pendataan_model->UpdateCheckup();
			$this->TransaksiCheckup($checkup);
			// redirect('Petugas/dashboard');
		}


		function HitungTransaksi()
		{
					$id_checkup = $this->input->post('id_checkup');
					$nm_pasien = $this->input->post('nm_pasien');
					$no_faskes = $this->input->post('no_faskes');
					$bentuk_oat = $this->input->post('bentuk_oat');
					$panduan_oat = $this->input->post('panduan_oat');

					$tahap_pengobatan = $this->input->post('tahap_pengobatan');
					$berat_bdn_2 = $this->input->post('berat_bdn_2');
					$tgl_sekarang = $this->input->post('tgl_sekarang', true);
					$tgl_selanjutnya = $this->input->post('tgl_selanjutnya', true);

					$dosis_tablet = (int)$this->input->post('dosis_tablet');

					if($tahap_pengobatan == "Awal"){
							$jml_minum = ((abs(strtotime($tgl_selanjutnya) - strtotime($tgl_sekarang)))/(60*60*24));
							$jml_obat = $jml_minum * $dosis_tablet;
						} else {
							$durasi = ((abs(strtotime($tgl_selanjutnya) - strtotime($tgl_sekarang)))/(60*60*24)) / 3;
							$minum = $durasi + ($durasi / 3);
							$jml_minum = (int)$minum;
							$jml_obat = $jml_minum * $dosis_tablet;
						}


					$tanggal = date('Y-m-d', strtotime('-1 days', strtotime($tgl_selanjutnya)));


					$data['id_checkup'] = $id_checkup;
					$data['nm_pasien'] = $nm_pasien;
					$data['no_faskes'] = $no_faskes;
					$data['bentuk_oat'] = $bentuk_oat;
					$data['tahap_pengobatan'] = $tahap_pengobatan;
					$data['jml_minum'] = $jml_minum;
					$data['jml_obat'] = $jml_obat;
					$data['tgl_sekarang'] = $tgl_sekarang;
					$data['tgl_selanjutnya'] = $tgl_selanjutnya;
					$data['dosis_tablet'] = $dosis_tablet;
					$data['berat_bdn_2'] = $berat_bdn_2;
					$data['panduan_oat'] = $panduan_oat;
					$data['tanggal'] = $tanggal;

					$this->load->view('checkup/form_checkup3', $data);

		}




		function deleteid($id_checkup)
		{
			$data['checkup'] = $this->Pendataan_model->Deletecheckup($id_checkup);
			redirect('Checkup/listcheckup');
			//$this->load->view("cekdahak/form_cekdahak2", $data);
		}


			//Pencarian Hasil Dahak Pasien
		function listcheckup()
		{
			// $this->load->database();
		//	$jmlpasien = $this->Pendataan_model->jmlpasien(); // total record
			$config['base_url'] = site_url('Checkup/listcheckup'); // site_url
			$config['total_rows'] = $this->db->count_all('checkup');
			$config['per_page'] = 5; // record yang ditampilkan per halaman
			$config["uri segment"] = 3; // uri parameter
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);


			//Bootstrap -> Style pagination
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close'] = '</ul></nav></div>';
			$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] = '</span></li>';
			$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] = '</span class="sr-only"></span></span></li>';
			$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['next_tag1_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['prev_tag1_close'] = '<span>Next</li>';
			$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['first_tag1_close'] = '</span></li>';
			$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['last_tag1_close'] = '</span></li>';

			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			// panggil function jmlpasien pada model
			$data['checkup'] = $this->Pendataan_model->getListCheckup($config['per_page'], $data['page']);

			$data['pagination'] = $this->pagination->create_links();

			//$data['pasien']= $this->Pendataan_model->getListPasien($config['per_page'],$from);
			$this->load->view('checkup/list_checkup', $data);
		}

		function editcheckup($id_checkup)
		{
			$data['pasientbc'] = $this->Pendataan_model->TampilCheckup($id_checkup);
			$this->load->view('checkup/edit_checkup', $data);
		}


	//Mencari data dahak pasien berdasarkan nomor faskes
		function carifaskes()
		{
			$data['keyword'] = $this->input->post("keyword");
			$data['checkup']= $this->Pendataan_model->getDataCheckup($data['keyword'])->result();
			$this->load->view('checkup/list_checkup2', $data);
		}



		function Butki($id_checkup)
		{
			$data['checkup'] = $this->Pendataan_model->TampilCheckup($id_checkup);
			$this->load->view('checkup/bukti_checkup', $data);
		}

		public function TransaksiCheckup($id_checkup)
		{
			$tgl = date('d M Y h:i:s');
			$pasientbc = $this->Pendataan_model->TampilCheckup($id_checkup);

			$data['tgl'] = $tgl;
			$data['pasientbc'] = $pasientbc;
			$this->mypdf->generate('checkup/bukti_checkup', $data, '', 'A3', 'landscape');

		}



		//MENCETAK KARTU FASKES

		function Transaksi($id_checkup)
		{
			$tgl = date('d M Y h:i:s');


			$pdf = new FPDF('l','mm',array(148,210));
			$pdf->AddPage();
			$pdf->SetFont('Arial','B','10');
			$pdf->Cell(0,0,'PROGRAM TB NASIONAL',0,1);
			$pdf->SetFont('Arial','B','15');
			$pdf->Cell(0,10,'Bukti Transaksi Checkup',0,1,'C');
			$pdf->Cell(0,10,'Klinik JRC-PPTI',0,1,'C');

			$pdf->SetFont('Arial','','10');
			//Mencetak string
			$pasientbc = $this->Pendataan_model->TampilCheckup($id_checkup);


			$pdf->Cell(100,10,'No Transaksi :'.$pasientbc['id_checkup'].'','0','1');
			$pdf->Cell(100,10,'No Faskes :'.$pasientbc['no_faskes'].'','0','1');
			$pdf->Cell(100,10,'Nama Pasien :'.$pasientbc['nm_pasien'].'','0','1');
			$pdf->Cell(100,10,'Bentuk OAT :'.$pasientbc['bentuk_oat'].'','0','1');
			$pdf->Cell(100,10,'Tahap Pengobatan :'.$pasientbc['tahap_pengobatan'].'','0','1');
			$pdf->Cell(100,10,'Tanggal Checkup :'.$pasientbc['tgl_selanjutnya'].'','0','1');
			$pdf->Cell(100,10,'Jumlah OAT :'.$pasientbc['total_obat'].'','0','1');

			$pdf->SetFont('Arial','','7');
			$pdf->Cell(300,10,'Printed by : '.$this->session->userdata('nama').'','0','1');
			$pdf->Cell(300,0,''.$tgl.'','0','1');
			$pdf->Output();

		}

		function bisaae()
		{

			$mpdf = new \Mpdf\Mpdf();

			$data['bukti'] = $this->Pendataan_model->TampilCheckup($id_checkup);

			$html = $this->load->view('checkup/bukti_checkup', $bukti, true);
			$
			$mpdf->WriteHTML($html);
			$mpdf->Output();
		}

}
