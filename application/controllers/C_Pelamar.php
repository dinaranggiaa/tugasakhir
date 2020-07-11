<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pelamar extends MY_Controller {

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

	//Menampilkan Form Pendataan pelamar
		function index()
		{
			$config['base_url'] = site_url('C_Pelamar/index'); // site_url
			$config['total_rows'] = $this->db->count_all('pelamar');
			$config['per_page'] = 10; // record yang ditampilkan per halaman
			$config["uri segment"] = 3; // uri parameter
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);

			//Bootstrap -> Style pagination
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			

			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['kode'] 		= $this->M_Pendataan->get_id_pelamar();
			$data['periode'] 	= $this->M_Pendataan->ambil_data_periode();
			$data['divisi']		= $this->M_Pendataan->ambil_data_divisi();

			$data['pelamar'] 	= $this->M_Pendataan->ambil_data_pelamar($config['per_page'], $data['page']);
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/F_Pelamar', $data);
		}
		

		function tambah_pelamar()
		{
			$data['kode'] 	= $this->M_Pendataan->get_id_pelamar();
			$this->session->set_flashdata('success', 'Data Pelamar Berhasil Disimpan');
			$this->load->view('admin/F_Pelamar_Entri', $data);
		}

		function simpan_pelamar()
		{
			$data['pelamar'] = $this->M_Pendataan->simpan_pelamar();
			$this->session->set_flashdata('success', 'Data Pelamar Berhasil Disimpan');
			redirect('C_Pelamar/index');
		}

		function hapus_pelamar($id_pelamar)
		{
			$data['pelamar'] = $this->M_Pendataan->hapus_pelamar($id_pelamar);
			$this->session->set_flashdata('success', 'Data Pelamar Berhasil Dihapus');
			redirect('C_Pelamar/index');
		}

		function ubah_pelamar()
		{
			$id_pelamar 		= $this->input->post('id_pelamar');
			$id_divisi	 		= $this->input->post('id_divisi');
			$id_periode	 		= $this->input->post('id_periode');
			$tgl_daftar 		= $this->input->post('tgl_daftar');
			$nm_pelamar 		= $this->input->post('nm_pelamar');
			$almt_pelamar 		= $this->input->post('almt_pelamar');
			$nohp_pelamar 		= $this->input->post('nohp_pelamar');
	 
			$data = array(
				'tgl_daftar' 		=> $tgl_daftar,
				'id_periode'		=> $id_periode,
				'id_divisi' 		=> $id_divisi,
				'nm_pelamar' 		=> $nm_pelamar,
				'almt_pelamar' 		=> $almt_pelamar,
				'nohp_pelamar' 		=> $nohp_pelamar				
			);
	
			$where 				= array('id_pelamar' => $id_pelamar);

			$data['pelamar']	= $this->M_Pendataan->ubah_data($where, $data, 'pelamar');
			$this->session->set_flashdata('success', 'Data Pelamar Berhasil Disimpan');
			redirect('C_Pelamar/index');
		}

			function cari_keyword()
		{
			$data['pagination'] = $this->pagination->create_links();
			$data['keyword'] 	= $this->input->post("keyword");
			$data['kode'] 		= $this->M_Pendataan->get_id_pelamar();
			$data['pelamar']	= $this->M_Pendataan->cari_pelamar($data['keyword']);
			$this->load->view('admin/F_Pelamar', $data);
		}

		

}
