<?php
class Sent extends MY_Controller
{
    public function index($page = null)
    {
        $sent = $this->sent->paginate($page);
        if(!$sent) {
            message('error', 'Tidak ada data!');
        }

        $mainView = 'sent/index';
        $heading = 'Sent';
        $totalRow = count($this->sent->getAll());
        $pagination = $this->sent->makePaginationLink(site_url('sent'),
                    2,
                    $totalRow
                );

            $this->load->view('sent', compact(
                'mainView',
                'heading',
                'sent',
                'totalRow',
                'pagination'
            ));
    }

    public function delete()
    {
        $id = $this->input->post('ID', true);

        $sent = $this->sent->find($id);
        if(!$sent) {
            flashMessage('error', 'Data tidak ditemukan!');
            redirect('sent', 'refresh');
        }

        $delete = $this->sent->delete($id);
        if(!$sent) {
            flashMessage('error', 'Data gagal dihapus.');
        } else {
            flashMessage('success', 'Data berhasil dihapus.');
        }
        redirect('sent', 'refresh');
    }
}
?>
