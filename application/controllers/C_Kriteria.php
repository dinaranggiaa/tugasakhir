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
        $data['kode'] = $this->M_Pendataan->get_id_kriteria();
		$this->load->view('admin/f_kriteria',$data);		
    }
    
    function simpan_kriteria()
    {
        $id_kriteria = $this->input->post('id_kriteria');
        $nm_kriteria = $this->input->post('nm_kriteria');

        $data = ['id_kriteria' => $id_kriteria,
            'nm_kriteria' => $nm_kriteria
        ];
        $data = $this->M_Pendataan->simpan_kriteria($data);
        echo json_encode($data);
    }

    function ambil_data_kriteria()
		{
			$data = $this->M_Pendataan->ambil_data_kriteria();
			echo json_encode($data);
		}

	
}
