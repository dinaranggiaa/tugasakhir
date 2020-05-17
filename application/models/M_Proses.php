<?php
class M_Proses extends MY_Model {
	
	private	$pelamar 	= 'pelamar'; //Tabel
	public 	$id_pelamar;
	public 	$nm_pelamar;
	public 	$jk_pelamar;
	public 	$almt_pelamar;
	public 	$pendidikan_akhir;
		
	private $kriteria 	= 'kriteria';
	public 	$id_kriteria;
	public 	$nm_kriteria;
	public 	$bobot_kriteria;

	private $periode 	= 'periode';
	public 	$id_periode;
	public 	$bulan;
	public 	$tgl_pembukaan;

	private $users 		= 'users';
	public 	$id_user;
	public 	$nm_user;
	public 	$username;
	public 	$password;
	public 	$level;

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
		$result 	= array();
		$kriteria	= $this->db->SELECT('count(id_kriteria) as total')
				 				->FROM('kriteria');
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

	function get_jmlkriteria() {

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
		

	function get_nilai_perbandingan()
	{
		$n = 3;
		$urut = 0;
		$matriksA = array();
		for($i=1; $i<=$n; $i++){
			for($j=1; $j<=$n; $j++){
				$urut++;
				$this->db->where('id_kriteria1','ASC',$urut);
				$matriksA[$i][$j] = $this->db->get('perbandingan_kriteria')->result_array();

			}
		}		

		$matriksB = array();
		$matriksC = array();

		for($x=1; $x<=$n; $x++){
			for($y=1; $y<=$n; $y++){
				for($z=1; $z<=$n; $z++){
					$matriksC[$y][$x] = $matriksC[$y][$z] + ($matriksA[$y][$z] * $matriksB[$z][$x]);
				}
			}
		}

	}


}