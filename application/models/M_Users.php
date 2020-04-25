<?php
class M_Users extends CI_Model{

	private $users = 'users';
	public $id_user;
	public $nm_user;
	public $username;
	public $password;

	public function __construct()
	{
		$this->load->database();
	}


	function cek_login($table, $where)
	{
		$users = $this->db->get_where($table, $where);

		if($users->num_rows() > 0)
		{
			return $users->row_array();
		}
		return false;
	}

	function SimpanPetugas()
	{
		if(isset($_POST['btnsimpan'])) //kalo klik btn simpan
		{
			$users = array(
				'id_user' => $this->input->post('id_user'),
				'nm_user' => $this->input->post('nm_user'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			);

			$this->db->set($users);
			$this->db->insert('users');			}
			return true;
  	}
	
	function ResetPassword($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

  	function idusers()
  	{
  			$this->db->select('RIGHT(users.id_user,2) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('users');


			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;

			} else {
				$kode = 1;
			}
			$kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
			$kodejadi = 'U'.$kodemax;

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

		$this->db->SELECT('username, nm_user')
				->FROM('users')
				->where('username', $username);

		$users = $this->db->get();

		if($users->num_rows() == 0)
		{
			return $users->row_array();
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
}
