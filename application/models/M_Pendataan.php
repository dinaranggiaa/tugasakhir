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
	
// <!--PROSES PELAMAR-->

    // Menampilkan id pelamar
	function get_id_pelamar()
	{
		$this->db->select('RIGHT(pelamar.id_pelamar,3) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('pelamar');

		//Mengecek sudah ada data atau belum
		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1; //kalo udah +1
		} else {
			$kode = 1; //kalo belum buat kode
		}
		$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
		$kodejadi = 'P'.$kodemax;

		return $kodejadi;
	}


	function simpan_pelamar()
	{
		if(isset($_POST['btn_simpan']))
		{

			$pelamar = array(
				'id_pelamar' 		=> $this->input->post('id_pelamar'),
				'id_periode' 		=> $this->input->post('id_periode'),
				'tgl_daftar' 		=> $this->input->post('tgl_daftar'),
				'nm_pelamar'		=> $this->input->post('nm_pelamar'),
				// 'jk_pelamar' 		=> $this->input->post('jk_pelamar'),
				// 'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
				// 'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
				'almt_pelamar'		=> $this->input->post('almt_pelamar'),
				// 'no_ktp' 			=> $this->input->post('no_ktp'),
				// 'status' 			=> $this->input->post('status'),
				'nohp_pelamar' 		=> $this->input->post('nohp_pelamar'),
				// 'pendidikan_akhir' 	=> $this->input->post('pendidikan_akhir'),
				'tanda' 			=> 0
			);

			$this->db->set($pelamar);
			$this->db->insert('pelamar');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}
		
	function hapus_pelamar($id_pelamar)
	{
		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('pelamar');
	}
	
	function ubah_pelamar($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//Dipake untuk menampilkan hasil pencarian
	function ambil_data_pelamar()
	{
    	$result = array();
        $this->db->SELECT('pelamar.*,periode.*')
				 ->FROM('pelamar')
				 ->join('periode','periode.id_periode=pelamar.id_periode')
                 ->ORDER_BY('id_pelamar','DESC');
        $pelamar = $this->db->get();

		if($pelamar->num_rows() > 0){
				$result = $pelamar->result();				
        }
        return $result;
	}
		
	function ambil_data_byidpelamar($id_pelamar)
	{
		$this->db->where('id_pelamar', $id_pelamar);
		return $this->db->get('pelamar')->result();
	}

    function pagination_data_pelamar($limit, $start)
    {
        return $this->db->get('pelamar', $limit, $start) ->result_array();
	}

	function cari_pelamar($keyword)
	{
		$this->db->like('id_pelamar', $keyword);
		$this->db->or_like('nm_pelamar', $keyword);

		$result = $this->db->get('pelamar')->result();
		return $result;
	}

// <!--PROSES KRITERIA dan Nilai Target-->

	public function ambil_data_ntarget()
	{
		$result = $this->db->query("select * from kriteria where tanda = '1'");
		return $result->result();
	}

	function simpan_ntarget()
	{
		if(isset($_POST['btn_simpan']))
		{

			$data = array();
				
			$item = [
					'id_kriteria' 		=> $this->input->post('id_kriteria'),
					'nilai_target' 		=> $this->input->post('nilai_target'),
					'status_kriteria' 	=> $this->input->post('status_kriteria'),
			];
				array_push($data, $item);
			}
			
			$this->db->insert_batch('nilai_target', $data);

		
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

	function get_id_kriteria()
	{
		$this->db->select('RIGHT(kriteria.id_kriteria,2) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('kriteria');

		//Mengecek sudah ada data atau belum
		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1; //kalo udah +1
		} else {
				$kode = 1; //kalo belum buat kode
			}
		$kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
		$kodejadi = 'C'.$kodemax;

		return $kodejadi;
	}

	function cari_kriteria($keyword)
	{
		$this->db->like('id_kriteria', $keyword);
		$this->db->or_like('nm_kriteria', $keyword);

		$result = $this->db->get('kriteria')->result();
		return $result;
	}
		
	function simpan_kriteria()
	{
		if(isset($_POST['btn_simpan']))
		{
			$kriteria = array(
				'id_kriteria' 		=> $this->input->post('id_kriteria'),
				'nm_kriteria' 		=> $this->input->post('nm_kriteria'),
				'bobot_kriteria' 	=> $this->input->post('bobot_kriteria'),
				'tanda'				=> 0
			);

			$this->db->set($kriteria);
			$this->db->insert('kriteria');
			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

		}
	}

	function ambil_data_byidkriteria($id_kriteria)
	{
		$this->db->where('id_kriteria', $id_kriteria);
		return $this->db->get('kriteria')->result();
	}

	function ubah_kriteria($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function hapus_kriteria($id_kriteria)
	{
		$this->db->where('id_kriteria', $id_kriteria);
		$this->db->delete('kriteria');
	}
	
	function ambil_data_kriteria()
	{
        $result = array();
        $this->db->SELECT('*')
                 ->FROM('kriteria')
                 ->ORDER_BY('id_kriteria','DESC');
        $kriteria = $this->db->get();
    
        if($kriteria->num_rows() > 0){
			$result = $kriteria->result();		
        }
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
// <!--PROSES Penilaian-->

	//Get By Id Pelamar
	function cari_data_pelamar($keyword)
	{
		$this->db->SELECT('id_pelamar, nm_pelamar')
				->FROM('pelamar')
				->like('id_pelamar', $keyword)
				->or_like('nm_pelamar', $keyword);
		$pelamar = $this->db->get();

				return $pelamar;
	}

	function data_npelamar()
	{
		$npelamar = $this->db->query("SELECT DISTINCT pelamar.id_pelamar, nm_pelamar, nohp_pelamar, almt_pelamar
		FROM pelamar inner join nilai_alternatif ON pelamar.id_pelamar = nilai_alternatif.id_pelamar");
		return $npelamar;
	}

	function hapus_npelamar($id_pelamar)
	{
		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('nilai_alternatif');
	}

	function data_nilai_pelamar($id_pelamar)
	{
		$pelamar = $this->db->query("select pelamar.id_pelamar, pelamar.nm_pelamar, pelamar.nohp_pelamar, pelamar.almt_pelamar, 
		nilai_alternatif.*, kriteria.id_kriteria, kriteria.nm_kriteria 
		from pelamar, nilai_alternatif, kriteria where pelamar.id_pelamar = nilai_alternatif.id_pelamar and kriteria.id_kriteria = nilai_alternatif.id_kriteria
		and pelamar.id_pelamar='$id_pelamar'");
		return $pelamar;
	}

	function cari_npelamar($keyword)
	{
		$this->db->like('id_pelamar', $keyword);

		$result = $this->db->get('pelamar')->result();
		return $result;
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
		

	function simpan_penilaian()
	{
		if(isset($_POST['btn_simpan']))
		{
			$n = 5;

			$data = array();
			for($i=0; $i < $n; $i++){
				
				$item = [
					'id_pelamar' => $this->input->post('id_pelamar'),
					'id_kriteria' => $this->input->post('id_kriteria'.$i),
					'nilai_tes' => $this->input->post('nilai_tes'.$i)
				];
				array_push($data, $item);
			}
			
			$this->db->insert_batch('nilai_alternatif', $data);

		}
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
		$result = $this->db->query("select pelamar.*, kriteria.id_kriteria, kriteria.nm_kriteria, nilai_alternatif.* 
									from pelamar, nilai_alternatif, kriteria 
									where pelamar.id_pelamar = nilai_alternatif.id_pelamar 
									and kriteria.id_kriteria = nilai_alternatif.id_kriteria;
		");

        return $result->result();
	}

	function hapus_penilaian($id_pelamar, $id_kriteria)
	{
		$this->db->where('id_pelamar', $id_pelamar);
		$this->db->delete('periode');
	}

	function ubah_penilaian($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function cari_penilaian($keyword)
	{
		$this->db->like('id_periode', $keyword);
		$this->db->or_like('bulan', $keyword);

		$result = $this->db->get('periode')->result();
		return $result;
	}

	// <!--PROSES PERIODE-->
		
	function get_id_periode()
	{
		$this->db->select('RIGHT(periode.id_periode,2) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('periode');

		//Mengecek sudah ada data atau belum
		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1; //kalo udah +1
		} else {
				$kode = 1; //kalo belum buat kode
			}
		$kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
		$kodejadi = 'P'.$kodemax;

		return $kodejadi;
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

	function hapus_periode($id_periode)
	{
		$this->db->where('id_periode', $id_periode);
		$this->db->delete('periode');
	}

	function ubah_periode($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function cari_periode($keyword)
	{
		$this->db->like('id_periode', $keyword);
		$this->db->or_like('bulan', $keyword);

		$result = $this->db->get('periode')->result();
		return $result;
	}



// <!--PROSES User-->
		
	function get_id_users()
	{
		$this->db->select('RIGHT(users.id_user,2) as kode', false);
		$this->db->order_by('kode','DESC');
		$this->db->limit(1);

		$query = $this->db->get('users');

		//Mengecek sudah ada data atau belum
		if($query->num_rows() <> 0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1; //kalo udah +1
		} else {
				$kode = 1; //kalo belum buat kode
			}
		$kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
		$kodejadi = 'U'.$kodemax;

		return $kodejadi;
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

	function hapus_users($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('users');
	}


	function ubah_users($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function cari_users($keyword)
	{
		$this->db->like('id_user', $keyword);
		$this->db->or_like('nm_user', $keyword);

		$result = $this->db->get('users')->result();
		return $result;
	}

	// <!--PROSES BUAT LAPORAN-->

	function get_periode($id_periode)
	{
		$result = $this->db->query("select * from periode
									where id_periode = '$id_periode'");
		return $result->result();
	}

	function rekomendasi_pelamar($id_periode)
	{
		$result = $this->db->query("select pelamar.*, periode.* from pelamar, periode
									where periode.id_periode = '$id_periode' order by pelamar.id_pelamar");
		return $result->result();
	}

}