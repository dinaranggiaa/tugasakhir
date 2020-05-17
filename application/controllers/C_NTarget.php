<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_NTarget extends MY_Controller {

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
		//where tanda=1
		$data['tkriteria'] 	= $this->M_Pendataan->data_kriteria();
		$this->load->view('admin/F_NTarget',$data);		
    }
    

	function input_data()
	{
		$data['simpan'] 	= $this->M_Pendataan->simpan_ntarget();
		$id_kriteria 		= $this->input->post('id_kriteria');
		$nilai_target		= $this->input->post('nilai_target');
		$status_kriteria	= $this->input->post('status_kriteria');
		$tanda 				= 1;
		
		$data 				= array('tanda' 			=> $tanda,
									'nilai_target'		=> $nilai_target,
									'status_kriteria'	=> $status_kriteria);

		$where 				= array('id_kriteria' 		=> $id_kriteria);

		$data['kriteria'] 	= $this->M_Pendataan->ubah_kriteria($where, $data, 'kriteria');
		redirect('C_NTarget/index');
	}
	
	function hapus_kriteria($id_kriteria)
	{
		$data['kriteria'] = $this->M_Pendataan->hapus_kriteria($id_kriteria);
		redirect('C_NTarget/index');
	}

	function ubah_kriteria()
	{
		$id_kriteria 		= $this->input->post('id_kriteria');
		$nilai_target 		= $this->input->post('nilai_target');
		$status_kriteria 	= $this->input->post('status_kriteria');
		
		$data = array(
			'nilai_target' 		=> $nilai_target,
			'status_kriteria' 	=> $status_kriteria
		);

		$where = array('id_kriteria' => $id_kriteria);

		$data['kriteria']	= $this->M_Pendataan->ubah_kriteria($where, $data, 'kriteria');
		redirect('C_NTarget/index');
	}

	function cari_keyword()
	{
		$data['keyword'] 	= $this->input->post("keyword");
		$data['kode'] 		= $this->M_Pendataan->get_id_kriteria();
		$data['kriteria']	= $this->M_Pendataan->cari_kriteria($data['keyword']);
		$this->load->view('admin/F_Kriteria', $data);
	}

	
}
