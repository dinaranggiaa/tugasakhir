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
		$data['kode'] 		= $this->M_Pendataan->get_id_kriteria();
		$data['kriteria'] 	= $this->M_Pendataan->ambil_data_kriteria();
		$this->load->view('admin/F_Kriteria',$data);		
    }
    

	function simpan_kriteria()
	{
		$data['kriteria'] = $this->M_Pendataan->simpan_kriteria();
		redirect('C_Kriteria/index');
	}
	
	function hapus_kriteria($id_kriteria)
	{
		$data['kriteria'] = $this->M_Pendataan->hapus_kriteria($id_kriteria);
		redirect('C_Kriteria/index');
	}

	function ubah_kriteria()
	{
		$id_kriteria 		= $this->input->post('id_kriteria');
		$nm_kriteria 		= $this->input->post('nm_kriteria');
		$bobot_kriteria 	= $this->input->post('bobot_kriteria');
		
		$data 				= array('nm_kriteria'	 => $nm_kriteria,
									'bobot_kriteria' => $bobot_kriteria);

		$where 				= array('id_kriteria' => $id_kriteria);

		$data['kriteria'] 	= $this->M_Pendataan->ubah_kriteria($where, $data, 'kriteria');
		redirect('C_Kriteria/index');
	}

	function cari_keyword()
	{
		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode'] 		= $this->M_Pendataan->get_id_kriteria();
		$data['kriteria']	= $this->M_Pendataan->cari_kriteria($data['keyword']);
		$this->load->view('admin/F_Kriteria', $data);
	}

	

	
}
