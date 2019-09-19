<?php
class petugas_model extends CI_Model{

	private $petugas = 'petugas';
	public $id_petugas;
	public $nm_petugas;
	public $username;

	public function __construct()
	{
		$this->load->database();
	}


	function cek_login($table, $where)
	{
		$petugas = $this->db->get_where($table, $where);

		if($petugas->num_rows() > 0)
		{
			return $petugas->row_array();
		}
		return false;
	}

	function SimpanPetugas()
		{
			if(isset($_POST['btnsimpan'])) //kalo klik btn simpan
			{
				$petugas = array(
					'id_petugas' => $this->input->post('id_petugas'),
					'nm_petugas' => $this->input->post('nm_petugas'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
				);

				$this->db->set($petugas);
				$this->db->insert('petugas');			}

			return true;
  		}

  	function idpetugas()
  	{
  			$this->db->select('RIGHT(petugas.id_petugas,2) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('petugas');


			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;

			} else {
				$kode = 1;
			}
			$kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
			$kodejadi = 'P'.$kodemax;

			return $kodejadi;
  	}


		public function getpetugas()
	{
		$query = $this->db->where('username ="'.$this->input->post('username').'" AND nm_petugas ="'.$this->input->post('nm_petugas').'"')->get('petugas');
		$data['petugas'] = $query->num_rows();


		if(empty($data['petugas']))
		{
			return false;
		}
		return true;
	}


	public function getData($username)
	{

		$this->db->SELECT('username, nm_petugas')
				->FROM('petugas')
				->where('username', $username);

		$petugas = $this->db->get();

		if($petugas->num_rows() == 0)
		{
			return $petugas->row_array();
		}
		return false;
	}



	public function login(){

		$query = $this->db->where('username ="'.$this->input->post('username').'" AND password ="'.$this->input->post('password').'"')->get('petugas');
		$data['petugas'] = $query->num_rows();

		if( empty($data['petugas']) ){
			return false;
		}
		else {
			$session_petugas = array(
								'idpetugas' => '$id_petugas',
								'nm_petugas' => '$nm_petugas',
								'uname' => '$username');

			return true;
		}
		$this->session->set_userdata($session_petugas);
		return $query;
	}

		//Menampilkan jumlah faskes
		function JmlPasienTbc()
		{
			$result = array();

			$this->db->SELECT('count(no_faskes) as total')
					->FROM('faskes');
			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->row_array();
			}

			return $result;

		}

		function JmlTerduga()
		{
			$result = array();

			$this->db->SELECT('count(id_register) as total')
					->FROM('register');
			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->row_array();
			}

			return $result;

		}

		function PasienMangkir()
		{
			$result = $this->db->query("select nm_pasien, pasien.no_hp, pmo.nm_pmo, pmo.no_hp_pmo, keterangan from pasien, pmo, faskes, register, checkup
												where register.nik_pasien = pasien.nik_pasien and faskes.id_register = register.id_register and faskes.nik_pmo = pmo.nik_pmo and checkup.no_faskes = faskes.no_faskes and datediff(current_date(), tgl_checkup) > 7 and keterangan = 'Tidak Hadir' group by pasien.nm_pasien");

			return $result->result();

		}
}
