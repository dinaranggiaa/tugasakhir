<?php
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load model, jika ada.
        $model = strtolower(get_class($this));
        if (file_exists(APPPATH .'models/'.$model.'Model.php')) {
            $this->load->model($model . 'Model', $model, true);
        }

        // Data yang berkaitan dengan login.
        if($this->session->userdata('status') != 'login') {
          redirect(base_url('petugas/index'));
        }
    }
}
?>
