<?php
class SmsScheduled extends MY_Controller
{
    public function index($page = null)
    {
        $schedule = $this->smsscheduled->orderBy('ID', 'desc')
                                        ->where('status', 'belum')
                                        ->paginate($page);
        if (!$schedule) {
            message('error', 'Tidak ada data!');
        }

        // cek jika ada schedule sms, kirimkan.
        if ($schedule) {
            $this->smsscheduled->runDaemon();
        }

        $mainView = 'sms_scheduled';
        $heading = 'Pesan Terjadwal';
        $totalRow = count($this->smsscheduled->where('status', 'belum')->getAll()
            );
        $pagination = $this->smsscheduled->makePaginationLink(site_url('sms-scheduled'),
            2,
            $totalRow
        );
        $this->load->view('template', compact(
            'mainView',
            'heading',
            'schedule',
            'pagination',
            'totalRow'
        ));

    }

    public function delete()
    {
        $id = $this->input->post('ID', true);

        $schedule = $this->smsscheduled->find($id);
        if(!$schedule) {
            flashMessage('error', 'Data tidak ditemukan!');
            redirect('sms-scheduled', 'refresh');
        }

        $delete = $this->smsscheduled->delete($id);
        if(!$delete) {
            flashMessage('error', 'Data gagal dihapus.');
        } else {
            flashMessage('success', 'Data berhasil dihapus.');
        }
        redirect('sms-scheduled', 'refresh');
    }
}
?>
