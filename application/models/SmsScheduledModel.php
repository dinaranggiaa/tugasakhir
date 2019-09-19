<?php 
class SmsScheduledModel extends MY_Model
{
    protected $table = 'schedule';
    protected $perPage = 5;

    public function paginate($page)
    {
            $offset = $this->calcRealOffset($page);
            $schedule = $this->db->select(
                'Id,
                tanggal,
                jam,
                no_hp,
                pesan,
                status'
            )
            ->order_by('Id', 'desc')
            ->limit($this->perPage, $offset)
            ->get($this->table)
            ->result();
        $schedule = $this->prepDestinationName($schedule);
        return $schedule;
    }

    private function prepDestinationName($schedule)
    {
        foreach ($schedule as $row) {
            $noHP = $row->no_hp;
            $found = $this->getContactName($noHP);
            if ($found) {
                $nama = $found->nm_pasien;
                $row->no_hp = "<span><strong><em>$nama</em></strong></span><br>$noHP";
            } else {
                $row->no_hp = $noHP;
            }
        }
        return $schedule;
    }

    // Fungsi untuk mengirimkan sms
    public function runDaemon()
    {
        $tanggalSekarang = date('Y-m-d');
        $jamSekarang = date('H:i');

        $schedule = $this->getSchedule(
            $tanggalSekarang,
            $jamSekarang
        );

        if ($schedule) {
            return $this->sendSms($schedule);
        }
    }

    public function getSchedule($tanggal,$jam)
    {
        return $this->db->where('tanggal', $tanggal)
                        ->where('jam', $jam)
                        ->where('status', 'belum')
                        ->get($this->table)
                        ->row();
    }

    private function sendSms($schedule)
    {
        $data = (object) $this->prepData($schedule);
        $this->db->insert('outbox', $data);
        $this->changeStatus($data->ID);
    }

    private function prepData($schedule)
    {
        $data = [
            'ID' => $schedule->Id,
            'DestinationNumber' => $schedule->no_hp,
            'TextDecoded' => $schedule->pesan
        ];
        return $data;
    }

    private function changeStatus($ID)
    {
        $data = ['status' => 'terkirim'];
        $this->db->where('Id', $ID)->update('schedule', $data);
    }

}
?>