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

	//Mengambil Target Kriteria
	function getntarget()
	{
		$this->db->select('nilai_target')
				 ->from('subkriteria')
				 ->order_by('id_subkriteria');
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

	//get from nilai target
	function get_tkriteria($id_divisi)
	{
		$this->db->select('*')
				 ->from('nilai_target')
				 ->where('id_divisi', $id_divisi)
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

	function NmKriteria()
	{
		$result = $this->db->query("select distinct kriteria.nm_kriteria
									from subkriteria, kriteria 
									where kriteria.id_kriteria = subkriteria.id_kriteria;");
		return $result->result_array();
	}

	function IdSubkriteria()
	{
		$result = $this->db->query("select id_kriteria from subkriteria;");
		return $result->result_array();
	}

	function Idkriteria()
	{
		$result = $this->db->query("select id_kriteria from kriteria;");
		return $result->result_array();
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

	// <!--  PROSES PROFILE MATCHING -->
	function get_alternatif($bulan,$tahun)
	{
		$result = $this->db->query("select a.id_pelamar, a.nm_pelamar, d.id_subkriteria, d.nm_subkriteria,
		c.nilai_tes, b.bulan, b.tahun
		from pelamar a, periode b, nilai_alternatif c, subkriteria d 
		where a.id_periode = b.id_periode
		and a.id_pelamar = c.id_pelamar
		and c.id_subkriteria = d.id_subkriteria
		and b.bulan = '$bulan' and b.tahun='$tahun'");
		return $result->result_array();
	}

	function getjmlsubkriteria()
	{
		$result = array();
		$this->db->SELECT('count(id_subkriteria) as total')
				 ->FROM('subkriteria');
		$kriteria = $this->db->get();
		if($kriteria->num_rows() > 0)
		{
			$result = $kriteria->row_array();
		}
		return $result;
	}

	function getnmsubkriteria()
	{
		$this->db->select('nm_subkriteria')
				 ->from('subkriteria')
				 ->order_by('id_subkriteria');
		$kriteria = $this->db->get();
		return $kriteria;
	}

	function getidkriteria_sub()
	{
		$this->db->select('id_kriteria')
				 ->from('subkriteria')
				 ->order_by('id_subkriteria');
		$kriteria = $this->db->get();
		return $kriteria;
	}

	// 	function get_alternatif($bulan,$tahun,$id_divisi)
	// {
	// 	$result = $this->db->query("select distinct a.id_pelamar, a.id_divisi, a.nm_pelamar, d.id_kriteria, d.nm_kriteria,
	// 	c.nilai_tes, b.bulan, b.tahun
	// 	from pelamar a, periode b, nilai_alternatif c, kriteria d, divisi e
	// 	where a.id_periode = b.id_periode
	// 	and a.id_pelamar = c.id_pelamar
	// 	and c.id_kriteria = d.id_kriteria
    // 	and e.id_divisi  = a.id_divisi
	// 	and b.bulan = '$bulan' and b.tahun='$tahun' and e.id_divisi='$id_divisi';");
	// 	return $result->result_array();
	// }

	//Mengambil Nama Kriteria
	function getnmpelamar($bulan, $tahun)
	{
		$result = $this->db->query("select a.nm_pelamar from pelamar a, periode b
		where a.id_periode = b.id_periode and bulan= '$bulan' and tahun='$tahun'");
		return $result->result_array();
	}

	function data_alternatif()
	{
		$result = $this->db->query("select a.id_pelamar, a.nm_pelamar, d.id_subkriteria, d.nm_subkriteria,
		c.nilai_tes, b.bulan, b.tahun
		from pelamar a, periode b, nilai_alternatif c, subkriteria d 
		where a.id_periode = b.id_periode
		and a.id_pelamar = c.id_pelamar
		and c.id_subkriteria = d.id_subkriteria");
		return $result->result_array();
	}
	
	// function data_penilaian()
	// {
	// 	$result = $this->db->query("select * from nilai_alternatif a join kriteria b
	// 	using (id_kriteria);");
	// 	return $result;
	// }

	// function get_jmlpelamar($bulan, $tahun) {

	// 	$result = array();
	// 	$this->db->SELECT('count(id_pelamar) as total')
	// 			 ->FROM('pelamar, periode')
	// 			 ->WHERE('periode.id_periode = pelamar.id_pelamar')
	// 			 ->WHERE('periode.bulan', $bulan)
	// 			 ->WHERE('periode.tahun',$tahun);
				 
	// 	$pelamar = $this->db->get();
	// 	if($pelamar->num_rows() > 0)
	// 	{
	// 		$result = $pelamar->row_array();
	// 	}
	// 	return $result;
	// }

	function get_subkriteria()
	{
		$this->db->select('*')
				 ->from('subkriteria')
				 ->order_by('id_subkriteria');
		$kriteria = $this->db->get();
		return $kriteria;
	}

	function get_jmlpelamar($bulan,$tahun)
	{
		$result = $this->db->query("select count(id_pelamar) as total 
		from pelamar, periode where periode.id_periode = pelamar.id_periode and bulan='$bulan' and tahun='$tahun'");
		return $result->row_array();;
	}

	function getnilaialternatif($bulan, $tahun) 
	{
		$result = $this->db->query("select nilai_tes from nilai_alternatif join pelamar using (id_pelamar) join periode d using (id_periode) where bulan='$bulan' and tahun='$tahun';");
		return $result->result_array();

	}

	function data_penilaian($bulan,$tahun)
	{
		$result = $this->db->query("select * from nilai_alternatif a join subkriteria b
		using (id_subkriteria) join pelamar c using (id_pelamar)
		join periode d using (id_periode)
		where bulan='$bulan' and tahun='$tahun'");
		return $result;
	}


}