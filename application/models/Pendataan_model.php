<?php
class Pendataan_model extends MY_Model {
	
	/*Pasien dan Register*/
		private $pasien = 'pasien'; //Tabel
		private $register = 'register';
		public $nm_pasien;
		public $nik_pasien;
		public $no_bpjs;
		public $alamat;
		public $tgl_lahir;
		public $jenkel;
		public $no_hp;
		public $tinggi_bdn;
		public $berat_bdn;
		public $id_register;
		public $no_rm;

	/*Faskes dan PMO*/
		private $faskes = 'faskes';
		private $pmo = 'pmo';
		public $no_faskes;
		public $tipe_diagnosis;
		public $lokasi_anatomi;
		public $paru_bcg;
		public $tipe_pasien;
		public $panduan_oat;
		public $bentuk_oat;
		public $skoring_anak;
		public $sumber_obat;
		public $status_hiv;
		public $tgl_mulai;
		public $riwayat_dm;
		public $status_hamil;
		public $nik_pmo;
		public $nm_pmo;
		public $no_hp_pmo;
		public $alamat_pmo;

	/*Checkup*/
		private $checkup = 'checkup';
		public $id_checkup;
		public $tgl_checkup;
		public $tgl_selanjutnya;
		public $jml_obat;
		public $jml_minum;
		public $berat_bdn_2;
		public $tahap_pengobatan;
		public $keterangan;

	
	/*Cek Dahak*/
		private $dahak = 'dahak';
		public $id_cekdahak;
		public $no_reglab;
		public $tgl_tes;
		public $bulan_ke;
		public $bta;
		public $biakan;
		public $tes_cepat;

	/*Diabetes*/
		private $diabetes = 'diabetes';
		public $id_tesdm;
		public $hasil_tesdm;
		public $terapi_dm;

	/*HIV*/
		private $hiv = 'hiv';
		public $id_teshiv;
		public $tgl_dianjurkan;
		public $tgl_teshiv;
		public $hasil_tes;

	/*Hasil Akhir*/
		private $hasil_akhir = 'hasil_akhir';
		public $id_hasil;
		public $tgl_selesai;
		public $hasilakhir;

		public function __construct()
		{
			$this->load->database();
		}

		
		/*Pendataan Pasien Terduga TBC*/

	//Menampilkan kode register
		function getIdRegister()
		{
			$this->db->select('RIGHT(register.id_register,4) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('register');

			//Mengecek sudah ada data atau belum
			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1; //kalo udah +1

			} else {
				$kode = 1; //kalo belum buat kode
			}
			$kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
			$kodejadi = 'R'.$kodemax;


			return $kodejadi;
		}

