<?php 
class Outbox extends MY_Controller 
{
    public function index($page = null)
    {
        $outbox = $this->outbox->orderBy('ID', 'desc')
                               ->paginate($page);
        if(!$outbox) {
            message('error', 'Tidak ada data!');
        }

        $mainView = 'outbox/index';
        $heading = 'Outbox';
        $totalRow = count($this->outbox->getAll());
        $pagination = $this->outbox->makePaginationLink(
            site_url('outbox'),
            2,
            $totalRow
        );
        $this->load->view('outbox', compact(
            'mainView',
            'heading',
            'outbox',
            'totalRow',
            'pagination'
        ));
    }
}
?>