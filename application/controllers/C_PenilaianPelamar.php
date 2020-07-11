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

		$data['JmlKriteria'] 	= $this->M_Pendataan->getjmlsubkriteria();
		$data['n_pelamar']		= $this->M_Pendataan->data_npelamar()->result();
		
		$data['penilaian']		= $this->M_Pendataan->ambil_id_penilaian();
		$this->load->view( 'admin/F_PenilaianPelamar', $data);
	}

	function entri_penilaian()
	{
		$data['kriteria'] 		= $this->M_Pendataan->get_subkriteria()->result_array();
		//where tanda=1
		$data['pelamar'] 		= $this->M_Pendataan->data_pelamar();
		$data['penilaian'] 		= $this->M_Pendataan->ambil_id_penilaian();
		$data['JmlKriteria'] 	= $this->M_Pendataan->getjmlsubkriteria();
		
		$this->load->view('admin/penilaian_pelamar/F_PenilaianPelamar_Entri', $data);
	}

	
	function cari_data()
	{
		$data['keyword'] 		= $this->input->post("keyword");
		$data['JmlKriteria']	= $this->M_Pendataan->getjmlsubkriteria();
		//$data['kriteria'] 		= $this->M_Proses->get_kriteria()->result_array();
		$data['kriteria'] 		= $this->M_Pendataan->get_subkriteria()->result_array();
		$data['pelamar']		= $this->M_Pendataan->cari_data_pelamar($data['keyword'])->row_array();
		$this->load->view('admin/penilaian_pelamar/F_PenilaianPelamar_Entri2', $data);
	}

	function input_data()
	{
		$data['simpan'] 	= $this->M_Pendataan->simpan_penilaian();
		$id_pelamar 		= $this->input->post('id_pelamar');
		$tanda 				= 1;
		$data 				= array('tanda' => $tanda);
		$where 				= array('id_pelamar' => $id_pelamar);
		$data['penilaian'] 	= $this->M_Pendataan->ubah_data($where, $data, 'pelamar');
		$this->session->set_flashdata('success', 'Data Penilaian Pelamar Berhasil Disimpan');

		redirect('C_PenilaianPelamar/index');
	}

	function hapus_npelamar($id_pelamar)
	{
		$data['npelamar'] 	= $this->M_Pendataan->hapus_npelamar($id_pelamar);
		

		$this->db->set('tanda', 0);
		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->update('pelamar');

		$this->session->set_flashdata('success', 'Data Penilaian Pelamar Berhasil Dihapus');

		redirect('C_PenilaianPelamar/index');
	}

	function simpan_penilaian()
	{
		$divisi	= $this->input->post('id_divisi');
		//print_r($divisi);

		if(isset($_POST['btn_simpan'])){
			$jmlsub = $this->db->count_all('target_subkriteria');
			$data = array();
			for($i=0; $i < $jmlsub; $i++){
				$item = [
					'id_pelamar' 		=> $this->input->post('id_pelamar'),
					'id_subkriteria'	=> $this->input->post('id_subkriteria'.$i),
					'nilai_tes' 		=> $this->input->post('nilai_tes'.$i)
				];
				array_push($data, $item);
			} $this->db->insert_batch('nilai_alternatif', $data);
		}

		$getkriteria	= $this->M_Proses->get_target_kriteria($divisi)->result_array();
		//print_r($getkriteria);
		//echo"<br><br>";
		$kriteria 		= array();
		foreach ($getkriteria as $row){
			$kriteria[$row['id_kriteria']] = array( 
													$row['id_kriteria'],
													$row['nm_kriteria'],
													$row['bobot_kriteria']);
		}
		
		// echo"kriteria : <br>";
		// print_r($kriteria); echo"<br><br>";

		$getsubkriteria	= $this->M_Proses->get_target_subkriteria($divisi)->result_array();
		//print_r($getsubkriteria); echo"<br><br>";
		$subkriteria 	= array();
		foreach ($getsubkriteria as $row){
			$subkriteria[$row['id_subkriteria']] = array( 
													$row['id_kriteria'],
													$row['id_subkriteria'],
													$row['nm_subkriteria'],
													$row['nilai_target'],
													$row['status_subkriteria'],
													$row['bobot_subkriteria']);
		}
		
		// echo"subkriteria : <br>";
		// print_r($subkriteria); echo"<br><br>";	

		$id_pelamar 	= $this->input->post('id_pelamar');
		$getsample		= $this->M_Proses->data_npelamar($id_pelamar)->result_array();
		$sample			= array();
		foreach ($getsample as $key => $row){
			$sample[$row['id_pelamar']][$row['id_subkriteria']] = $row['nilai_tes'];
		}

		$gap 	= array();		
		foreach ($sample as $id_pelamar => $data){
			$gap[$id_pelamar] = array();
			foreach($subkriteria as $id_subkriteria => $val){
			
				$gap[$id_pelamar][$id_subkriteria] 	= $data[$id_subkriteria]- $val[3];
				$nilai_gap 							= $gap[$id_pelamar][$id_subkriteria];
				
				$this->db->set('id_pelamar', $id_pelamar)
						 ->set('id_divisi', $divisi)				
						 ->set('id_subkriteria', $id_subkriteria)
						 ->set('gap',$nilai_gap);
				$this->db->insert('match_subkriteria');
				
			}
		}
		
		// echo"gap : <br>";
		// print_r($gap); echo"<br><br>";

		$terbobot 	= array();
		foreach ($gap as $id_pelamar => $data) {
			$terbobot[$id_pelamar] = array();
			foreach ($data as $id_subkriteria => $value) {
				$ngap = $value;
				$bobot_gap = 0;

				if($ngap == 0){
					$bobot_gap = 5;
				} elseif ($ngap == 1){
					$bobot_gap = 4.5;
				} elseif ($ngap == -1){
					$bobot_gap = 4;
				} elseif ($ngap == 2){
					$bobot_gap = 3.5;
				} elseif ($ngap == -2){
					$bobot_gap = 3;
				} elseif ($ngap == 3){
					$bobot_gap = 2.5;
				} elseif ($ngap == -3){
					$bobot_gap = 2;
				} elseif ($ngap == 4){
					$bobot_gap = 1.5;
				} elseif ($ngap == -4){
					$bobot_gap = 1;
				}

				$terbobot[$id_pelamar][$id_subkriteria] 	= $bobot_gap;
				//print_r($terbobot[$id_pelamar][$id_subkriteria]);echo"<br>";
				$bobot_nilai 								= $terbobot[$id_pelamar][$id_subkriteria];
				$this->db->set('bobot_nilai',$bobot_nilai);
				$this->db->where('id_pelamar', $id_pelamar)
						 ->where('id_divisi', $divisi)
						 ->where('id_subkriteria', $id_subkriteria);
				$this->db->update('match_subkriteria');
			}
		}
		// echo"terbobot : <br>";
		// print_r($terbobot); echo"<br><br>";

		$nilaitotal = array();
		foreach($terbobot as $id_pelamar => $val){
			foreach($subkriteria as $id_subkriteria => $value){
				$nilaitotal[$id_pelamar][$id_subkriteria] = $value[5] * $val[$id_subkriteria];
				// print_r($nilaitotal[$id_pelamar][$id_subkriteria]);   echo"   "; print_r( $value[5]); echo"   ";
				// print_r($val[$id_subkriteria]); echo"<br>";
				
			}
		}

		// echo"nilai total : <br>";
		// print_r($nilaitotal); echo"<br><br>";

		//print_r($nilaitotal);

		$id_kriteria = array();
		$cf			= array();
		$sf			= array();
		$hasilpm = array();
		foreach($nilaitotal as $id_pelamar =>$data){
			foreach($data as $id_subkriteria => $value){
				
				$id_kriteria = $subkriteria[$id_subkriteria][0];
				if($subkriteria[$id_subkriteria][4] == 'CF'){
					$cf[$id_kriteria][$id_subkriteria] = $value;
					// echo"cf : <br>";
					// print_r([$id_subkriteria]);echo"<br><br>"; print_r($cf[$id_kriteria][$id_subkriteria]);
					// echo"<br><br>";
				} else {
					$sf[$id_kriteria][$id_subkriteria] = $value;
					// echo"sf : <br>";
					// print_r([$id_subkriteria]);echo"<br><br>"; print_r($sf[$id_kriteria][$id_subkriteria]);
					// echo"<br><br>";
				}
			}
			//print_r($cf);

			foreach($kriteria as $id_kriteria => $value){
				
				$hasilpm[$id_pelamar][$id_kriteria] = array_sum($cf[$id_kriteria]) / count($cf[$id_kriteria]) * 0.6 + array_sum($sf[$id_kriteria])/ count($sf[$id_kriteria]) * 0.4;		
				echo"CF id Kriteria : "; print_r($cf[$id_kriteria]); echo"   <br>  ";
				echo"SF id Kriteria : "; print_r($sf[$id_kriteria]); 
				print_r($hasilpm[$id_pelamar][$id_kriteria]); echo"   <br>  ";

				$total_nilai = $hasilpm[$id_pelamar][$id_kriteria];
				
				$this->db->set('id_pelamar',$id_pelamar)
						->set('id_divisi',$divisi)
						->set('id_kriteria',$id_kriteria)
						->set('nilai_total',$total_nilai);
				$this->db->insert('match_kriteria');	

			}
			
		}

		echo"hasilpm : <br>";
		print_r($hasilpm); echo"<br><br>";
		
		$nilaiakhir = 0;
		foreach($hasilpm as $id_pelamar => $datapm){			
			if(!isset($nilaiakhir)){
				$nilaiakhir = 0;
			}
			foreach ($datapm as $id_kriteria => $nilai_total){	
				$nilaiakhir += round($nilai_total * $kriteria[$id_kriteria][2],4);
			}	
			$this->db->set('id_pelamar',$id_pelamar);
			$this->db->set('nilai_akhir',$nilaiakhir);
			$this->db->set('status_akhir',0);
			$this->db->insert('hasil_akhir');


			$this->db->set('tanda',1);
			$this->db->where('id_pelamar',$id_pelamar);
			$this->db->update('pelamar');
		}
		// echo"nlai akhir : <br>";
		// print_r($nilaiakhir); echo"<br><br>";
		
		$this->session->set_flashdata('success', 'Data Penilaian Pelamar Berhasil Disimpan');
		redirect('C_PenilaianPelamar/index');
	}

	function hapus_penilaian($id_pelamar, $id_kriteria)
	{
		$data['penilaian'] = $this->M_Pendataan->simpan_penilaian($id_pelamar, $id_kriteria);
		$this->session->set_flashdata('success', 'Data Penilaian Pelamar Berhasil Dihapus');
		redirect('C_PenilaianPelamar/index');
	}

	function ubah_penilaian()
	{
		$divisi	= $this->input->post('id_divisi');
		print_r($divisi);

		$jml_subkriteria = $this->db->count_all('target_subkriteria');
		print_r($jml_subkriteria);
		
		$id_pelamar 		= $this->input->post('id_pelamar');


		for($x=0; $x< $jml_subkriteria; $x++){
			$id_subkriteria 	= $this->input->post('id_subkriteria'.$x);
			$nilai_tes 			= $this->input->post('nilai_tes'.$x);

			$this->db->set('nilai_tes',$nilai_tes);
			$this->db->where('id_pelamar', $id_pelamar);
			$this->db->where('id_subkriteria', $id_subkriteria);
			$this->db->update('nilai_alternatif');
		}
			$getkriteria	= $this->M_Proses->get_target_kriteria($divisi)->result_array();

			$kriteria 		= array();
			foreach ($getkriteria as $row){
			$kriteria[$row['id_kriteria']] = array( 
													$row['id_kriteria'],
													$row['nm_kriteria'],
													$row['bobot_kriteria']);
		}
		
	
			$getsubkriteria	= $this->M_Proses->get_target_subkriteria($divisi)->result_array();
			$subkriteria 	= array();
			foreach ($getsubkriteria as $row){
				$subkriteria[$row['id_subkriteria']] = array( 
														$row['id_kriteria'],
														$row['id_subkriteria'],
														$row['nm_subkriteria'],
														$row['nilai_target'],
														$row['status_subkriteria'],
														$row['bobot_subkriteria']);
			}
	
			$id_pelamar 	= $this->input->post('id_pelamar');
			$getsample		= $this->M_Proses->data_npelamar($id_pelamar)->result_array();
			$sample			= array();
			foreach ($getsample as $key => $row){
				$sample[$row['id_pelamar']][$row['id_subkriteria']] = $row['nilai_tes'];
			}

	
			$gap 	= array();		
			foreach ($sample as $id_pelamar => $data){
				$gap[$id_pelamar] = array();
				foreach($subkriteria as $id_subkriteria => $val){
					$gap[$id_pelamar][$id_subkriteria] 	= $data[$id_subkriteria]- $val[3];
					$nilai_gap 							= $gap[$id_pelamar][$id_subkriteria];

					$this->db->set('gap',$nilai_gap);
					$this->db->where('id_pelamar', $id_pelamar)
							 ->where('id_subkriteria', $id_subkriteria)
							 ->where('id_divisi', $divisi)				;
					$this->db->update('match_subkriteria');
					
				}
			}
	
			$terbobot 	= array();
			foreach ($gap as $id_pelamar => $data) {
				$terbobot[$id_pelamar] = array();
				foreach ($data as $id_subkriteria => $value) {
					$ngap = $value;
					$bobot_gap = 0;
	
					if($ngap == 0){
						$bobot_gap = 5;
					} elseif ($ngap == 1){
						$bobot_gap = 4.5;
					} elseif ($ngap == -1){
						$bobot_gap = 4;
					} elseif ($ngap == 2){
						$bobot_gap = 3.5;
					} elseif ($ngap == -2){
						$bobot_gap = 3;
					} elseif ($ngap == 3){
						$bobot_gap = 2.5;
					} elseif ($ngap == -3){
						$bobot_gap = 2;
					} elseif ($ngap == 4){
						$bobot_gap = 1.5;
					} elseif ($ngap == -4){
						$bobot_gap = 1;
					}
	
					$terbobot[$id_pelamar][$id_subkriteria] 	= $bobot_gap;
					//print_r($terbobot[$id_pelamar][$id_subkriteria]);echo"<br>";
					$bobot_nilai 								= $terbobot[$id_pelamar][$id_subkriteria];							
					$this->db->set('bobot_nilai',$bobot_nilai);
					$this->db->where('id_pelamar', $id_pelamar)
							 ->where('id_subkriteria', $id_subkriteria)
							 ->where('id_divisi', $divisi);
					$this->db->update('match_subkriteria');
				}
			}
			
			$nilaitotal = array();
			foreach($terbobot as $id_pelamar => $val){
				foreach($subkriteria as $id_subkriteria => $value){
					$nilaitotal[$id_pelamar][$id_subkriteria] = $value[5] * $val[$id_subkriteria];
					// print_r($nilaitotal[$id_pelamar][$id_subkriteria]);   echo"   "; print_r( $value[5]); echo"   ";
					// print_r($val[$id_subkriteria]); echo"<br>";
					
				}
			}

			$id_kriteria = array();
		$cf			= array();
		$sf			= array();
		$hasilpm = array();
		foreach($nilaitotal as $id_pelamar =>$data){
			foreach($data as $id_subkriteria => $value){
				
				$id_kriteria = $subkriteria[$id_subkriteria][0];
				if($subkriteria[$id_subkriteria][4] == 'CF'){
					$cf[$id_kriteria][$id_subkriteria] = $value;
					// echo"cf : <br>";
					// print_r([$id_subkriteria]);echo"<br><br>"; print_r($cf[$id_kriteria][$id_subkriteria]);
					// echo"<br><br>";
				} else {
					$sf[$id_kriteria][$id_subkriteria] = $value;
					// echo"sf : <br>";
					// print_r([$id_subkriteria]);echo"<br><br>"; print_r($sf[$id_kriteria][$id_subkriteria]);
					// echo"<br><br>";
				}
			}
			//print_r($cf);

			foreach($kriteria as $id_kriteria => $value){
				
				$hasilpm[$id_pelamar][$id_kriteria] = array_sum($cf[$id_kriteria]) / count($cf[$id_kriteria]) * 0.6 + array_sum($sf[$id_kriteria])/ count($sf[$id_kriteria]) * 0.4;		
				echo"CF id Kriteria : "; print_r($cf[$id_kriteria]); echo"   <br>  ";
				echo"SF id Kriteria : "; print_r($sf[$id_kriteria]); 
				print_r($hasilpm[$id_pelamar][$id_kriteria]); echo"   <br>  ";

				$total_nilai = $hasilpm[$id_pelamar][$id_kriteria];
				
				$this->db->where('id_pelamar',$id_pelamar)
						->where('id_divisi',$divisi)
						->where('id_kriteria',$id_kriteria)
						->set('nilai_total',$total_nilai);
				$this->db->update('match_kriteria');	

			}
			
		}

			
			$nilaiakhir = 0;
			foreach($hasilpm as $id_pelamar => $datapm){			
				if(!isset($nilaiakhir)){
					$nilaiakhir = 0;
				}
				foreach ($datapm as $id_kriteria => $nilai_total){	
						$nilaiakhir += round($nilai_total * $kriteria[$id_kriteria][2],4);
				}		
				$this->db->where('id_pelamar', $id_pelamar);
				$this->db->set('nilai_akhir', $nilaiakhir);
				$this->db->set('status_akhir',0);
				$this->db->update('hasil_akhir');
			}

		$this->session->set_flashdata('success', 'Data Penilaian Pelamar Berhasil Diubah');
		//redirect('C_PenilaianPelamar/index');
	}


	function cari_keyword()
	{
		$data['pagination'] = $this->pagination->create_links();
		$data['keyword'] 	= $this->input->post("keyword");
		$data['n_pelamar']	= $this->M_Pendataan->cari_npelamar($data['keyword']);
		$this->load->view('admin/F_PenilaianPelamar', $data);
	}


	function edit_nilai_pelamar($id_pelamar)
	{
		//$data['kriteria'] 		= $this->M_Proses->get_kriteria()->result_array();
		$data['kriteria'] 		= $this->M_Pendataan->get_subkriteria()->result_array();
		
		//where tanda=1
		$data['pelamar'] 		= $this->M_Pendataan->data_pelamar();
		$data['penilaian'] 		= $this->M_Pendataan->ambil_id_penilaian();
		$data['JmlKriteria'] 	= $this->M_Pendataan->getjmlsubkriteria();
		
		$data['npelamar'] 		= $this->M_Pendataan->data_nilai_pelamar($id_pelamar)->result();
		$data['nilai_tes'] 		= $this->M_Pendataan->data_nilai_pelamar($id_pelamar)->result_array();
		$this->load->view('admin/penilaian_pelamar/F_PenilaianPelamar_Edit', $data);
	}

	function add_nilai_pelamar($id_pelamar)
	{
		//$data['kriteria'] 		= $this->M_Proses->get_kriteria()->result_array();
		$data['kriteria'] 		= $this->M_Pendataan->get_subkriteria()->result_array();		
		//where tanda=1

		$data['pelamar'] 		= $this->M_Pendataan->data_pelamar();

		$data['penilaian'] 		= $this->M_Pendataan->ambil_id_penilaian();
		$data['JmlKriteria'] 	= $this->M_Pendataan->getjmlsubkriteria();
		
		$get_pelamar		= $this->M_Pendataan->get_pelamar($id_pelamar)->result_array();
		
		if($get_pelamar[0]['tanda'] == 0){
			$data['npelamar'] 		= $this->M_Pendataan->get_pelamar($id_pelamar)->result();
			$data['nilai_tes'] 		= $this->M_Pendataan->data_nilai_pelamar($id_pelamar)->result_array();
			$this->load->view('admin/penilaian_pelamar/F_PenilaianPelamar_Add', $data);
		} else {
			
			$this->session->set_flashdata('info-penilaian', 'Data Penilaian Pelamar Sudah Disimpan');
			redirect('C_Pelamar/index');
		}
		
	}

	function view_nilai_pelamar($id_pelamar)
	{
		$data['JmlKriteria'] 	= $this->M_Pendataan->getjmlsubkriteria();
		$data['npelamar'] 		= $this->M_Pendataan->data_nilai_pelamar($id_pelamar)->result();
		$this->load->view('admin/penilaian_pelamar/F_PenilaianPelamar_View', $data);
	}

	
		
}
