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
	
	function get_target_kriteria($divisi)
	{
		$result = $this->db->query(" SELECT kriteria.nm_kriteria, kriteria.id_kriteria, target_kriteria.* 
									FROM kriteria, target_kriteria
									WHERE kriteria.id_kriteria = target_kriteria.id_kriteria AND id_divisi='$divisi'
									ORDER BY target_kriteria.id_kriteria ASC");
		return $result;
	}

	function get_data_target_kriteria()
	{
		$result = $this->db->query(" SELECT kriteria.nm_kriteria, kriteria.id_kriteria, target_kriteria.* 
									FROM kriteria, target_kriteria
									WHERE kriteria.id_kriteria = target_kriteria.id_kriteria
									ORDER BY target_kriteria.id_kriteria ASC");
		return $result;
	}

	function get_target_subkriteria($divisi)
	{
		$result = $this->db->query(" SELECT a.*, b.*, c.*
									FROM target_subkriteria a, subkriteria b, kriteria c
									WHERE a.id_subkriteria = b.id_subkriteria
									AND b.id_kriteria = c.id_kriteria
									AND id_divisi='$divisi'
									ORDER BY a.id_subkriteria ASC");
		return $result;
	}

	function get_nama_target_kriteria($divisi)
	{
		$result = $this->db->query(" select kriteria.nm_kriteria from kriteria, target_kriteria
		where kriteria.id_kriteria = target_kriteria.id_kriteria 
		and id_divisi='$divisi'");
		return $result;
	}

	function get_id_target_kriteria($divisi)
	{
		$result = $this->db->query(" select target_kriteria.id_kriteria from kriteria, target_kriteria
		where kriteria.id_kriteria = target_kriteria.id_kriteria 
		and id_divisi='$divisi'");
		return $result;
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

	

	//Mengambil Target Sub Kriteria
	function getntarget($divisi)
	{
		$this->db->select('nilai_target')
				 ->from('target_subkriteria')
				 ->where('id_divisi', $divisi)
				 ->order_by('id_subkriteria ASC');
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

	function getnilaipelamar($bulan, $tahun, $divisi) 
	{
		$nilai = $this->db->query(" SELECT nilai_tes
		FROM pelamar inner join nilai_alternatif 
    	ON pelamar.id_pelamar = nilai_alternatif.id_pelamar INNER JOIN periode on
        periode.id_periode = pelamar.id_periode and bulan='$bulan' and tahun='$tahun' and pelamar.id_divisi='$divisi'");
		
		return $nilai;
	}

	//LAGI BUAT NAMPILIN NILAI ARRAY PROSES AHP

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
	
	function get_jml_target_kriteria($divisi) {

		$result = array();
		$this->db->SELECT('count(id_kriteria) as total')
				->WHERE('id_divisi', $divisi)
				 ->FROM('target_kriteria');
		$kriteria = $this->db->get();
		if($kriteria->num_rows() > 0)
		{
			$result = $kriteria->row_array();
		}
		return $result;
	}

	
	function get_jmlsubkriteria() {

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

	function get_jmlkaryawan() {

		$result = array();
		$this->db->SELECT("count(id_karyawan) as total")
				 ->FROM("karyawan")
				 ->WHERE("status_kerja = 'Aktif'");
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
	function get_alternatif($bulan,$tahun,$divisi)
	{
		$result = $this->db->query("SELECT c.*, a.nm_pelamar, d.id_subkriteria, d.nm_subkriteria,
		b.bulan, b.tahun
		from pelamar a, periode b, nilai_alternatif c, subkriteria d 
		where a.id_periode = b.id_periode
		and a.id_pelamar = c.id_pelamar
		and c.id_subkriteria = d.id_subkriteria
		and b.bulan = '$bulan' and b.tahun='$tahun' and a.id_divisi = '$divisi'");
		return $result->result_array();
	}

	function get_nilaiakhir($bulan,$tahun)
	{
		$result = $this->db->query("SELECT c.id_pelamar
		FROM pelamar a, periode b, hasil_akhir c
		WHERE a.id_periode = b.id_periode
		AND a.id_pelamar = c.id_pelamar
		AND b.bulan = '$bulan' AND b.tahun='$tahun'");
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

	function hitungkriteria()
	{
		$result = array();
		$this->db->SELECT('count(id_kriteria) as total')
				 ->FROM('kriteria');
		$kriteria = $this->db->get();

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

	//Nama pelamar yang sudah masuk ke tabel nilai alternatif
	function getnpelamar($bulan, $tahun)
	{
		$result = $this->db->query(" SELECT DISTINCT nilai_alternatif.id_pelamar, nm_pelamar
									FROM pelamar inner join nilai_alternatif 
									ON pelamar.id_pelamar = nilai_alternatif.id_pelamar 
									INNER JOIN periode on periode.id_periode = pelamar.id_periode 
									and bulan= '$bulan' and tahun='$tahun'");
		return $result->result_array();
	}

	function getnamapelamar($bulan, $tahun, $divisi)
	{
		$result = $this->db->query(" SELECT DISTINCT nm_pelamar
									FROM pelamar inner join nilai_alternatif 
									ON pelamar.id_pelamar = nilai_alternatif.id_pelamar 
									INNER JOIN periode on periode.id_periode = pelamar.id_periode 
									and bulan= '$bulan' and tahun='$tahun' and id_divisi='$divisi'");
		return $result->result_array();
	}

	function getgappelamar($bulan, $tahun)
	{
		$result = $this->db->query(" SELECT gap
									FROM pelamar inner join nilai_alternatif 
									ON pelamar.id_pelamar = nilai_alternatif.id_pelamar 
									INNER JOIN periode on periode.id_periode = pelamar.id_periode 
									and bulan= '$bulan' and tahun='$tahun'");
		return $result->result_array();
	}

	function getbobotpelamar($bulan, $tahun)
	{
		$result = $this->db->query(" SELECT bobot_nilai
									FROM pelamar inner join nilai_alternatif 
									ON pelamar.id_pelamar = nilai_alternatif.id_pelamar 
									INNER JOIN periode on periode.id_periode = pelamar.id_periode 
									and bulan= '$bulan' and tahun='$tahun'");
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

	function get_jmlnpelamar($bulan,$tahun,$divisi)
	{
		$result = $this->db->query("SELECT count(DISTINCT nilai_alternatif.id_pelamar) as total
									FROM pelamar inner join nilai_alternatif 
    								ON pelamar.id_pelamar = nilai_alternatif.id_pelamar 
									INNER JOIN periode 
									ON periode.id_periode = pelamar.id_periode 
									AND bulan='$bulan' AND tahun='$tahun' AND pelamar.id_divisi='$divisi'");
		return $result->row_array();
	}

	function get_jml_subkriteria($divisi)
	{
		$result = $this->db->query("SELECT count(id_divisi) as total
									FROM target_subkriteria
									WHERE id_divisi='$divisi'");
		return $result->row_array();
	}

	function get_jml_kriteria($divisi)
	{
		$result = $this->db->query("SELECT count(id_divisi) as total
									FROM target_kriteria
									WHERE id_divisi='$divisi'");
		return $result->row_array();
	}

	function getnilaialternatif($bulan, $tahun) 
	{
		$result = $this->db->query("select nilai_tes from nilai_alternatif join pelamar using (id_pelamar) join periode d using (id_periode) where bulan='$bulan' and tahun='$tahun';");
		return $result->result_array();

	}

	function data_penilaian($bulan,$tahun,$divisi)
	{
		$result = $this->db->query("SELECT a.*, c.id_divisi FROM nilai_alternatif a JOIN subkriteria b
		USING (id_subkriteria) JOIN pelamar c USING (id_pelamar)
		JOIN periode d USING (id_periode)
		WHERE bulan='$bulan' AND tahun='$tahun' AND id_divisi='$divisi'");
		return $result;
	}

	function data_match_subkriteria($bulan,$tahun,$divisi)
	{
		$result = $this->db->query("select a.* from match_subkriteria a, pelamar b, periode c
		where a.id_pelamar = b.id_pelamar
		and c.id_periode = b.id_periode
		and bulan='$bulan' and tahun='$tahun' and a.id_divisi='$divisi'");
		return $result;
	}

	function data_hasil_akhir($bulan,$tahun,$divisi)
	{
		$result = $this->db->query("SELECT a.*, c.nm_pelamar FROM hasil_akhir a 
		JOIN pelamar c USING (id_pelamar)
		JOIN periode d USING (id_periode)
		WHERE bulan='$bulan' AND tahun = '$tahun' AND c.id_divisi='$divisi'
		ORDER BY nilai_akhir DESC");
		return $result;
	}

	function data_match_kriteria($bulan,$tahun,$divisi)
	{
		$result = $this->db->query("select a.* from match_kriteria a, pelamar b, periode c
		where a.id_pelamar = b.id_pelamar
		and c.id_periode = b.id_periode
		and bulan='$bulan' and tahun='$tahun' and a.id_divisi='$divisi'");
		return $result;
	}

	function data_npelamar($id_pelamar)
	{
		$result = $this->db->query("select * from nilai_alternatif a join subkriteria b
		using (id_subkriteria) join pelamar c using (id_pelamar)
		join periode d using (id_periode)
		where id_pelamar='$id_pelamar'");
		return $result;
	}

	function get_datasub($id_kriteria, $divisi)
	{
		$result = $this->db->query("SELECT target_subkriteria.*, subkriteria.* FROM target_subkriteria, kriteria, subkriteria 
		WHERE target_subkriteria.id_subkriteria = subkriteria.id_subkriteria 
		AND subkriteria.id_kriteria = kriteria.id_kriteria
		AND subkriteria.id_kriteria = '$id_kriteria' AND id_divisi='$divisi'
		ORDER BY target_subkriteria.id_subkriteria ASC");
		return $result;
	}

	function get_jmlsub($id_kriteria, $divisi)
	{
		$result = $this->db->query("SELECT count(target_subkriteria.id_subkriteria) as total FROM target_subkriteria, kriteria, subkriteria 
		WHERE target_subkriteria.id_subkriteria = subkriteria.id_subkriteria 
		AND subkriteria.id_kriteria = kriteria.id_kriteria
		AND subkriteria.id_kriteria = '$id_kriteria'  AND id_divisi='$divisi'");
		return $result;
	}

	function get_jmlsub_divisi()
	{
		$result = $this->db->query("SELECT count(id_subkriteria) as total FROM target_subkriteria");

		return $result;
	}

	function get_data_subkriteria($id_kriteria)
	{
		$result = $this->db->query("select * from subkriteria where id_kriteria='$id_kriteria'");
		return $result;
	}

	function get_datakriteria($id_kriteria)
	{
		$result = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria='$id_kriteria'");
		return $result;
	}

	function get_datadivisi($divisi)
	{
		$result = $this->db->query("SELECT * FROM divisi WHERE id_divisi='$divisi'");
		return $result;
	}

	function get_npsubkriteria($id_kriteria) 
	{
		$this->db->select('nilai_pembanding')
				 ->from('perbandingan_subkriteria')
				 ->where('id_kriteria',$id_kriteria);
		$nilai = $this->db->get();
		return $nilai;
	}


	


}