<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Divisi extends MY_Controller {

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
		$data['kode'] 		= $this->M_Pendataan->get_id_divisi();
		$data['divisi'] 	= $this->M_Pendataan->ambil_data_divisi();
		$this->load->view('admin/F_divisi',$data);		
    }
    

	function simpan_divisi()
	{
		$data['divisi'] = $this->M_Pendataan->simpan_divisi();
		redirect('C_Divisi/index');
	}
	
	function hapus_divisi($id_divisi)
	{
		$data['divisi'] = $this->M_Pendataan->hapus_divisi($id_divisi);
		redirect('C_Divisi/index');
	}

	function ubah_divisi()
	{
		$id_divisi 		= $this->input->post('id_divisi');
		$nm_divisi 		= $this->input->post('nm_divisi');
		
		$data 				= array('nm_divisi'	 => $nm_divisi);

		$where 				= array('id_divisi' => $id_divisi);

		$data['divisi'] 	= $this->M_Pendataan->ubah_data($where, $data, 'divisi');
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Diubah');
		redirect('C_Divisi/index');
	}

	function cari_keyword()
	{
		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode'] 		= $this->M_Pendataan->get_id_divisi();
		$data['divisi']	= $this->M_Pendataan->cari_divisi($data['keyword']);
		$this->load->view('admin/F_Divisi', $data);
	}

	

	
}