	//Menyimpan data ke tabel pasien dan register
		function create()
		{

			if(isset($_POST['btnsimpan'])) //kalo klik btn simpan
			{

				$tanggalSekarang = date('Y-m-d');
				$id_petugas = $this->session->userdata('id');

				$pasien = array(
					'nm_pasien' => $this->input->post('nm_pasien'),
					'nik_pasien' => $this->input->post('nik_pasien'),
					'no_bpjs' => $this->input->post('no_bpjs'),
					'alamat' => $this->input->post('alamat'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'jenkel' => $this->input->post('jenkel'),
					'no_hp' => $this->input->post('no_hp'),
					'tinggi_bdn' => $this->input->post('tinggi_bdn'),
					'berat_bdn' => $this->input->post('berat_bdn'),
				);


				$register = array(
					'id_register' => $this->input->post('id_register'),
					'nik_pasien' => $this->input->post('nik_pasien'),
					'id_petugas' => $id_petugas,
					'no_rm' => $this->input->post('no_rm'),
					'tgl_daftar' => $tanggalSekarang
					);

				$this->db->set($pasien);
				$this->db->insert('pasien');
				$this->db->set($register);
				$this->db->insert('register');
				echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";
			}

			return true;
  		}


	//Menampilkan data dari tabel pasien
		function getAll()
		{
			
			$this->db->from('pasien');
			$this->db->order_by('nm_pasien', 'ASC');
			$query = $this->db->get();
			return $query->result();
		}

	//Menampilkan id register + data dari tabel pasien
		function getListPasien($limit, $start)
		{
			$this->db->limit($limit, $start);
			$this->db->SELECT('register.id_register, pasien.nik_pasien, pasien.nm_pasien, pasien.tgl_lahir, pasien.jenkel')
					->FROM('register')
					->join('pasien','pasien.nik_pasien = register.nik_pasien')
					->order_by('id_register', 'DESC');
			$pasien = $this->db->get();

			return $pasien->result();
			//result() karena menggunakan foreach
		}

		function jmlpasien()
		{

			$this->db->SELECT('count(pasien.nik_pasien)')
					->FROM('pasien')
					->join('register','register.nik_pasien = pasien.nik_pasien');
			$pasien = $this->db->get();

			return $pasien;
		}


	//Menampilkan data pada form update
		function getData($nik_pasien)
		{

			$this->db->SELECT('pasien.nm_pasien, pasien.nik_pasien, pasien.no_hp, pasien.jenkel, pasien.alamat, pasien.tgl_lahir, pasien.no_bpjs, pasien.tinggi_bdn, pasien.berat_bdn, register.id_register, register.no_rm, register.tgl_daftar')
					->FROM('pasien')
					->where('register.nik_pasien', $nik_pasien)
					->join('register','register.nik_pasien=pasien.nik_pasien');
			$pasien = $this->db->get();

			if($pasien->num_rows() > 0)
			{
				return $pasien->row_array();
			}
			return false;
		}

  	//Menampilkan data sesuai dengan nik pasien (detail)
		function getByNIK($nik_pasien)
		{

			$this->db->select('nm_pasien, nik_pasien, no_hp, jenkel, alamat, tgl_lahir, YEAR(CURDATE())-YEAR(tgl_lahir) as umur, no_bpjs, tinggi_bdn, berat_bdn');
			$this->db->where('nik_pasien', $nik_pasien);
			$pasien = $this->db->get('pasien');

			if($pasien->num_rows() > 0)
			{
				return $pasien->row_array();
			}
			return false;

		}

		function getByKeyword($keyword)
		{
			$this->db->SELECT('register.id_register, pasien.nik_pasien, pasien.nm_pasien, pasien.tgl_lahir, pasien.jenkel')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->order_by('id_register', 'DESC')
					->like('nm_pasien', $keyword)
					->or_like('id_register', $keyword);

			$pasien = $this->db->get();

			return $pasien;
		}

	//Menyimpan data yang sudah di update
		function UpdatePasien($where, $data, $tabel)
		{

			$nik_pasien = $this->input->post('nik_pasien');
			$nm_pasien = $this->input->post('nm_pasien');
			$no_bpjs = $this->input->post('no_bpjs');
			$alamat = $this->input->post('alamat');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jenkel = $this->input->post('jenkel');
			$no_hp = $this->input->post('no_hp');
			$tinggi_bdn = $this->input->post('tinggi_bdn');
			$berat_bdn = $this->input->post('berat_bdn');

			$data = array(
					'no_bpjs' => $no_bpjs,
					'alamat' => $alamat,
					'tgl_lahir' => $tgl_lahir,
					'jenkel' => $jenkel,
					'no_hp' => $no_hp,
					'tinggi_bdn' => $tinggi_bdn,
					'berat_bdn' => $berat_bdn
					);

			$where = array('nik_pasien' => $nik_pasien);

			$this->db->where($where);
			$this->db->update('pasien', $data);
		}

	//Menghapus register berdasarkan nik pasien
		function delete($nik_pasien)
		{

			$this->db->where('nik_pasien', $nik_pasien);
			$this->db->delete('register');

			$pasien = $this->db->get('register');

			if($pasien->num_rows() == 1)
			{
				return $pasien->row_array();
			}
			return false;
		}

	/*Pendataan Pasien TBC*/

	function SimpanKartu()
		{

			if(isset($_POST['btnsimpan']))
			{
				$tanggalSekarang = date('Y-m-d');

				$pmo = array(
					'nik_pmo' => $this->input->post('nik_pmo'),
					'nm_pmo' => $this->input->post('nm_pmo'),
					'no_hp_pmo' => $this->input->post('no_hp_pmo'),
					'alamat_pmo' => $this->input->post('alamat_pmo'),
					);

				$faskes = array(
					'id_register' => $this->input->post('id_register'),
					'no_faskes' => $this->input->post('no_faskes'),
					'tipe_diagnosis' => $this->input->post('tipe_diagnosis'),
					'lokasi_anatomi' => $this->input->post('lokasi_anatomi'),
					'paru_bcg' => $this->input->post('paru_bcg'),
					'tipe_pasien' => $this->input->post('tipe_pasien'),
					'panduan_oat' => $this->input->post('panduan_oat'),
					'bentuk_oat' => $this->input->post('bentuk_oat'),
					'skoring_anak' => $this->input->post('skoring_anak'),
					'sumber_obat' => $this->input->post('sumber_obat'),
					'status_hiv' => $this->input->post('status_hiv'),
					'status_hamil' => $this->input->post('status_hamil'),
					'tgl_mulai' => $tanggalSekarang,
					'riwayat_dm' => $this->input->post('riwayat_dm'),
					'nik_pmo' => $this->input->post('nik_pmo')
				);

				$this->db->set($pmo);
				$this->db->insert('pmo');

				$this->db->set($faskes);
				$this->db->insert('faskes');

				// echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

				}
  		}

  	function getByNama($keyword)
		{
			$this->db->SELECT('register.id_register, pasien.nik_pasien, pasien.nm_pasien, pasien.tgl_lahir, pasien.jenkel')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->order_by('id_register', 'ASC');
			$this->db->like('nm_pasien', $keyword)
					->or_like('id_register', $keyword);
			$pasien = $this->db->get();

			return $pasien;
		}



  	//Menampilkan no faskes
		function nofaskes()
		{
			$this->db->select('RIGHT(faskes.no_faskes,3) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('faskes');

			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;

			} else
			{
				$kode = 1;
			}

			$kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
			$kodejadi = 'F'.$kodemax;

			return $kodejadi;
		}

	//Menampilkan data pasien TBC fari tabel pasien, register, faskes
		function getPasienTbc($limit, $start)
		{
			$this->db->limit($limit, $start);
			$this->db->select('pasien.*, faskes.*')
					->FROM('pasien')
					->join('register','register.nik_pasien = pasien.nik_pasien')
					->join('faskes','faskes.id_register = register.id_register')
					->order_by('no_faskes', 'DESC');
			$pasientbc = $this->db->get();

			return $pasientbc->result();
		}

	//Menampilkan data pasien TBC fari tabel pasien, register, faskes, pmo
		function getDataPasienTbc($no_faskes)
		{

			$this->db->select('pasien.*, YEAR(CURDATE())-YEAR(pasien.tgl_lahir) as usia , faskes.*, pmo.*')
					->FROM('pasien')
					->where('faskes.no_faskes', $no_faskes)
					->join('register','register.nik_pasien = pasien.nik_pasien')
					->join('faskes','faskes.id_register = register.id_register')
					->join('pmo','pmo.nik_pmo = faskes.nik_pmo');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				return $pasientbc->row_array();
			}
			return false;
		}

