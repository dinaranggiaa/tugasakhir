<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TargetKriteria extends MY_Controller {

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
		$config['base_url'] = site_url('C_TargetKriteria/index'); // site_url
		$config['total_rows'] = $this->db->count_all('target_kriteria');
		$config['per_page'] = 10; // record yang ditampilkan per halaman
		$config["uri segment"] = 3; // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['pagination'] = $this->pagination->create_links();

		$data['kode'] 		= $this->M_Pendataan->get_id_subkriteria();
		$data['posisi'] 	= $this->M_Pendataan->ambil_data_divisi();
		$data['kriteria'] 	= $this->M_Pendataan->ambil_data_kriteria()->result();
		$data['ntarget']	= $this->M_Pendataan->data_target_kriteria($config['per_page'], $data['page'])->result();
		$this->load->view('admin/F_TargetKriteria',$data);		
	}
	
	function cari_keyword()
	{
		$data['pagination'] = $this->pagination->create_links();

		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode'] 		= $this->M_Pendataan->get_id_kriteria();
		$data['ntarget']	= $this->M_Pendataan->cari_target_kriteria($data['keyword'])->result();
		$this->load->view('admin/F_TargetKriteria', $data);
	}
    

	function input_data()
	{
		$data['simpan'] 	= $this->M_Pendataan->simpan_target_kriteria();
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan');
		redirect('C_TargetKriteria/index');
	}

	function hapus_data($id_kriteria)
	{
		$data['subkriteria'] = $this->M_Pendataan->hapus_target_kriteria($id_kriteria);
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Dihapus');
		redirect('C_TargetKriteria/index');
	}

	function ubah_target_kriteria()
	{
		$id_subkriteria	 	= $this->input->post('id_subkriteria');
		$nm_subkriteria 	= $this->input->post('nm_subkriteria');
		$nilai_target 		= $this->input->post('nilai_target');
		$status_subkriteria = $this->input->post('status_subkriteria');
		
		$data = array('nm_subkriteria' 	=> $nm_subkriteria,
					'nilai_target' 		=> $nilai_target,
					'status_subkriteria'=> $status_subkriteria
		);

		$where = array('id_subkriteria' => $id_subkriteria);

		$data['subkriteria']	= $this->M_Pendataan->ubah_data($where, $data, 'subkriteria');
		$this->session->set_flashdata('success', 'Data Periode Berhasil Diubah');
		redirect('C_NTarget/index');
	}


	
}
