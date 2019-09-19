<?php 
class OutboxModel extends MY_Model
{
    protected $table = 'outbox';
    protected $perPage = 5;

    public function paginate($page)
    {
        $offset = $this->calcRealOffset($page);
        $outbox = $this->db->select(
            'ID,
            SendingDateTime,
            DestinationNumber,
            TextDecoded'
        )
        ->order_by('ID', 'desc')
        ->limit($this->perPage, $offset)
        ->get($this->table)
        ->result();
    }

    protected function prepDestinationName($outbox)
    {
        foreach($outbox as $row) {
            $noHp = $row->DestinationNumber;
            $found = $this->getContactName($noHp);
            if($found) {
                $nama = $found->nm_pasien;
                $row->DestinationNumber = "<span>$nama</span><br>$noHP";
            } else {
                $row->DestinationNumber = $noHp;
            }
        }
        return $outbox;
    }
}
?>