	//Menghapus data faskes berdasarkan nomor faskes
		function deleteid($no_faskes)
		{
			$this->db->where('no_faskes', $no_faskes);
			$this->db->delete('faskes');

			$pasientbc = $this->db->get('register');

			if($pasientbc->num_rows() == 1)
			{
				return $pasientbc->result();
			}
		}


	//Mengupdate faskes
		function UpdatePasientbc($where, $data, $tabel)
		{

			$id_register = $this->input->post('id_register');
			$no_faskes = $this->input->post('no_faskes');
			$tipe_diagnosis = $this->input->post('tipe_diagnosis');
			$lokasi_anatomi = $this->input->post('lokasi_anatomi');
			$paru_bcg = $this->input->post('paru_bcg');
			$tipe_pasien = $this->input->post('tipe_pasien');
			$panduan_oat = $this->input->post('panduan_oat');
			$bentuk_oat = $this->input->post('bentuk_oat');
			$skoring_anak = $this->input->post('skoring_anak');
			$sumber_obat = $this->input->post('sumber_obat');
			$status_hiv = $this->input->post('status_hiv');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$riwayat_dm = $this->input->post('riwayat_dm');
			$nik_pmo = $this->input->post('nik_pmo');

			$data = array(
					'tipe_diagnosis' => $tipe_diagnosis,
					'lokasi_anatomi' => $lokasi_anatomi,
					'paru_bcg' => $paru_bcg,
					'tipe_pasien' => $tipe_pasien,
					'lokasi_anatomi' => $lokasi_anatomi,
					'panduan_oat' => $panduan_oat,
					'bentuk_oat' => $bentuk_oat,
					'skoring_anak' => $skoring_anak,
					'sumber_obat' => $sumber_obat,
					'status_hiv' => $status_hiv,
					'tgl_mulai' => $tgl_mulai,
					'riwayat_dm' => $riwayat_dm
					);

			$where = array('no_faskes' => $no_faskes);

			$this->db->where($where);
			$this->db->update('faskes', $data);

			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";
		}

	//Cari Berdasarkan nama dari tabel register, pasien dan faskes [Pendataan_kartu/listpasientbc]
		function getByName($keyword)
		{

			$this->db->SELECT('register.*, pasien.*, faskes.*, pmo.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien = register.nik_pasien')
					->join('faskes','faskes.id_register = register.id_register')
					->join('pmo','pmo.nik_pmo = faskes.nik_pmo')
					->order_by('pasien.nm_pasien', 'ASC');
			$this->db->like('nm_pasien', $keyword)
					->or_like('no_faskes', $keyword);
			$pasientbc = $this->db->get();

			return $pasientbc;
		}

