<?php
class M_Pendataan extends MY_Model {
	
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

	// <!--Function Create ID -->
	function get_id_karyawan()
	{
		$this->db->select('RIGHT(karyawan.id_karyawan,3) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('karyawan');

		//Mengecek sudah ada data atau belum
		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1; //kalo udah +1
		} else {
			$kode = 1; //kalo belum buat kode
		}
		$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
		$kodejadi = 'SM'.$kodemax;

		return $kodejadi;
	}

		function get_id_pelamar()
	{
		$this->db->select('RIGHT(pelamar.id_pelamar,2) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('pelamar');

		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
		$kodejadi = 'PL'.$kodemax;

		return $kodejadi;
	}

	function get_id_subkriteria()
	{
		$this->db->select('RIGHT(subkriteria.id_subkriteria,2) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('subkriteria');

		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1; 
		} else {
				$kode = 1; 
			}
		$kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
		$kodejadi = 'SK'.$kodemax;

		return $kodejadi;
	}
	
	function get_id_divisi()
	{
		$this->db->select('RIGHT(divisi.id_divisi,2) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('divisi');

		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1;
		} else {
				$kode = 1; 
			}
		$kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
		$kodejadi = 'D'.$kodemax;

		return $kodejadi;
	}


	function get_id_kriteria()
	{
		$this->db->select('RIGHT(kriteria.id_kriteria,2) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('kriteria');

		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1;
		} else {
				$kode = 1; 
			}
		$kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
		$kodejadi = 'C'.$kodemax;

		return $kodejadi;
	}

		function get_id_periode()
	{
		$this->db->select('RIGHT(periode.id_periode,2) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('periode');

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

	function get_id_users()
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

	// <!--Function Ubah Data-->
	function ubah_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	// <--Function Hapus Data-->
	function hapus_karyawan($id_karyawan)
	{
		$this->db->where('id_karyawan', $id_karyawan);
		$this->db->delete('karyawan');

		$this->db->where('id_karyawan', $id_karyawan);
		$this->db->delete('kontak_darurat');
	}

	function hapus_pelamar($id_pelamar)
	{
		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('pelamar');

		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('nilai_alternatif');

		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('match_kriteria');

		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('match_subkriteria');

		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('hasil_akhir');
	}

	function hapus_users($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('users');
	}

	function hapus_periode($id_periode)
	{
		$this->db->where('id_periode', $id_periode);
		$this->db->delete('periode');
	}

	function hapus_penilaian($id_pelamar, $id_kriteria)
	{
		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('periode');
	}

	function hapus_npelamar($id_pelamar)
	{
		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('nilai_alternatif');

		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('match_kriteria');

		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('match_subkriteria');

		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('hasil_akhir');
	}

	function hapus_kriteria($id_kriteria)
	{
		$this->db->where('id_kriteria', $id_kriteria);
		$this->db->delete('kriteria');
	}

	function hapus_divisi($id_divisi)
	{
		$this->db->where('id_divisi', $id_divisi);
		$this->db->delete('divisi');
	}

	function hapus_subkriteria($id_subkriteria)
	{
		$this->db->where('id_subkriteria', $id_subkriteria);
		$this->db->delete('subkriteria');
	}

	function hapus_psubkriteria($id_kriteria)
	{
		$this->db->where('id_kriteria', $id_kriteria);
		$this->db->delete('perbandingan_subkriteria');
	}

	function hapus_target_kriteria($id_kriteria)
	{
		$this->db->where('id_kriteria', $id_kriteria);
		$this->db->delete('target_kriteria');
	}
	

	function hapus_target_subkriteria($id_subkriteria)
	{
		$this->db->where('id_subkriteria', $id_subkriteria);
		$this->db->delete('target_subkriteria');
	}

	// <--Function Cari Data-->
	function cari_kriteria($keyword)
	{
		$this->db->like('id_kriteria', $keyword);
		$this->db->or_like('nm_kriteria', $keyword);

		$result = $this->db->get('kriteria')->result();
		return $result;
	}

	
	function cari_subkriteria($keyword)
	{
		$this->db->SELECT('kriteria.nm_kriteria, subkriteria.*')
				->FROM('kriteria')
				->join('subkriteria','subkriteria.id_kriteria=kriteria.id_kriteria')
				->like('id_subkriteria', $keyword)
				->or_like('nm_subkriteria', $keyword)
				->or_like('nm_kriteria', $keyword);

		$result = $this->db->get();

		return $result;
	}

	function cari_target_kriteria($keyword)
	{
		$this->db->SELECT('divisi.*, kriteria.*, target_kriteria.*')
				->FROM('kriteria')
				->join('target_kriteria','kriteria.id_kriteria=target_kriteria.id_kriteria')
				->join('divisi','divisi.id_divisi = target_kriteria.id_divisi')
				->like('kriteria.nm_kriteria', $keyword)
				->or_like('nm_divisi', $keyword);

		$result = $this->db->get();

		return $result;
	}

	function cari_target_subkriteria($keyword)
	{
		$this->db->SELECT('divisi.*, kriteria.*, target_subkriteria.*, subkriteria.*')
				->FROM('kriteria')
				->join('subkriteria','kriteria.id_kriteria=subkriteria.id_kriteria')
				->join('target_subkriteria','subkriteria.id_subkriteria = target_subkriteria.id_subkriteria')
				->join('divisi','divisi.id_divisi = target_subkriteria.id_divisi')
				->like('kriteria.nm_kriteria', $keyword)
				->or_like('nm_divisi', $keyword)
				->or_like('nm_subkriteria', $keyword);

		$result = $this->db->get();

		return $result;
	}
	
	function cari_data_pelamar($keyword)
	{
		$this->db->SELECT('id_pelamar, nm_pelamar')
				->FROM('pelamar')
				->like('id_pelamar', $keyword)
				->or_like('nm_pelamar', $keyword);
		$pelamar = $this->db->get();

		
		return $pelamar;
	}

	//Form Entri Data Karyawan
	function get_data_pelamar($keyword)
	{
		$this->db->SELECT('id_pelamar, nm_pelamar, almt_pelamar, nohp_pelamar, pelamar.id_periode, pelamar.id_divisi, divisi.nm_divisi')
				->FROM('pelamar')
				->join('periode','periode.id_periode=pelamar.id_periode')
				->join('divisi','divisi.id_divisi=pelamar.id_divisi')
				->like('id_pelamar', $keyword)
				->or_like('nm_pelamar', $keyword);
		$pelamar = $this->db->get();

				return $pelamar;
	}

	function cari_npelamar($keyword)
	{
		$result = $this->db->query("SELECT DISTINCT nilai_alternatif.id_pelamar, nm_pelamar, nohp_pelamar, almt_pelamar
		FROM pelamar inner join nilai_alternatif ON pelamar.id_pelamar = nilai_alternatif.id_pelamar LIKE pelamar.id_pelamar = '$keyword'");

		$result = $this->db->get('pelamar')->result();
		return $result;
	}

	function cari_penilaian($keyword)
	{
		$this->db->like('id_periode', $keyword);
		$this->db->or_like('bulan', $keyword);

		$result = $this->db->get('periode')->result();
		return $result;
	}

	function cari_periode($keyword)
	{
		$this->db->like('id_periode', $keyword);
		$this->db->or_like('bulan', $keyword);

		$result = $this->db->get('periode')->result();
		return $result;
	}

	function cari_users($keyword)
	{
		$this->db->like('id_user', $keyword);
		$this->db->or_like('nm_user', $keyword);

		$result = $this->db->get('users')->result();
		return $result;
	}

	function cari_data_karyawan($keyword)
	{
    	$result = array();
        $this->db->SELECT('karyawan.*, kontak_darurat.*')
				 ->FROM('karyawan')
				 ->join('kontak_darurat','kontak_darurat.id_karyawan = karyawan.id_karyawan')
				 ->WHERE('status_kerja = "Aktif" ')
				 ->ORDER_BY('karyawan.id_karyawan','DESC');
		$this->db->like('karyawan.id_karyawan', $keyword);
		$this->db->or_like('nm_karyawan', $keyword);
				 
        $karyawan = $this->db->get();

		if($karyawan->num_rows() > 0){
				$result = $karyawan->result();				
        }
        return $result;
	}

	function cari_pelamar($keyword)
	{
		$this->db->SELECT('pelamar.*, periode.bulan, divisi.*')
				->FROM('pelamar')
				->join('periode','periode.id_periode=pelamar.id_periode')
				->join('divisi','divisi.id_divisi=pelamar.id_divisi')
				->like('id_pelamar', $keyword)
				->or_like('nm_divisi', $keyword)
				->or_like('nm_pelamar', $keyword)
				->or_like('bulan', $keyword);

		$result = $this->db->get()->result();
		return $result;
	}
	
	function cari_divisi($keyword)
	{
		$this->db->like('id_divisi', $keyword);
		$this->db->or_like('nm_divisi', $keyword);

		$result = $this->db->get('divisi')->result();
		return $result;
	}

	// <!--FUNCTION SIMPAN -->
	function simpan_karyawan()
	{
		if(isset($_POST['btn_simpan']))
		{

			$karyawan = array(
				'id_karyawan' 			=> $this->input->post('id_karyawan'),
				'id_pelamar' 			=> $this->input->post('id_pelamar'),
				'id_periode' 			=> $this->input->post('id_periode'),
				'id_divisi' 			=> $this->input->post('id_divisi'),
				'nm_karyawan' 			=> $this->input->post('nm_karyawan'),
				'tempat_lahir' 			=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 		=> $this->input->post('tanggal_lahir'),
				'almt_karyawan'			=> $this->input->post('almt_karyawan'),
				'no_ktp'				=> $this->input->post('no_ktp'),
				'status_marital'		=> $this->input->post('status_marital'),
				'nohp_karyawan'			=> $this->input->post('nohp_karyawan'),
				'pendidikan_terakhir' 	=> $this->input->post('pendidikan_terakhir'),
				'tglmasukkerja' 		=> $this->input->post('tglmasukkerja'),
				'nm_ortu'				=> $this->input->post('nm_ortu'),
				'almt_ortu'				=> $this->input->post('almt_ortu'),
				'status_kerja'			=> 'Aktif'
			);

			$kontak_darurat = array(
				'id_karyawan' 		=> $this->input->post('id_karyawan'),
				'nm_hub' 			=> $this->input->post('nm_hub'),
				'stat_hub'			=> $this->input->post('stat_hub'),
				'almt_hub' 			=> $this->input->post('almt_hub'),
				'nohp_hub' 			=> $this->input->post('nohp_hub')
			);

			$this->db->set($karyawan);
			$this->db->insert('karyawan');
			$this->db->set($kontak_darurat);
			$this->db->insert('kontak_darurat');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

	function simpan_pelamar()
	{
		if(isset($_POST['btn_simpan']))
		{

			$pelamar = array(
				'id_pelamar' 		=> $this->input->post('id_pelamar'),
				'id_periode' 		=> $this->input->post('id_periode'),
				'id_divisi' 		=> $this->input->post('id_divisi'),
				'tgl_daftar' 		=> $this->input->post('tgl_daftar'),
				'nm_pelamar'		=> $this->input->post('nm_pelamar'),
				'almt_pelamar'		=> $this->input->post('almt_pelamar'),
				'nohp_pelamar' 		=> $this->input->post('nohp_pelamar'),
				'tanda' 			=> 0
			);

			$this->db->set($pelamar);
			$this->db->insert('pelamar');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

	function simpan_subkriteria()
	{
		if(isset($_POST['btn_simpan']))
		{
			$data = array(
				'id_subkriteria	'	=> $this->input->post('id_subkriteria'),
				'nm_subkriteria	'	=> $this->input->post('nm_subkriteria'),
				'id_kriteria' 		=> $this->input->post('id_kriteria')
				
			);

			$this->db->set($data);
			$this->db->insert('subkriteria');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	
	}

	function simpan_divisi()
	{
		if(isset($_POST['btn_simpan']))
		{
			$divisi = array(
				'id_divisi' 		=> $this->input->post('id_divisi'),
				'nm_divisi' 		=> $this->input->post('nm_divisi'),
			);

			$this->db->set($divisi);
			$this->db->insert('divisi');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

	function simpan_kriteria()
	{
		if(isset($_POST['btn_simpan']))
		{
			$kriteria = array(
				'id_kriteria' 		=> $this->input->post('id_kriteria'),
				'nm_kriteria' 		=> $this->input->post('nm_kriteria'),
			);

			$this->db->set($kriteria);
			$this->db->insert('kriteria');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

	function simpan_penilaian()
	{
		if(isset($_POST['btn_simpan']))
		{
			$this->db->select('target_subkriteria.id_subkriteria');
			$this->db->from("target_subkriteria");
			$count_reponse  = $this->db->count_all_results();

			$n = $count_reponse;


			$data = array();
			for($i=0; $i < $n; $i++){
				
				$item = [
					'id_pelamar' 	=> $this->input->post('id_pelamar'),
					'id_kriteria' 	=> $this->input->post('id_subkriteria'.$i),
					'nilai_tes'		=> $this->input->post('nilai_tes'.$i)
				];
				array_push($data, $item);
			}
			
			$this->db->insert_batch('nilai_alternatif', $data);

		}
	}

	function simpan_periode()
	{
		if(isset($_POST['btn_simpan']))
		{
			$periode = array(
				'id_periode' 		=> $this->input->post('id_periode'),
				'bulan' 			=> $this->input->post('bulan'),
				'tgl_pembukaan' 	=> $this->input->post('tgl_pembukaan'),
				'tahun'		 		=> $this->input->post('tahun')
			);

			$this->db->set($periode);
			$this->db->insert('periode');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

	function simpan_users()
	{
		if(isset($_POST['btn_simpan']))
		{
			$users = array(
				'id_user' => $this->input->post('id_user'),
				'nm_user' => $this->input->post('nm_user'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => $this->input->post('level'),
			);

			$this->db->set($users);
			$this->db->insert('users');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

	function simpan_target_kriteria()
	{
		if(isset($_POST['btn_simpan']))
		{
			$data = array(
				'id_kriteria' 		=> $this->input->post('id_kriteria'),
				'id_divisi' 		=> $this->input->post('id_divisi'),
			);

			$this->db->set($data);
			$this->db->insert('target_kriteria');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

	function simpan_target_subkriteria()
	{
		if(isset($_POST['btn_simpan']))
		{
			$data = array(
				'id_subkriteria' 	=> $this->input->post('id_subkriteria'),
				'id_divisi' 		=> $this->input->post('id_divisi'),
				'nilai_target' 		=> $this->input->post('nilai_target'),
				'status_subkriteria'=> $this->input->post('status_subkriteria'),
			);

			$this->db->set($data);
			$this->db->insert('target_subkriteria');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

		// <!--FUNCTION MENGHITUNG JUMLAH-->
	function getjmlsubkriteria()
	{
		$result = array();
		$this->db->SELECT('count(id_subkriteria) as total')
				 ->FROM('target_subkriteria');
		$kriteria = $this->db->get();
		if($kriteria->num_rows() > 0)
		{
			$result = $kriteria->row_array();
		}
		return $result;
	}

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

	function getjmlhasilakhir($bulan, $tahun)
	{
		$result = $this->db->query("SELECT COUNT(a.id_pelamar) AS total 
									FROM hasil_akhir a, pelamar b, periode c
									WHERE b.id_periode = c.id_periode
									AND a.id_pelamar = b.id_pelamar
									AND bulan='$bulan' AND tahun='$tahun'");
		return $result->row_array();
	}
	
	// <!--FUNCTION AMBIL DATA-->

	// <--DATA KARYAWAN-->
	function ambil_data_karyawan()
	{
    	$result = array();
        $this->db->SELECT('karyawan.*, kontak_darurat.*, divisi.*')
				 ->FROM('karyawan')
				 ->join('kontak_darurat','kontak_darurat.id_karyawan = karyawan.id_karyawan')
				 ->join('divisi','karyawan.id_divisi = divisi.id_divisi')
				 ->WHERE('status_kerja = "Aktif" ')
				 ->ORDER_BY('karyawan.id_karyawan','DESC');
				 
        $karyawan = $this->db->get();

		if($karyawan->num_rows() > 0){
				$result = $karyawan->result();				
        }
        return $result;
	}

	// <--DATA PELAMAR-->
	//Dipake untuk menampilkan hasil pencarian
	function ambil_data_pelamar()
	{
		$result = $this->db->query('SELECT pelamar.*, periode.*, divisi.* FROM pelamar, periode, divisi 
									WHERE periode.id_periode=pelamar.id_periode AND pelamar.id_divisi = divisi.id_divisi
									ORDER BY id_pelamar DESC');
        return $result->result();
	}

	function get_pelamar($id_pelamar)
	{
		$result = $this->db->query("select * from pelamar
		where id_pelamar='$id_pelamar'");
		return $result;
	}
 
	
		
	// <--DATA SUBKRITERIA-->
	public function ambil_data_subkriteria()
	{
		$result = $this->db->query("select subkriteria.*, kriteria.id_kriteria, kriteria.nm_kriteria 
		from subkriteria, kriteria where kriteria.id_kriteria = subkriteria.id_kriteria
		order by kriteria.id_kriteria;
		");
		return $result;
	}

	//Data Kriteria yang tandanya sudah 1
	function data_kriteria()
	{
		$result = array();
		$this->db->select('kriteria.*,nilai_target.*')
				->from('kriteria')
				->join('nilai_target','nilai_target.id_kriteria=nilai_target.id_kriteria')
				->order_by('kriteria.id_kriteria','DESC')
				->where("kriteria.tanda = '1'");
		$kriteria = $this->db->get();

		if($kriteria->num_rows() > 0){
				$result = $kriteria->result();				
		}
		return $result;
	}


	// <--DATA KRITERIA-->
	function ambil_data_byidkriteria($id_kriteria)
	{
		$this->db->where('id_kriteria', $id_kriteria);
		return $this->db->get('kriteria')->result();
	}

	
	function ambil_data_kriteria()
	{
        $result = array();
        $this->db->SELECT('*')
                 ->FROM('kriteria')
                 ->ORDER_BY('id_kriteria','DESC');
        $result = $this->db->get();
        return $result;
	}

	function ambil_target_kriteria()
	{
        $result = array();
        $this->db->SELECT('kriteria.*, target_kriteria.*')
				 ->FROM('kriteria')
				 ->JOIN('target_kriteria','kriteria.id_kriteria=target_kriteria.id_kriteria')
                 ->ORDER_BY('target_kriteria.id_kriteria','DESC');
        $result = $this->db->get();
        return $result;
	}

	function ambil_target_subkriteria($id_kriteria)
	{
        $result = array();
        $this->db->SELECT('*')
				 ->FROM('subkriteria')
				 ->WHERE('id_kriteria', $id_kriteria)
                 ->ORDER_BY('id_kriteria','DESC');
        $result = $this->db->get();
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

	function getIdKriteria()
	{
		$this->db->select('id_kriteria')
				 ->from('kriteria')
				 ->order_by('id_kriteria');
		$kriteria = $this->db->get();
		return $kriteria;

	}

	function getNmKriteria()
	{
		$this->db->select('nm_kriteria')
				 ->from('kriteria')
				 ->order_by('id_kriteria');
		$kriteria = $this->db->get();


		return $kriteria;
	}

	// <--DATA DIVISI-->
	function ambil_data_byiddivisi($id_divisi)
	{
		$this->db->where('id_divisi', $id_divisi);
		return $this->db->get('divisi')->result();
	}

	
	function ambil_data_divisi()
	{
        $this->db->SELECT('*')
                  			->FROM('divisi')
							 ->ORDER_BY('id_divisi','DESC');   
		$result = $this->db->get();
        
        return $result->result();
	}
	
	// <--DATA PENILAIAN-->

	function data_npelamar()
	{
		$npelamar = $this->db->query("SELECT DISTINCT pelamar.id_pelamar, nm_pelamar, nohp_pelamar, almt_pelamar
										FROM pelamar inner join nilai_alternatif ON pelamar.id_pelamar = nilai_alternatif.id_pelamar");
		
		return $npelamar;
	}
	
	

	function data_nilai_pelamar($id_pelamar)
	{
		$pelamar = $this->db->query("SELECT pelamar.id_pelamar, pelamar.nm_pelamar, pelamar.nohp_pelamar, pelamar.almt_pelamar, 
									nilai_alternatif.*, kriteria.id_kriteria, kriteria.nm_kriteria, subkriteria.id_subkriteria, subkriteria.nm_subkriteria, divisi.* 
									FROM pelamar, nilai_alternatif, kriteria, subkriteria, divisi 
									WHERE pelamar.id_pelamar 		= nilai_alternatif.id_pelamar 
									AND kriteria.id_kriteria 		= subkriteria.id_kriteria
									AND pelamar.id_divisi			= divisi.id_divisi
									AND subkriteria.id_subkriteria	= nilai_alternatif.id_subkriteria
									AND pelamar.id_pelamar='$id_pelamar'");
		return $pelamar;
	}


	//Data Pelamar yang tandanya sudah 1
	function data_pelamar()
	{
		$result = array();
		$this->db->select('pelamar.*,periode.*')
				->from('pelamar')
				->join('periode','periode.id_periode=pelamar.id_periode')
				->order_by('id_pelamar','DESC')
				->where("pelamar.tanda = '1'");
		$pelamar = $this->db->get();

		if($pelamar->num_rows() > 0){
				$result = $pelamar->result();				
		}
		return $result;
	}
	

	function ambil_data_penilaian()
	{
		$result = $this->db->query("select pelamar.id_pelamar, pelamar.nm_pelamar, nilai_alternatif.*, kriteria.id_kriteria, kriteria.nm_kriteria 
									from pelamar, nilai_alternatif 
									where pelamar.id_pelamar = nilai_alternatif.id_pelamar
									and kriteria.id_kriteria = nilai_alternatif.id_kriteria
									");	
        return $result->result_array();
	}

	function ambil_id_penilaian()
	{
		$result = $this->db->query("select pelamar.*, subkriteria.id_kriteria, kriteria.nm_kriteria, nilai_alternatif.* 
									from pelamar, nilai_alternatif, kriteria, subkriteria 
									where pelamar.id_pelamar = nilai_alternatif.id_pelamar 
									and subkriteria.id_subkriteria = nilai_alternatif.id_subkriteria
									and kriteria.id_kriteria = subkriteria.id_kriteria;
		");

        return $result->result();
	}


	function get_target_kriteria()
	{
		$result = $this->db->query("select divisi.id_divisi, nm_divisi, nm_kriteria, kriteria.nilai_target, kriteria.status_kriteria, kriteria.id_kriteria from nilai_target, kriteria, divisi where kriteria.id_kriteria = nilai_target.id_kriteria
		and divisi.id_divisi = nilai_target.id_divisi
		order by nilai_target.id_kriteria;
		");
		return $result;
	}

	function get_ssubkriteria()
	{
		$result = $this->db->query("select b.*, c.*
		from target_subkriteria a, subkriteria b, kriteria c
		where a.id_subkriteria = b.id_subkriteria
		and b.id_kriteria = c.id_kriteria;
		");
		return $result;
	}

	function ambil_data_periode()
	{
		$result = array();
        $this->db->SELECT('*')
                 ->FROM('periode')
                 ->ORDER_BY('id_periode','DESC');
        $periode = $this->db->get();

		if($periode->num_rows() > 0){
				$result = $periode->result();				
        }
        return $result;
	}

	function ambil_periode($bulan, $tahun)
	{
		$result = $this->db->query("select * from periode
									where bulan = '$bulan' and tahun = '$tahun'");
		return $result;
	}

	function ambil_data_tahun()
	{
		$result = $this->db->query("SELECT DISTINCT tahun FROM periode ");
        return $result->result();
	}

	function ambil_divisi()
	{
		$result = $this->db->query("SELECT DISTINCT * FROM divisi ");
        return $result->result();
	}

	function ambil_id_periode()
	{
		$result = array();
        $this->db->SELECT('*')
                 ->FROM('periode')
                 ->ORDER_BY('id_periode','DESC');
        $periode = $this->db->get();

		if($periode->num_rows() > 0){
				$result = $periode->result_array();				
        }
        return $result;
	}


	function ambil_data_users()
	{
		$result = array();
		$this->db->SELECT('*')
				->FROM('users')
				->ORDER_BY('id_user','DESC');
		$users = $this->db->get();

		if($users->num_rows() > 0){
				$result = $users->result();				
		}
		return $result;
	}

	function ambil_id_users()
	{
		$result = array();
		$this->db->SELECT('*')
				->FROM('users')
				->ORDER_BY('id_user','DESC');
		$users = $this->db->get();

		if($users->num_rows() > 0){
				$result = $users->result_array();				
		}
		return $result;
	}

	// Nilai Target 

	function data_target_kriteria()
	{
		$result = $this->db->query("SELECT divisi.*, kriteria.nm_kriteria, kriteria.id_kriteria, target_kriteria.bobot_kriteria FROM divisi, kriteria, target_kriteria
										WHERE divisi.id_divisi = target_kriteria.id_divisi
										AND kriteria.id_kriteria = target_kriteria.id_kriteria;");
		
		return $result;
	}

	function data_target_subkriteria()
	{
		$result = $this->db->query("SELECT target_subkriteria.*, divisi.*, kriteria.*, subkriteria.* FROM divisi
									INNER JOIN target_subkriteria ON divisi.id_divisi = target_subkriteria.id_divisi
									INNER JOIN subkriteria ON subkriteria.id_subkriteria = target_subkriteria.id_subkriteria
									INNER JOIN kriteria ON subkriteria.id_kriteria = kriteria.id_kriteria;
		");
		
		return $result;
	}




	// <!--FUNCTION GET DATA UNTUK LAPORAN-->

	function get_periode($id_periode)
	{
		$result = $this->db->query("select * from periode
									where id_periode = '$id_periode'");
		return $result->result();
	}

	function rekomendasi_pelamar($bulan, $tahun)
	{
		$result = $this->db->query("select a.id_pelamar, a.nm_pelamar, a.nohp_pelamar, b.nilai_akhir, b.status_akhir
									from pelamar a, hasil_akhir b, periode c 
									where a.id_pelamar = b.id_pelamar
									and a.id_periode = c.id_periode
									and bulan='$bulan' and tahun='$tahun'
									order by nilai_akhir desc");
		return $result;
	}

	function keputusan_pelamar($bulan, $tahun, $divisi)
	{
		$result = $this->db->query(" SELECT a.*, a.nohp_pelamar, b.nilai_akhir 
		from pelamar a, hasil_akhir b, periode c 
		where a.id_pelamar = b.id_pelamar
		and a.id_periode = c.id_periode
		and b.status_akhir = '1' 
		and bulan='$bulan' 
		and tahun='$tahun'
		and id_divisi='$divisi'
		order by nilai_akhir desc;");
		return $result;
	}

	function karyawan_baru($bulan, $tahun)
	{
		$result = $this->db->query("select * from karyawan, kontak_darurat, periode
		where karyawan.id_karyawan = kontak_darurat.id_karyawan
		and periode.id_periode = karyawan.id_periode
		and bulan='$bulan' and tahun='$tahun';");
		return $result;
	}
	

}