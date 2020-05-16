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
				 ->from('perbandingan_kriteria')
				 ->order_by('id_kriteria1', 'ASC');
		$nilai = $this->db->get();
		return $nilai;

	}

	// memasukkan bobot nilai perbandingan kriteria
	// function inputDataPerbandinganKriteria() 
	// {
	// 	$n = 3;
	// 	$data = array();
	// 	$urut=0;

	// 	// for ($x=0; $x <= ($n-2) ; $x++) {
	// 	// 	for ($y=($x+1); $y <= ($n-1) ; $y++) {
								
	// 	// 		if($x === $x){
	// 	// 			$item = [
	// 	// 						'id_kriteria1' => $x,
	// 	// 						'id_kriteria2' => $x,
	// 	// 						'nilai_pembanding' => 1
	// 	// 					];
				
	// 	// 					array_push($data, $item);
	// 	// 		} elseif ($x < $y){

	// 	// 			$item = [
	// 	// 						'id_kriteria1' => $this->input->post('kriteria1_'.$urut),
	// 	// 						'id_kriteria2' => $this->input->post('kriteria2_'.$urut),
	// 	// 						'nilai_pembanding' => $this->input->post('nilai_pembanding'.$urut)
	// 	// 					];
	// 	// 					array_push($data, $item);

	// 	// 		}
								
	// 	// 		$item = [
	// 	// 			'id_kriteria1' => $this->input->post('kriteria2_'.$urut),
	// 	// 			'id_kriteria2' => $this->input->post('kriteria1_'.$urut),
	// 	// 			'nilai_pembanding' => 1/$this->input->post('nilai_pembanding'.$urut)
	// 	// 		];
	// 	// 			array_push($data, $item);

	// 	// 		$urut++;
	// 	// 	}			
	// 	// }
	// 	// $this->db->empty_table('perbandingan_kriteria');
	// 	// $this->db->insert_batch('perbandingan_kriteria', $data);
		

	// 	for ($x=1; $x <= $n; $x++) {
		
	// 		for ($y=($x+1); $y <= $n ; $y++) {
	// 			$urut;
	// 			$item = [
	// 				'id_kriteria1' => $this->input->post('kriteria1_'.$urut),
	// 				'id_kriteria2' => $this->input->post('kriteria2_'.$urut),
	// 				'nilai_pembanding' => $this->input->post('nilai_pembanding'.$urut)
	// 			];
	// 			array_push($data, $item);

	// 			$item = [
	// 				'id_kriteria1' => $this->input->post('kriteria2_'.$urut),
	// 				'id_kriteria2' => $this->input->post('kriteria1_'.$urut),
	// 				'nilai_pembanding' => 1/$this->input->post('nilai_pembanding'.$urut)
	// 			];
	// 			array_push($data, $item);
	// 		}
	// 		$item = [
	// 			'id_kriteria1' => $x,
	// 			'id_kriteria2' => $x,
	// 			'nilai_pembanding' => 1
	// 		];

	// 		array_push($data, $item);

	// 	}

	// 	$this->db->empty_table('perbandingan_kriteria');
	// 	$this->db->insert_batch('perbandingan_kriteria', $data);
	// }
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
	

	function inputDataPerbandinganKriteria() 
	{		
		// $n = $this->db->SELECT('count(id_kriteria) as total')
		// 		 ->FROM('kriteria');
		//$n = $this->db->get();
		$n= 3;

	//var_dump($n);
	//exit;
	//print_r($n);
	//exit;
		$urut=0;
		
		
		$data = array();


		for ($x=1; $x <= $n; $x++) {

			for ($y=($x+1); $y <= 3 ; $y++) {	
				if($x == ($y-1))
				{
					$item = [
						'id_kriteria1' => $x,
						'id_kriteria2' => $x,
						'nilai_pembanding' => 1
					];
		
					array_push($data, $item);
				}

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

		$this->db->empty_table('perbandingan_kriteria', $data);
		$this->db->insert_batch('perbandingan_kriteria', $data);
		
	}

	

	function get_nilai_perbandingan()
	{
		$n = 3;

		// for($i=1; $i<=$n; $i++){
		// $this->db->where('id_kriteria1',$i);
		// $tabel[$i] = $this->db->get('perbandingan_kriteria')->result();
		// }
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