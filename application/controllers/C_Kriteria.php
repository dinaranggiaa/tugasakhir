<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kriteria extends MY_Controller {

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
		$config['base_url'] = site_url('C_Kriteria/index'); // site_url
		$config['total_rows'] = $this->db->count_all('kriteria');
		$config['per_page'] = 5; // record yang ditampilkan per halaman
		$config["uri segment"] = 3; // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$data['kode'] 		= $this->M_Pendataan->get_id_kriteria();
		$data['kriteria'] 	= $this->M_Pendataan->ambil_data_kriteria($config['per_page'], $data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('admin/F_Kriteria',$data);		
    }
    

	function simpan_kriteria()
	{
		$data['kriteria'] = $this->M_Pendataan->simpan_kriteria();
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan');
		redirect('C_Kriteria/index');
	}
	
	function hapus_kriteria($id_kriteria)
	{
		$data['kriteria'] = $this->M_Pendataan->hapus_kriteria($id_kriteria);
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Dihapus');
		redirect('C_Kriteria/index');
	}

	function ubah_kriteria()
	{
		$id_kriteria 		= $this->input->post('id_kriteria');
		$nm_kriteria 		= $this->input->post('nm_kriteria');
		
		$data 				= array('nm_kriteria'	 => $nm_kriteria);

		$where 				= array('id_kriteria' => $id_kriteria);

		$data['kriteria'] 	= $this->M_Pendataan->ubah_data($where, $data, 'kriteria');
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Diubah');
		redirect('C_Kriteria/index');
	}


	function cari_keyword()
	{
		$data['pagination'] = $this->pagination->create_links();
		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode'] 		= $this->M_Pendataan->get_id_kriteria();
		$data['kriteria']	= $this->M_Pendataan->cari_kriteria($data['keyword']);
		$this->load->view('admin/F_Kriteria', $data);
	}

	

	
}
