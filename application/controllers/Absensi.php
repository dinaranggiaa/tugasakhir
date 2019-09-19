<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends MY_Controller 
{

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
	$data['kode'] = $this->Pendataan_model->getIdCheckup();
    $data['pasientbc'] = $this->Pendataan_model->getListAbsensi();
    $this->load->view('absensi/list_absensi', $data);
  }


  function TampilData($no_faskes)
		{

			$data['pasientbc'] = $this->Pendataan_model->TampilCheckup($no_faskes);
			$this->load->view('absensi/list_absensi', $data);
		}


  function SimpanAbsensi()
  {
	   $data['absensi'] = $this->Pendataan_model->SimpanAbsensi();

	  redirect('Absensi/index');

  }

  function listpasien(){
  	$data = $this->Pendataan_model->getPasienCheckup();
  	echo json_encode($data);
  }

}