		function getByName2($keyword)
		{

			$this->db->SELECT('nm_pasien.pasien, no_faskes.faskes, checkup.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('checkup','faskes.no_faskes=checkup.no_faskes')
					->order_by('pasien.nm_pasien', 'ASC');
			$this->db->like('nm_pasien', $keyword);

			$pasientbc = $this->db->get();

			return $pasientbc;
		}

	//Cari Berdasarkan nofaskes dari tabel register pasien dan faskes
		function getByFaskes($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register');
			$this->db->where('nm_pasien', $keyword)
					->or_where('faskes.no_faskes', $keyword);
			return $this->db->get();
		}


		function UpdateFaskes($where, $data, $tabel)
		{

			$no_faskes = $this->input->post('no_faskes');
			$tipe_diagnosis = $this->input->post('tipe_diagnosis');
			$lokasi_anatomi = $this->input->post('lokasi_anatomi');
			$status_hamil = $this->input->post('status_hamil');
			$paru_bcg = $this->input->post('paru_bcg');
			$status_hiv = $this->input->post('status_hiv');
			$riwayat_dm = $this->input->post('riwayat_dm');
			$tgl_mulai = $this->input->post('tgl_mulai');
			$sumber_obat = $this->input->post('sumber_obat');
			$bentuk_oat = $this->input->post('bentuk_oat');
			$panduan_oat = $this->input->post('panduan_oat');
			$sumber_obat = $this->input->post('sumber_obat');
			$skoring_anak = $this->input->post('skoring_anak');
			$nik_pmo = $this->input->post('nik_pmo');

			$data = array(
					'tipe_diagnosis' => $tipe_diagnosis,
					'lokasi_anatomi' => $lokasi_anatomi,
					'status_hamil' => $status_hamil,
					'paru_bcg' => $paru_bcg,
					'status_hiv' => $status_hiv,
					'riwayat_dm' => $riwayat_dm,
					'tgl_mulai' => $tgl_mulai,
					'sumber_obat' => $sumber_obat,
					'bentuk_oat' => $bentuk_oat,
					'panduan_oat' => $panduan_oat,
					'sumber_obat' => $sumber_obat,
					'skoring_anak' => $skoring_anak,
					'nik_pmo' => $nik_pmo
					);

			$where = array('no_faskes' => $no_faskes);


			$this->db->where($where);
			$this->db->update('faskes', $data);


			$nm_pmo = $this->input->post('nm_pmo');
			$no_hp_pmo = $this->input->post('no_hp_pmo');
			$alamat_pmo = $this->input->post('alamat_pmo');

			$pmo = array(
					'nm_pmo' => $nm_pmo,
					'no_hp_pmo' => $no_hp_pmo,
					'alamat_pmo' => $alamat_pmo
					);

			$where = array('nik_pmo' => $nik_pmo);

			$this->db->where($where);
			$this->db->update('pmo', $pmo);

			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";
		}



		public function faskespasien($no_faskes)
		{
			$result = $this->db->query("select pasien.*, faskes.* from pasien join register on register.nik_pasien=pasien.nik_pasien join faskes on register.id_register=faskes.id_register where no_faskes = '$no_faskes' order by no_faskes;");
			return $result->row_array();
		}

		public function getNama($no_faskes)
		{

			$this->db->select('pasien.nm_pasien')
					->FROM('pasien')
					->where('faskes.no_faskes', $no_faskes)
					->join('register','register.nik_pasien = pasien.nik_pasien')
					->join('faskes','faskes.id_register = register.id_register')
					->join('pmo','pmo.nik_pmo = faskes.nik_pmo');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				return $pasientbc->row();
			}
			return false;
		}


		/*Absensi dan Checkup*/
		
		function getListAbsensi()
		{
			$result = array();

			$this->db->SELECT('pasien.*, faskes.*, checkup.*, pmo.*')
					->FROM('pasien')
					->join('register','register.nik_pasien=pasien.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('checkup','checkup.no_faskes=faskes.no_faskes')
					->join('pmo','pmo.nik_pmo = faskes.nik_pmo')
					->where('checkup.tgl_selanjutnya = current_date()')
					->where("checkup.tanda = '0'")
					->order_by('checkup.no_faskes', 'ASC');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->result();
			}

			return $result;
		}


		function getCheckup($no_faskes)
		{
			$result = array();

			$this->db->SELECT('pasien.*, faskes.*, checkup.*')
					->FROM('pasien')
					->where('faskes.no_faskes', $no_faskes)
					->join('register','register.nik_pasien=pasien.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('checkup','checkup.no_faskes=faskes.no_faskes')
					->order_by('checkup.no_faskes', 'ASC');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->row_array();
			}

			return $result;
		}


	//Menampilkan id checkup (no transaksi)
		function getIdCheckup()
		{
			$this->db->select('RIGHT(checkup.id_checkup,4) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('checkup');


			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;

			} else {
				$kode = 1;
			}
			$kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
			$kodejadi = 'C'.$kodemax;

			return $kodejadi;
		}

