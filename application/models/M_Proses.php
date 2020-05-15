<?php
class M_Proses extends MY_Model {
	
	private $pelamar = 'pelamar'; //Tabel
	public $id_pelamar;
	public $nm_pelamar;
	public $jk_pelamar;
	public $almt_pelamar;
	public $pendidikan_akhir;
		
	private $kriteria = 'kriteria';
	public $id_kriteria;
	public $nm_kriteria;
	public $bobot_kriteria;

	private $periode = 'periode';
	public $id_periode;
	public $bulan;
	public $tgl_pembukaan;

	private $users = 'users';
	public $id_user;
	public $nm_user;
	public $username;
	public $password;
	public $level;

	public function __construct()
	{
		$this->load->database();
	}
	
	//Mengambil Nama Kriteria
	function getNamaKriteria()
	{
		$this->db->select('nm_kriteria')
				 ->from('kriteria')
				 ->order_by('id_kriteria');
		$kriteria = $this->db->get();
		return $kriteria;
	}
	
	//Mengambil Jumlah Kriteria
	function getJmlKriteria()
	{
		$result = array();
		$this->db->SELECT('count(id_kriteria) as total')
				 ->FROM('kriteria');
		$kriteria = $this->db->get();
		if($kriteria->num_rows() > 0)
		{
			$result = $kriteria->row_array();
		}
		return $result;
	}

	function get_kriteria()
	{
		$this->db->select('*')
				 ->from('kriteria')
				 ->order_by('id_kriteria');
		$kriteria = $this->db->get();
		return $kriteria;

	}

	//Mencari ID Kriteria
	//Berdasarkan urutan ke berapa
	function getIdKriteria()
	{
		$this->db->select('id_kriteria')
				 ->from('kriteria')
				 ->order_by('id_kriteria');
		$kriteria = $this->db->get();
		return $kriteria;

	}

	//Mencari Nama Kriteria
	//Berdasarkan urutan ke berapa
	function getNmKriteria()
	{
		$this->db->select('nm_kriteria')
				 ->from('kriteria')
				 ->order_by('id_kriteria');
		$kriteria = $this->db->get();


		return $kriteria;
	}

	// mencari nilai bobot perbandingan kriteria
	function getNilaiPerbandinganKriteria() 
	{
		$this->db->select('nilai_pembanding')
				 ->from('perbandingan_kriteria');
		$nilai = $this->db->get();
		return $nilai;

	}

	// memasukkan bobot nilai perbandingan kriteria
	function inputDataPerbandinganKriteria() 
	{
		$n = 3;
		$urut=0;
		

		$data = array();

		for ($x=1; $x <= 3; $x++) {
			// $item = [
			// 	'id_kriteria1' => $x,
			// 	'id_kriteria2' => $x,
			// 	'nilai_pembanding' => 1.0000
			// ];

			// array_push($data, $item);

			for ($y=($x+1); $y <= 3 ; $y++) {

				$item = [
					'id_kriteria1' => $this->input->post('kriteria1_'.$x.$y),
					'id_kriteria2' => $this->input->post('kriteria2_'.$x.$y),
					'nilai_pembanding' => $this->input->post('nilai_pembanding'.$x.$y)
				];
				array_push($data, $item);

				$item = [
					'id_kriteria1' => $this->input->post('kriteria2_'.$x.$y),
					'id_kriteria2' => $this->input->post('kriteria1_'.$x.$y),
					'nilai_pembanding' => 1/$this->input->post('nilai_pembanding'.$x.$y)
				];
				array_push($data, $item);
			}
		}

		$this->db->insert_batch('perbandingan_kriteria', $data);
	}

	function get_kriteria1()
	{
	  $this->db->select('nm_kriteria');
	  return $this->db->get('kriteria')->result();
	}

	function get_nilai_perbandingan()
  {
    $this->db->order_by('id_kriteria1','asc');
    $this->db->order_by('id_kriteria2','asc');
    return $this->db->get('perbandingan_kriteria')->result();
  }
}