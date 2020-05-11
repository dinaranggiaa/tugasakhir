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
				'id_pelamar' => $this->input->post('id_pelamar'),
				'id_periode' => $this->input->post('id_periode'),
				'tgl_daftar' => $this->input->post('tgl_daftar'),
				'nm_pelamar' => $this->input->post('nm_pelamar'),
				'jk_pelamar' => $this->input->post('jk_pelamar'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'almt_pelamar' => $this->input->post('almt_pelamar'),
				'no_ktp' => $this->input->post('no_ktp'),
				'status' => $this->input->post('status'),
				'nohp_pelamar' => $this->input->post('nohp_pelamar'),
				'pendidikan_akhir' => $this->input->post('pendidikan_akhir'),
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

// <!--PROSES KRITERIA-->
		
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
				'id_kriteria' => $this->input->post('id_kriteria'),
				'nm_kriteria' => $this->input->post('nm_kriteria'),
				'bobot_kriteria' => $this->input->post('bobot_kriteria'),
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

	// memasukkan bobot nilai perbandingan kriteria
	function inputDataPerbandinganKriteria() 
	{
		$n = 3;
		$urut=0;
		

		$data = array();

		for ($x=0; $x<=($n-2); $x++) {
			for($y=($x+1); $y<=($n-1); $y++) {
				$urut++;
				$item = [
					'id_kriteria1' => $this->input->post('kriteria_'.$urut),
					'id_kriteria2' => $this->input->post('kriteria_'.$urut),
					'nilai_pembanding' => $this->input->post('nilai_pembanding'.$x.$y)
				];
				array_push($data, $item);

				$item = [
					'id_kriteria1' => $this->input->post('kriteria_'.$x.$y),
					'id_kriteria2' => $this->input->post('kriteria_'.$x.$y),
					'nilai_pembanding' => 1/$this->input->post('nilai_pembanding'.$x.$y)
				];
				array_push($data, $item);
			}

			$item = [
				'id_kriteria1' => $x+1,
				'id_kriteria2' => $x+1,
				'nilai_pembanding' => 1
			];
			array_push($data, $item);
		}

		$this->db->insert_batch('perbandingan_kriteria', $data);
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
				'id_periode' => $this->input->post('id_periode'),
				'bulan' => $this->input->post('bulan'),
				'tgl_pembukaan' => $this->input->post('tgl_pembukaan'),
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

}