	//Menyimpan Transaksi Check-up
		function SimpanAbsensi()
		{

			if(isset($_POST['btnsimpan'])) //kalo klik btn simpan
			{
				$tanggalSekarang = date('Y-m-d');
				$no = $this->input->post('no_faskes');

				$absensi = array(
					'id_checkup' => $this->input->post('id_checkup'),
					'no_faskes' => $this->input->post('no_faskes'),
					'keterangan' => $this->input->post('keterangan'),
					'tgl_checkup' => $tanggalSekarang
				);

				$this->db->set($absensi);
				$this->db->insert('checkup');

				if($this->input->post('keterangan') == 'Hadir')
				{
					$schedule = array(
							'id_checkup' => $this->input->post('id_checkup'),
							'no_hp' => $this->input->post('no_hp')
					);

					$this->db->set($schedule);
					$this->db->insert('schedule');

					$schedule2 = array(
							'id_checkup' => $this->input->post('id_checkup'),
							'no_hp' => $this->input->post('no_hp_pmo')
					);

					$this->db->set($schedule2);
					$this->db->insert('schedule');
				}


				//update isi field tanda untuk sebagai tanda pasien yang sudah melakukan checkup

				$data = ['tanda' => '1'];
				$this->db->where('no_faskes', $no)
						->where('tgl_selanjutnya', $tanggalSekarang)
						->update('checkup', $data);

						echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";
			}

			return true;
  		}

