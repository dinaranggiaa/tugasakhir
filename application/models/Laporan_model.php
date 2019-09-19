<?php
class Laporan_model extends CI_Model
{
	public function hasilakhir($tglawal, $tglakhir)
	{
		$result = $this->db->query("select faskes.no_faskes, pasien.nm_pasien, faskes.tgl_mulai, hasil_akhir.tgl_selesai, hasil_akhir.hasilakhir from pasien, register, faskes, hasil_akhir where pasien.nik_pasien=register.nik_pasien and register.id_register=faskes.id_register and faskes.no_faskes=hasil_akhir.no_faskes and tgl_selesai between '$tglawal' and '$tglakhir' group by nm_pasien order by tgl_selesai");
		return $result->result();
	}

	public function pengobatanpasien($tglawal, $tglakhir)
	{
		$result = $this->db->query("select faskes.no_faskes, pasien.nm_pasien, pasien.nik_pasien, pasien.jenkel,
						  YEAR(CURDATE())-YEAR(pasien.tgl_lahir) as usia, pasien.alamat,
						  faskes.tipe_diagnosis, faskes.riwayat_dm, faskes.status_hiv, faskes.lokasi_anatomi,
						  faskes.tipe_pasien, faskes.skoring_anak, faskes.tgl_mulai, faskes.panduan_oat,
						  faskes.panduan_oat, faskes.sumber_obat, dahak.bta, dahak.tes_cepat, dahak.biakan, dahak.bulan_ke,
						  hiv.tgl_dianjurkan, hiv.tgl_teshiv, hiv.hasil_tes, diabetes.hasil_tesdm, diabetes.terapi_dm,
						  hasil_akhir.tgl_selesai, hasil_akhir.hasilakhir from faskes
						left outer join register on faskes.id_register = register.id_register
						left outer join pasien on register.nik_pasien = pasien.nik_pasien
						left outer join hasil_akhir on faskes.no_faskes = hasil_akhir.no_faskes
						left outer join diabetes on faskes.no_faskes = diabetes.no_faskes
						left outer join dahak on faskes.no_faskes = dahak.no_faskes
						left outer join hiv on faskes.no_faskes = hiv.no_faskes
						where faskes.tgl_mulai between '$tglawal' and '$tglakhir' order by dahak.no_faskes");
		return $result->result();
	}

	public function kehadirancheckup($tglawal, $tglakhir)
	{
		$result = $this->db->query("select pasien.nm_pasien, faskes.no_faskes, faskes.tgl_mulai, count(keterangan='Hadir') as total from register, pasien, faskes, checkup where pasien.nik_pasien=register.nik_pasien and faskes.id_register=register.id_register and checkup.no_faskes=faskes.no_faskes and tgl_checkup between '$tglawal' and '$tglakhir' group by nm_pasien");
		return $result->result();
	}


}
