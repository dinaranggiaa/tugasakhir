<?php
class M_Pendataan extends MY_Model {
	
		private $kandidat = 'kandidat'; //Tabel
		public $id_kandidat;
		public $nm_kandidat;
		public $jk_kandidat;
		public $almt_kandidat;
		public $pendidikan_akhir;
		
		private $kriteria = 'kriteria';
		public $id_kriteria;
		public $nm_kriteria;
		public $bobot_kriteria;

		public function __construct()
		{
			$this->load->database();
		}
		
        // Menampilkan id kandidat
		function get_id_kandidat()
		{
			$this->db->select('RIGHT(kandidat.id_kandidat,3) as kode', false);
			$this->db->order_by('kode','DESC');
			$this->db->limit(1);

			$query = $this->db->get('kandidat');

			//Mengecek sudah ada data atau belum
			if($query->num_rows() <> 0)
			{
				$data = $query->row();
				$kode = intval($data->kode)+1; //kalo udah +1

			} else {
				$kode = 1; //kalo belum buat kode
			}
			$kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
			$kodejadi = 'K'.$kodemax;

			return $kodejadi;
		}
        
        function simpan_kandidat($data){
            $this->db->insert('kandidat', $data);
		}
		
		function hapus_kandidat($id_kandidat){
			$this->db->where('id_kandidat', $id_kandidat);
			$this->db->delete('kandidat');
		}

		function ubah_kandidat($id_kandidat, $data)
		{
			$this->db->where('id_kandidat', $id_kandidat);
			$this->db->update('kandidat', $data);
		}

        function ambil_data_kandidat(){
            $result = array();
            $this->db->SELECT('*')
                     ->FROM('kandidat')
                     ->ORDER_BY('id_kandidat','DESC');
            $kandidat = $this->db->get();
            
            if($kandidat->num_rows() > 0){
				$result = $kandidat->result();
				
            }
            return $result;
		}
		
		function ambil_data_byidkandidat($id_kandidat)
		{
			$this->db->where('id_kandidat', $id_kandidat);
			return $this->db->get('kandidat')->result();
		}

        function pagination_data_kandidat($limit, $start)
        {
            return $this->db->get('kandidat', $limit, $start) ->result_array();
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
		
		function simpan_kriteria($data){
            $this->db->insert('kriteria', $data);
		}

		function ambil_data_byidkriteria($id_kriteria)
		{
			$this->db->where('id_kriteria', $id_kriteria);
			return $this->db->get('kriteria')->result();
		}

		function hapus_kriteria($id_kriteria){
			$this->db->where('id_kriteria', $id_kriteria);
			$this->db->delete('kriteria');
		}
		
		function ambil_data_kriteria(){
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

		function getNmKriteria()
		{
			$this->db->select('nm_kriteria')
					 ->from('kriteria')
					 ->order_by('id_kriteria');
			$kriteria = $this->db->get();
			return $kriteria;

		}

}