  		function TampilCheckup($id_checkup)
		{
			$this->db->select('pasien.*, SUM(checkup.dosis_tablet * jml_minum) as total_obat, faskes.*, checkup.*')
					->FROM('pasien')
					->where('checkup.id_checkup', $id_checkup)
					->join('register','register.nik_pasien = pasien.nik_pasien')
					->join('faskes','faskes.id_register = register.id_register')
					->join('checkup','checkup.no_faskes = faskes.no_faskes');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				return $pasientbc->row_array();
			}
			return false;
		}

		function getDataCheckup($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*, checkup.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('checkup','checkup.no_faskes=faskes.no_faskes');
			$this->db->like('checkup.no_faskes', $keyword);
			return $this->db->get();
		}


		function SimpanCheckup()
		{

			if(isset($_POST['btnsimpan']))
			{
				$tanggalSekarang = date('Y-m-d');

				$checkup = array(
					'id_checkup' => $this->input->post('id_checkup'),
					'tgl_checkup' => $tanggalSekarang,
					'tgl_selanjutnya' => $this->input->post('tgl_selanjutnya'),
					'dosis_tablet' => $this->input->post('dosis_tablet'),
					'jml_minum' => $this->input->post('jml_minum'),
					'berat_bdn_2' => $this->input->post('berat_bdn_2'),
					'tahap_pengobatan' => $this->input->post('tahap_pengobatan'),
					'no_faskes' => $this->input->post('no_faskes'),
				);

				$this->db->set($checkup);
				$this->db->insert('checkup');

				$schedule = array(
						'id_checkup' => $this->input->post('id_checkup'),
						'no_hp' => $this->input->post('no_hp'),
						'tanggal' => $this->input->post('tanggal')
				);

				$this->db->set($schedule);
				$this->db->insert('schedule');

				$schedule2 = array(
						'id_checkup' => $this->input->post('id_checkup'),
						'no_hp' => $this->input->post('no_hp_pmo'),
						'tanggal' => $this->input->post('tanggal'),

				);

				$this->db->set($schedule2);
				$this->db->insert('schedule');

				// echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

				}
  		}


		function UpdateCheckup()
		{
			$tanggalSekarang = date('Y-m-d');

			$id_checkup = $this->input->post('id_checkup');
			$tgl_checkup = $tanggalSekarang;
			$tgl_selanjutnya = $this->input->post('tgl_selanjutnya');
			$dosis_tablet = $this->input->post('dosis_tablet');
			$jml_minum = $this->input->post('jml_minum');
			$berat_bdn_2 = $this->input->post('berat_bdn_2');
			$tahap_pengobatan = $this->input->post('tahap_pengobatan');
			$keterangan = $this->input->post('keterangan');
			$no_faskes = $this->input->post('no_faskes');
			$tanggal = $this->input->post('tanggal');


			$data = array(
					'tgl_selanjutnya' => $tgl_selanjutnya,
					'dosis_tablet' => $dosis_tablet,
					'jml_minum' => $jml_minum,
					'berat_bdn_2' => $berat_bdn_2,
					'tahap_pengobatan' => $tahap_pengobatan
					);

			$where = array('id_checkup' => $id_checkup);

			$this->db->where($where);
			$this->db->update('checkup', $data);

			for($i=0; $i<2; $i++)
			{
					$schedule = array(
						'tanggal' => $tanggal
					);

					$where = array('id_checkup' => $id_checkup);

					$this->db->where($where);
					$this->db->update('schedule', $schedule);
			}
		}


		function getByFaskes3($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*, checkup.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('checkup','checkup.no_faskes=faskes.no_faskes')
					->where('faskes.no_faskes', $keyword)
					->where('checkup.tgl_checkup in(select tgl_checkup from checkup where tgl_checkup = current_date())')
					->or_where ('checkup.id_checkup', $keyword)
					->where('checkup.tgl_checkup in(select tgl_checkup from checkup where tgl_checkup = current_date())');

			return $this->db->get();
		}

		function getListCheckup($limit, $start)
		{
			
			$this->db->limit($limit, $start);
			$this->db->SELECT('*')
					->FROM('checkup')
					->order_by('id_checkup', 'DESC');

			$pasientbc = $this->db->get();
			return $pasientbc->result();
		}

		function Deletecheckup($id_checkup)
		{
			$this->db->where('id_checkup', $id_checkup);
			$this->db->delete('checkup');
			$checkup = $this->db->get('checkup');

			if($checkup->num_rows() == 1)
			{
				return $checkup->result();
			}

		}

		function Checkup($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*, checkup.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('checkup','checkup.no_faskes=faskes.no_faskes');
			$this->db->like('checkup.no_faskes', $keyword);
			return $this->db->get();
		}

		function getTotalObat($keyword)
		{
			$this->db->SELECT('sum(jml_minum) as total_obat')
					->FROM('checkup');
			$this->db->like('no_faskes', $keyword);
			return $this->db->get();
		}


  		function getByKeyword2($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->order_by('pasien.nm_pasien', 'ASC');
			$this->db->like('nm_pasien', $keyword);
			$pasien = $this->db->get();
			return $pasien;
		}


		/*DAHAK*/

	//Menyimpan data input dahak
		function SimpanDahak()
		{
			if(isset($_POST['btnsimpan']))
			{

				$dahak = array(
					'id_cekdahak' => $this->input->post('id_cekdahak'),
					'no_reglab' => $this->input->post('no_reglab'),
					'tgl_tes' => $this->input->post('tgl_tes'),
					'bulan_ke' => $this->input->post('bulan_ke'),
					'bta' => $this->input->post('bta'),
					'biakan' => $this->input->post('biakan'),
					'tes_cepat' => $this->input->post('tes_cepat'),
					'no_faskes' => $this->input->post('no_faskes')
				);

				$this->db->set($dahak);
				$this->db->insert('dahak');

				echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

			}

		}

	//Menampilkan id Dahak
		function getIdDahak()
		{
			$this->db->select('RIGHT(dahak.id_cekdahak,5) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('dahak');


			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;

			} else {
				$kode = 1;
			}
			$kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
			$kodejadi = 'D'.$kodemax;

			return $kodejadi;
		}

	//Menampilkan Data dari Tabel dahak
		function getListDahak()
		{
			$result = array();

			$this->db->SELECT('*')
					->FROM('dahak')
					->order_by('id_cekdahak','DESC');
			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->result();
			}

			return $result;
		}

		function getListDahakPasien()
		{
			$result = array();

			$this->db->SELECT('pasien.*, faskes.*, dahak.*')
					->FROM('pasien')
					->join('register','register.nik_pasien=pasien.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('dahak','dahak.no_faskes=faskes.no_faskes')
					->order_by('dahak.no_faskes', 'ASC');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->result();
			}

			return $result;
		}

		function TampilDahakPasien($id_cekdahak)
		{

			$this->db->SELECT('pasien.*, faskes.*, dahak.*')
					->FROM('register')
					->where('id_cekdahak', $id_cekdahak)
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('dahak','dahak.no_faskes=faskes.no_faskes');
			$pasien = $this->db->get();

			if($pasien->num_rows() > 0)
			{
				return $pasien->result();
			}
			return false;
		}


	//Menghapus transaksi dahak berdasarkan id cek dahak
		function Deletedahak($id_cekdahak)
		{
			$this->db->where('id_cekdahak', $id_cekdahak);
			$this->db->delete('dahak');
			$dahak = $this->db->get('dahak');

			if($dahak->num_rows() == 1)
			{
				return $dahak->result();
			}

		}

	//Mengambil data dahak dari tabel dahak berdasarkan no_faskes

		function TampilDahak($id_cekdahak)
		{

			$this->db->SELECT('pasien.*, faskes.*, dahak.*')
					->FROM('register')
					->where('dahak.id_cekdahak', $id_cekdahak)
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('dahak','dahak.no_faskes=faskes.no_faskes');
			$pasien = $this->db->get();

			if($pasien->num_rows() > 0)
			{
				return $pasien->row_array();
			}
			return false;
		}


	//Cari Berdasarkan nofaskes [listdahak]
		function getByFaskes2($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*, dahak.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('dahak','dahak.no_faskes=faskes.no_faskes')
					->order_by('id_cekdahak', 'ASC');
			$this->db->where('dahak.no_faskes', $keyword)
					->or_where('pasien.nm_pasien', $keyword);

			return $this->db->get();
		}


		function UpdateDahak($where, $data, $tabel)
		{
				$id_cekdahak = $this->input->post('id_cekdahak');
				$no_reglab = $this->input->post('no_reglab');
				$tgl_tes = $this->input->post('tgl_tes');
				$bulan_ke = $this->input->post('bulan_ke');
				$bta = $this->input->post('bta');
				$biakan = $this->input->post('biakan');
				$tes_cepat = $this->input->post('tes_cepat');

				$data = array(
						'no_reglab' => $no_reglab,
						'tgl_tes' => $tgl_tes,
						'bulan_ke' => $bulan_ke,
						'bta' => $bta,
						'biakan' => $biakan,
						'tes_cepat' => $tes_cepat,
						);

				$where = array('id_cekdahak' => $id_cekdahak);

				$this->db->where($where);
				$this->db->update('dahak', $data);
		}

		

		/*Diabetes*/
	//Menyimpan data input dahak
		function SimpanDiabetes()
		{
			if(isset($_POST['btnsimpan']))
			{

				$diabetes = array(
					'id_tesdm' => $this->input->post('id_tesdm'),
					'hasil_tesdm' => $this->input->post('hasil_tesdm'),
					'terapi_dm' => $this->input->post('terapi_dm'),
					'no_faskes' => $this->input->post('no_faskes')
				);

				$this->db->set($diabetes);
				$this->db->insert('diabetes');
				echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

			}

		}

		function getIdTesDM()
		{
			$this->db->select('RIGHT(diabetes.id_tesdm,3) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('diabetes');


			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;

			} else {
				$kode = 1;
			}
			$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
			$kodejadi = 'DM'.$kodemax;

			return $kodejadi;
		}

		function getListdiabetes()
		{
			$result = array();

			$this->db->SELECT('pasien.*, faskes.*, diabetes.*')
					->FROM('pasien')
					->join('register','register.nik_pasien=pasien.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('diabetes','diabetes.no_faskes=faskes.no_faskes')
					->order_by('id_tesdm', 'DESC');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->result();
			}

			return $result;

		}

	//Menghapus transaksi Diabetes berdasarkan id cek tes dahak
		function DeleteDM($id_tesdm)
		{
			$this->db->where('id_tesdm', $id_tesdm);
			$this->db->delete('diabetes');
			$diabetes = $this->db->get('diabetes');

			if($diabetes->num_rows() == 1)
			{
				return $diabetes->result();
			}

		}

	//Pencarian berdasarkan nama
		function getDataDiabetes($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*, diabetes.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('diabetes','diabetes.no_faskes=faskes.no_faskes')
					->order_by('pasien.nm_pasien', 'ASC');
			$this->db->like('nm_pasien', $keyword)
					->or_like('diabetes.no_faskes', $keyword);
			$pasientbc = $this->db->get();

			return $pasientbc;
		}

		//Menampilkan data pada form update
		function TampilDiabetes($no_faskes)
		{

			$this->db->SELECT('pasien.*, faskes.*, diabetes.*')
					->FROM('register')
					->where('faskes.no_faskes', $no_faskes)
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('diabetes','diabetes.no_faskes=faskes.no_faskes');
			$pasien = $this->db->get();

			if($pasien->num_rows() > 0)
			{
				return $pasien->row_array();
			}
			return false;
		}


		function UpdateDiabetes($where, $data, $tabel)
			{
				$id_tesdm = $this->input->post('id_tesdm');
				$no_faskes = $this->input->post('no_faskes');
				$hasil_tesdm = $this->input->post('hasil_tesdm');
				$terapi_dm = $this->input->post('terapi_dm');

				$data = array(
						'hasil_tesdm' => $hasil_tesdm,
						'terapi_dm' => $terapi_dm,
						);

				$where = array('no_faskes' => $no_faskes,
								'id_tesdm' => $id_tesdm);

				$this->db->where($where);
				$this->db->update('diabetes', $data);

				echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";
			}


		/*HIV*/
		function getIdTesHiv()
		{
			$this->db->select('RIGHT(hiv.id_teshiv,3) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('hiv');


			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;

			} else {
				$kode = 1;
			}
			$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
			$kodejadi = 'H'.$kodemax;

			return $kodejadi;
		}

		function SimpanHiv()
		{
			if(isset($_POST['btnsimpan']))
			{

				$hiv = array(
					'id_teshiv' => $this->input->post('id_teshiv'),
					'tgl_dianjurkan' => $this->input->post('tgl_dianjurkan'),
					'tgl_teshiv' => $this->input->post('tgl_teshiv'),
					'hasil_tes' => $this->input->post('hasil_tes'),
					'no_faskes' => $this->input->post('no_faskes'),

				);

				$this->db->set($hiv);
				$this->db->insert('hiv');

				echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

			}
		}


		function getListhiv()
		{
			$result = array();

			$this->db->SELECT('pasien.*, faskes.*, hiv.*')
					->FROM('pasien')
					->join('register','register.nik_pasien=pasien.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('hiv','hiv.no_faskes=faskes.no_faskes')
					->order_by('hiv.no_faskes', 'ASC');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->result();
			}

			return $result;

		}

		function Deletehiv($id_teshiv)
		{
			$this->db->where('id_teshiv', $id_teshiv);
			$this->db->delete('hiv');
			$diabetes = $this->db->get('hiv');

			if($diabetes->num_rows() == 1)
			{
				return $diabetes->result();
			}
		}


		//Menampilkan data pada form update
		function TampilHiv($no_faskes)
		{

			$this->db->SELECT('pasien.*, faskes.*, hiv.*')
					->FROM('register')
					->where('faskes.no_faskes', $no_faskes)
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('hiv','hiv.no_faskes=faskes.no_faskes');
			$pasien = $this->db->get();

			if($pasien->num_rows() > 0)
			{
				return $pasien->row_array();
			}
			return false;
		}

		//Pencarian berdasarkan nama
		function getDataHiv($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*, hiv.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('hiv','hiv.no_faskes=faskes.no_faskes')
					->order_by('pasien.nm_pasien', 'ASC');
			$this->db->where('nm_pasien', $keyword)
						->or_where('hiv.no_faskes', $keyword);
			$pasientbc = $this->db->get();

			return $pasientbc;
		}

		function UpdateHiv($where, $data, $tabel)
		{
			$id_teshiv = $this->input->post('id_teshiv');
			$no_faskes = $this->input->post('no_faskes');
			$tgl_teshiv = $this->input->post('tgl_teshiv');
			$tgl_dianjurkan = $this->input->post('tgl_dianjurkan');
			$hasil_tes = $this->input->post('hasil_tes');

			$data = array(
					'tgl_teshiv' => $tgl_teshiv,
					'tgl_dianjurkan' => $tgl_dianjurkan,
					'hasil_tes' => $hasil_tes
					);

			$where = array('no_faskes' => $no_faskes,
							'id_teshiv' => $id_teshiv);

			$this->db->where($where);
			$this->db->update('hiv', $data);

			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";
		}


		/*HASIL AKHIR*/

		function getIdHasilAkhir()
		{
			$this->db->select('RIGHT(hasil_akhir.id_hasil,4) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('hasil_akhir');


			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1;

			} else {
				$kode = 1;
			}
			$kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
			$kodejadi = 'HA'.$kodemax;

			return $kodejadi;
		}


		function SimpanHasilAkhir()
		{
			if(isset($_POST['btnsimpan']))
			{

				$hasilakhir = array(
					'id_hasil' => $this->input->post('id_hasil'),
					'tgl_selesai' => $this->input->post('tanggal'),
					'hasilakhir' => $this->input->post('hasilakhir'),
					'no_faskes' => $this->input->post('no_faskes')
				);

				$this->db->set($hasilakhir);
				$this->db->insert('hasil_akhir');

				echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";

			}
		}


		function getListHasilAkhir()
		{
			$result = array();

			$this->db->SELECT('pasien.*, faskes.*, hasil_akhir.*')
					->FROM('pasien')
					->join('register','register.nik_pasien=pasien.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('hasil_akhir','hasil_akhir.no_faskes=faskes.no_faskes')
					->order_by('hasil_akhir.tgl_selesai', 'ASC');

			$pasientbc = $this->db->get();

			if($pasientbc->num_rows() > 0)
			{
				$result = $pasientbc->result();
			}

			return $result;

		}

		function Tampilhasil($no_faskes)
		{

			$this->db->SELECT('pasien.*, faskes.*, hasil_akhir.*')
					->FROM('register')
					->where('faskes.no_faskes', $no_faskes)
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('hasil_akhir','hasil_akhir.no_faskes=faskes.no_faskes');
			$pasien = $this->db->get();

			if($pasien->num_rows() > 0)
			{
				return $pasien->row_array();
			}
			return false;
		}


		function DeleteIdHasil($id_hasil)
		{
			$this->db->where('id_hasil', $id_hasil);
			$this->db->delete('hasil_akhir');
			$hasilakhir = $this->db->get('hasil_akhir');

			if($hasilakhir->num_rows() == 1)
			{
				return $hasilakhir->result();
			}
		}

			//Pencarian berdasarkan nama
		function getDataHasil($keyword)
		{
			$this->db->SELECT('register.*, pasien.*, faskes.*, hasil_akhir.*')
					->FROM('register')
					->join('pasien','pasien.nik_pasien=register.nik_pasien')
					->join('faskes','faskes.id_register=register.id_register')
					->join('hasil_akhir','hasil_akhir.no_faskes=faskes.no_faskes')
					->order_by('pasien.nm_pasien', 'ASC');
			$this->db->like('nm_pasien', $keyword);
			$pasientbc = $this->db->get();

			return $pasientbc;
		}

		function UpdateHasil($where, $data, $tabel)
		{

			$no_faskes = $this->input->post('no_faskes');
			$tgl_selesai = $this->input->post('tgl_selesai');
			$hasilakhir = $this->input->post('hasilakhir');

			$data = array(
					'tgl_selesai' => $tgl_selesai,
					'hasilakhir' => $hasilakhir
					);

			$where = array('no_faskes' => $no_faskes);

			$this->db->where($where);
			$this->db->update('hasil_akhir', $data);

			echo "<script> alert('Data Sudah Di Simpan');window.location='';</script>";
		}

}
