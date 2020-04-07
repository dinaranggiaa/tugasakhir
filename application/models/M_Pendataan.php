<?php
class M_Pendataan extends MY_Model {
	
		private $kandidat = 'kandidat'; //Tabel
		public $id_kandidat;
		public $nm_kandidat;
		public $jk_kandidat;
		public $almt_kandidat;
		public $pendidikan_akhir;
		
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

        function ambil_data_kandidat(){
            return $this->db->get('kandidat')->result();
        }

}